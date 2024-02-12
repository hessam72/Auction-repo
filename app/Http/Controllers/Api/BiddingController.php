<?php

namespace App\Http\Controllers\Api;

use App\Events\MyEvent;
use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\BidBuddy;
use App\Models\BiddingHistory;
use App\Models\BiddingQueue;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiddingController extends Controller
{
    public function createBid(Request $request)
    {
        //user - id:2
        $data = json_decode($request->getContent());

        //vlidating requesst...

        // return $request->auction_id;

        //thease proces should be a transition
        //save in bidding histiory

        $auction = Auction::find($data->auction_id);

        $new_price = $auction->current_price + 1;
        Auction::where('id', $data->auction_id)
            ->update([
                'current_price' => $new_price,
                'current_winner_id' => 2,
                'timer' => Carbon::now()->addSeconds(10)
            ]);

        BiddingHistory::create([
            "user_id" => 2,
            "auction_id" => $data->auction_id,
            "bid_price" => $new_price
        ]);

        User::where('id', 2)
            ->update([
                'bid_amount' => DB::raw('bid_amount-1'),
            ]);

        $nex_queue = BiddingQueue::where('status', 1)->where('auction_id', $data->auction_id)->oldest()->first();
        $data = array(
            "id" => $data->auction_id,
            "bid_price" => $new_price,
            "current_winner_id" => 2,
            "bidding_queues" => $nex_queue,
            "timer" => Carbon::now()->addSeconds(10)
        );


        broadcast(new MyEvent($data));
        return response()->json([
            'success' => 'bid submited',

        ]);
    }
    public function storeBidBuddy(Request $request)
    {
        //validate params:
        $request->validate([
            'count' =>  'required',
            'user_id' =>  'required',
            'auction_id' =>  'required',
        ]);

        //check if user can create $count bid
        $user = User::find($request->user_id);
        if ($user->bid_amount < $request->count) {
            return 'you dont have enough bid';
        }

        // check if user allready  have a buddy on this auction

        $exist_bidBuddy = BidBuddy::where('user_id', $request->user_id)
        ->where('auction_id', $request->auction_id)->where('status', 1)->first();

        if ($exist_bidBuddy) {
            return 'you allready have an active Buddy on this auction';
        }

        try {
            DB::beginTransaction();
            // create bid buddy
            $bidBuddy = BidBuddy::create([
                'available_bids' =>  $request->count,
                'user_id' =>  $request->user_id,
                'auction_id' =>  $request->auction_id,
                'status' => 1
            ]);

            // reduce $count bid_amount from user
            $user->bid_amount -= $request->count;
            $user->save();

            //  add it to bidding queue

            $biddingQueue = BiddingQueue::create([
                'bid_buddy_id' => $bidBuddy->id,
                'auction_id' => $request->auction_id,
                'status' => 1 // pending and ready to be submitted
            ]);


            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
        // **************submit new event

        // $nex_buddy=BiddingQueue::where('status' , 1)->where('auction_id' , $request->auction_id)->oldest()->first();


        // $data = array(
        //     "id" => $request->auction_id,
        //     "bid_price" => $new_price,
        //     "current_winner_id" => 2,
        //     "bidding_queues"=> array($nex_buddy),
        //     "timer" => Carbon::now()->addSeconds(10)
        // );

        // // new event that broadcast to all the new bot creation
        // broadcast(new MyEvent($data));




        return $biddingQueue;
    }
    public function storeBidBuddyBid(Request $request)
    {
        //validate params:
        $request->validate([
            'bid_buddy_id' =>  'required',
            'auction_id' =>  'required',
            'bidding_queue_id' =>  'required',

        ]);


        try {
            DB::beginTransaction();
            // 

            $auction = Auction::find($request->auction_id);

            $new_price = $auction->current_price + 1;
            Auction::where('id', $request->auction_id)
                ->update([
                    'current_price' => $new_price,
                    'current_winner_id' => 2,
                    'timer' => Carbon::now()->addSeconds(10)
                ]);

            BiddingHistory::create([
                "user_id" => 2,
                "auction_id" => $request->auction_id,
                "bid_price" => $new_price
            ]);

            BiddingQueue::where('id', $request->bidding_queue_id)->update([
                'status' => 0,
            ]);

            $bidBuddy = BidBuddy::find($request->bid_buddy_id);
            //check if user still has bids in their bot
            if ($bidBuddy->available_bids > 1) {
                BiddingQueue::create([
                    'bid_buddy_id' => $bidBuddy->id,
                    'auction_id' => $request->auction_id,
                    'status' => 1 // pending and ready to be submitted
                ]);
            }
            $bidBuddy->available_bids -= 1;
            $bidBuddy->save();


            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }

        //get next bidBUddy to excute
        $nex_buddy = BiddingQueue::where('status', 1)->where('auction_id', $request->auction_id)->oldest()->first();


        // 'id' => $item->id,
        // 'bid_buddy_id'=>$item->bid_buddy_id,
        // 'auction_id'=>$item->auction_id,
        // 'status'=>$item->status,



        $data = array(
            "id" => $request->auction_id,
            "bid_price" => $new_price,
            "current_winner_id" => 2,
            "bidding_queues" => $nex_buddy,
            "timer" => Carbon::now()->addSeconds(10)
        );


        broadcast(new MyEvent($data));
        return response()->json([
            'success' => 'bid submited',

        ]);
    }
}
