<?php

namespace App\Console\Commands;

use App\Events\AutoBiddingEvent;
use App\Events\TestEvent;
use App\Events\WinAlertEvent;
use App\Models\Auction;
use App\Models\BidBuddy;
use App\Models\BiddingHistory;
use App\Models\BiddingQueue;
use App\Models\User;
use App\Models\Winner;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ManagingBidBudiesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:managing-bid-budies-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'checking all live auctions and running bid buddies queues on them if exist ';

    /**
     * Execute the console command.
     */
    // TODO sometimes bidbuddy wont work after counter reaches zero and needs new manual bidding to restart
    public function handle()
    {

        //fetch auctions that are live 
        $liveAuctions = Auction::where('status', 100)->orderBy('timer', 'DESC')->get();

        $excuted_bids = [];
        //check if they have bid in queue
        foreach ($liveAuctions as $auction) {
            //check to see if next buddy in queue is from different user than latest auction bidder

            if (count($auction->uniqe_bid_buddies) === 0) {
                //  there is no new bidder other than current winner 
                // save auction as ended with final winner
                $this->info('there is a winner');
                $this->info($auction->id);
                $this->saveWinner($auction);
                continue; // no need for calculating new bids anymore
            }
            $next_bid = $auction->next_bidding_queue;

            if ($next_bid) {
                //has bid to run

                $new_winner_id = $next_bid->bid_buddy->user_id;

                //check timer
                $now = Carbon::now()->subSeconds(3);
                $next_3_sec = Carbon::now()->addSeconds(4);
                if ($auction->timer->between($now, $next_3_sec)) {
                    // submit bid ...
                    $new_price = $auction->current_price + 1;
                    // $new_timer = Carbon::create($auction->timer)->addSeconds(10);
                    $new_timer = Carbon::now()->addSeconds(10);

                    try {
                        DB::beginTransaction();
                        $auction->current_price = $new_price;

                        $auction->current_winner_id = $new_winner_id;
                        $auction->timer = $new_timer;

                        $auction->save();

                        BiddingHistory::create([
                            "user_id" => $new_winner_id,
                            "auction_id" => $auction->id,
                            "category_id" => $auction->product->category->id,
                            "bid_price" => $new_price
                        ]);
                        $next_bid->status = 0;
                        $next_bid->save();

                        $bidBuddy = BidBuddy::find($next_bid->bid_buddy_id);
                        //check if user still has bids in their bot
                        if ($bidBuddy->available_bids > 1) {
                            BiddingQueue::create([
                                'bid_buddy_id' => $bidBuddy->id,
                                'auction_id' => $auction->id,
                                'status' => 1 // pending and ready to be submitted
                            ]);
                        }
                        $bidBuddy->available_bids -= 1;
                        $bidBuddy->save();


                        DB::commit();

                        $new_queue = $auction->next_bidding_queue;

                        // TODO fix user id + name
                        //add auction to excuted bids array
                        $excuted_bids[] = [
                            'id' => $auction->id,
                            'bid_price' => $new_price,
                            "current_winner_id" => $new_winner_id,
                            "current_winner_username" => $next_bid->bid_buddy->user->username,
                            "avatar" => $next_bid->bid_buddy->user->profile_pic,
                            "timer" => $new_timer,
                            // 'bidderQueueId' => $next_bid->id,
                            "bidding_queues" => $new_queue,
                            'status' => 100,
                        ];
                    } catch (\Exception $e) {
                        DB::rollback();
                    }
                }
            }
        }

        // dd($excuted_bids);

        //if there was any new bid submitted then broadcast it
        if (count($excuted_bids) > 0) {
            broadcast(new AutoBiddingEvent($excuted_bids));
        }
    }
    public function saveWinner(Auction $auction)
    {
        $winner_alert = null;
        try {
            DB::beginTransaction();
            $winner_id = $auction->current_winner_id;
            // edit auction status and final winner
            $auction->status = 3;
            $auction->final_winner_id = $winner_id;
            $auction->save();
            // return not spent bidbuddy's bid, if any...
            $bidBuddy = BidBuddy::where('user_id', $winner_id)->where('auction_id', $auction->id)->where('available_bids', '>', 0)->first();
            if (!empty($bidBuddy)) {
                User::where('id', $winner_id)->increment('bid_amount', $bidBuddy->available_bids);
                $bidBuddy->available_bids = 0;
                $bidBuddy->status = 4; // auction over status for buddy
                $bidBuddy->save();
            }
            // return bid in queue if any 
            // TODO return bidding in queue


            // calculate bids placed to win the auction
            $bids_placed = BiddingHistory::where('user_id', $winner_id)->where('auction_id', $auction->id)->count();
            // save in winners table 
            Winner::create([
                'user_id' => $winner_id,
                'product_id' => $auction->product_id,
                'win_price' => $auction->current_price,
                'status' => 1,
                'bids_placed' => $bids_placed
            ]);
        //   TODO UNCOMMENT IT AND BROADCAST
            // DB::commit();

            //now create data to push for showing the winner


            $winner_alert = [
                'id' => $auction->id,
                'bid_price' => $auction->current_price,
                "current_winner_id" => $winner_id,
                "current_winner_username" => $auction->user->username,
                "avatar" => $auction->user->profile_pic,
                "timer" => $auction->timer,
                "bidding_queues" => null,
                "status"=>3// end auction status


            ];
        } catch (\Exception $e) {
            DB::rollback();
        }
        if (!empty($winner_alert)) {
            $this->info('sending winner alert');
            // broadcast(new WinAlertEvent($winner_alert));
        }
    }
}
