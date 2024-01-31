<?php

namespace App\Http\Controllers\User\Api;

use App\Events\MyEvent;
use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\BiddingHistory;
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
         
        $new_price=$auction->current_price + 1;
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


        $data = array("id" => $data->auction_id, "bid_price" => $new_price, "current_winner_id" => 2, "timer" => Carbon::now()->addSeconds(10));
        echo json_encode($data);

        broadcast(new MyEvent($data));
        return response()->json([
            'success' => 'bid submited',

        ]);
    }
}
