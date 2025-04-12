<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BuyItNowOfferResource;
use App\Models\Auction;
use App\Models\BuyItNowOffer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyItNowOfferController extends Controller
{
    public function all()
    {
        $user_offers = BuyItNowOffer::where('user_id', Auth::user()->id)->where('status', 1)->with('product')->get();
        return new BuyItNowOfferResource($user_offers);
    }

    public function handleBuyNow(Request $request)
    {
        $request->validate([
            'auction_id' =>  'required',
        ]);

        $auction = Auction::findOrFail($request->auction_id);

        $existBuyNowOffer = BuyItNowOffer::where('user_id', Auth::user()->id)
            ->where('product_id', $auction->product_id)
            ->where('status', 1)->first();

        if (empty($existBuyNowOffer)) {
            BuyItNowOffer::create([
                'product_id' => $auction->product_id,
                'user_id' => Auth::user()->id,
                'spent_bids' => 0,
                'time_limit' => Carbon::now()->addDays(5),
                'status' => 1
            ]);
        }

        return 'done';
    }
}
