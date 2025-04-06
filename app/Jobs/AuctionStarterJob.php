<?php

namespace App\Jobs;

use App\Events\WinAlertEvent;
use App\Models\BiddingHistory;
use App\Models\Winner;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Events\AutoBiddingEvent;
use App\Events\TestEvent;
use App\Models\Auction;
use App\Models\BidBuddy;
use App\Models\BiddingQueue;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AuctionStarterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        echo "Task is running at " . now() . "\n"; // Logs to console

        //fetch auctions that are live 
        // Get current time
        $now = Carbon::now();

        // Get 5 minutes before and after
        $startRange = $now->copy()->subMinutes(5);
        $endRange = $now->copy()->addMinutes(5);

        // Query auctions that start within ±5 minutes from now and have status = 1
        $ActiveAuctions = Auction::where('status', 1)
            ->whereBetween('start_time', [$startRange, $endRange])
            ->orderBy('timer', 'DESC')
            ->get();

        if (count($ActiveAuctions) === 0) {
            return;
        }

        echo "allowed to run active auctions"; // Logs to console

        $excuted_bids = [];
        //check if they have bid in queue
        foreach ($ActiveAuctions as $auction) {
            //check to see if next buddy in queue is from different user than latest auction bidder


            if($auction->start_time < $now){
                // thease auctions must be active...
                $auction->status=100;
                $auction->save();

            }
            // $next_bid = $auction->next_bidding_queue;

            // if ($next_bid) {
            //     //has bid to run
            //     $new_winner_id = $next_bid->bid_buddy->user_id;

            //     //check timer
            //     $now = Carbon::now()->subSeconds(3);
            //     $next_3_sec = Carbon::now()->addSeconds(4);
            //     if ($auction->timer->between($now, $next_3_sec) || $auction->timer < Carbon::now()) {


            //         // submit bid ...
            //         $new_price = $auction->current_price + 1;
            //         // $new_timer = Carbon::create($auction->timer)->addSeconds(10);
            //         $new_timer = Carbon::now()->addSeconds(10);

            //         try {
            //             DB::beginTransaction();
            //             $auction->current_price = $new_price;

            //             $auction->current_winner_id = $new_winner_id;
            //             $auction->timer = $new_timer;

            //             $auction->save();

            //             BiddingHistory::create([
            //                 "user_id" => $new_winner_id,
            //                 "auction_id" => $auction->id,
            //                 "category_id" => $auction->product->category->id,
            //                 "bid_price" => $new_price
            //             ]);
            //             $next_bid->status = 0;
            //             $next_bid->save();

            //             $bidBuddy = BidBuddy::find($next_bid->bid_buddy_id);
            //             //check if user still has bids in their bot
            //             if ($bidBuddy->available_bids > 1) {
            //                 BiddingQueue::create([
            //                     'bid_buddy_id' => $bidBuddy->id,
            //                     'auction_id' => $auction->id,
            //                     'status' => 1 // pending and ready to be submitted
            //                 ]);
            //             }
            //             $bidBuddy->available_bids -= 1;
            //             $bidBuddy->save();


            //             DB::commit();

            //             $new_queue = $auction->next_bidding_queue;

            //             // TODO fix user id + name
            //             //add auction to excuted bids array
            //             $excuted_bids[] = [
            //                 'id' => $auction->id,
            //                 'bid_price' => $new_price,
            //                 "current_winner_id" => $new_winner_id,
            //                 "current_winner_username" => $next_bid->bid_buddy->user->username,
            //                 "avatar" => $next_bid->bid_buddy->user->profile_pic,
            //                 "timer" => $new_timer,
            //                 // 'bidderQueueId' => $next_bid->id,
            //                 "bidding_queues" => $new_queue,
            //                 'status' => 100,
            //             ];
            //         } catch (\Exception $e) {
            //             DB::rollback();
            //         }
            //     }
            // }
        }


        //if there was any new bid submitted then broadcast it
        if (count($excuted_bids) > 0) {
            broadcast(new AutoBiddingEvent($excuted_bids));
        }
    }
   
}
