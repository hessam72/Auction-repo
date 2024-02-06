<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\BiddingHistory;
use App\Models\User;
use Illuminate\Http\Request;

class BiddersController extends Controller
{
    public function biddersInAuction(Request $request)
    {
        $request->validate([
            'auction_id' =>  'required',
        ]);

        // fetch user ids from bidding history of this auction
        $user_ids = BiddingHistory::where('auction_id', $request->auction_id)->distinct()->get(['user_id']);
        $ids = [];
        foreach ($user_ids as $item) {
            $ids[] = $item->user_id;
        }

        return new UserResource(User::whereIn('id', $ids)->get());

    }
}
