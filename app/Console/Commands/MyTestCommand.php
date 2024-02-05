<?php

namespace App\Console\Commands;

use App\Events\TestEvent;
use App\Models\Auction;
use App\Models\BidBuddy;
use App\Models\BiddingHistory;
use App\Models\BiddingQueue;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MyTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:my-test-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
    //fetch auctions that are live 
    $liveAuctions = Auction::where('status', 100)->orderBy('timer', 'DESC')->get();
    // dd($liveAuctions[0]->next_bidding_queue);


    $excuted_bids = [];
    //check if they have bid in queue
    foreach ($liveAuctions as $auction) {
        $next_bid = $auction->next_bidding_queue;

        if ($next_bid) {
            //has bid to run
            //check timer
            $now = Carbon::now()->subSeconds(5);
            $next_3_sec = Carbon::now()->addSeconds(10);
            if ($auction->timer->between($now, $next_3_sec)) {
                // submit bid ...
                $new_price = $auction->current_price + 1;
                $new_timer = Carbon::create($auction->timer)->addSeconds(10);

                try {
                    DB::beginTransaction();
                    $auction->current_price = $new_price;
                    $auction->current_winner_id = 2;
                    $auction->timer = $new_timer;

                    $auction->save();

                    BiddingHistory::create([
                        "user_id" => 2,
                        "auction_id" => $auction->id,
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



                    //add auction to excuted bids array
                    $excuted_bids[] = [
                        'id' => $auction->id,
                        'price' => $new_price,
                        "current_winner_id" => 2,
                        "timer" => $new_timer,
                        'bidderQueueId'=>$next_bid->id,

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
        broadcast(new TestEvent($excuted_bids));
    }
    }
}
