<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BuyItNowOfferResource;
use App\Models\BuyItNowOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyItNowOfferController extends Controller
{
    public function all(){
        $user_offers=BuyItNowOffer::where('user_id' , Auth::user()->id)->where('status' , 1)->with('product')->get();
        return new BuyItNowOfferResource($user_offers);
    }
}
