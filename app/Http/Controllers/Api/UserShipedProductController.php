<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserShipedProductResource;
use App\Models\BuyItNowOffer;
use App\Models\Transaction;
use App\Models\UserShipedProduct;
use App\Models\Winner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class UserShipedProductController extends Controller
{
    public function all()
    {
        $shiped = UserShipedProduct::where('user_id', Auth::user()->id)->with('product', 'city')->get();

        return  new UserShipedProductResource($shiped);
    }
    public function store(Request $request)
    {

        //store user shiped product
        $request->validate([
            "address" => "required",
            "postal_code" => "required",
            "price" => "required",
            "product_id" => "required",
            "state_id" => "required",
            "city_id" => "required",
            "transaction_id" => "required",
        ]);
        $reward_bids = 0;
        if ($request->has('reward_bids')) {
            $reward_bids = $request->reward_bids;
        }
        try {
            DB::beginTransaction();
            // save shippind data
            $shipped_product=UserShipedProduct::create([
                "user_id" => Auth::user()->id,
                "status" => 1,
                "reward_bids" => $reward_bids,
                "transaction_id" => $request->transaction_id,
                "address" => $request->address,
                "postal_code" => $request->postal_code,
                "price" => $request->price,
                "product_id" => $request->product_id,
                "state_id" => $request->state_id,
                "city_id" => $request->city_id,

            ]);
            
            Transaction::where('id' , $request->transaction_id)->update([
                'item_id'=>$shipped_product->id
            ]);

            // disable buy it now offer
            if($request->has('buy_now_offer_id')){
                // request comes from buy it now offers not buying product nor paying a win
                BuyItNowOffer::where('id' , $request->buy_now_offer_id)->update([
                    'status' =>3
                ]);
            }

            // change win status
            if($request->has('win_id')){
                // request comes from buy it now offers not buying product nor paying a win
                Winner::where('id' , $request->win_id)->update([
                    'status' =>2 // waiting for payment
                ]);
            }


            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return Response::json([
                'message' => $e,
            ], 500);
        }



        return Response::json([
            'message' => "shipping data stored successfully",
        ], 201);
    }
    public function change_transaction(Request $request){
        // change transaction id for new payment 

        $request->validate([
            "id" => "required",
          
            "transaction_id" => "required",
        ]);


        UserShipedProduct::where('id' , $request->id)->update([
            'transaction_id' => $request->transaction_id
        ]);
        return Response::json([
            'message' => "new payment added to shipping product successfully",
        ], 201);
    }
}
