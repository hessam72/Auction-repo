<?php

namespace App\Http\Controllers\User\Api;

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
     

        Auction::where('id', $data->auction_id)
            ->update([
                'current_price' => DB::raw('current_price+1'),
                'current_winner_id' => 2, 
                'timer' => Carbon::now()->addSeconds(10)
            ]);

        BiddingHistory::create([
            "user_id" => 2,
            "auction_id" => $data->auction_id,
            "bid_price" => $data->bid_price
        ]);

        User::where('id', 2)
            ->update([
                'bid_amount' => DB::raw('bid_amount-1'),
            ]);
        return response()->json([
            'success' => 'bid submited',

        ]);
    }
}
