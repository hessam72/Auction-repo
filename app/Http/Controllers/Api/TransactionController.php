<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BidPackage;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserShipedProduct;
use App\Models\Winner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([

            "amount" => 'required',
            "order_id" => 'required',
            "item_type" => 'required',
            // "item_id" => 'required',
            "payment_description" => 'required',
            "payment_id" => 'required',
            "status" => 'required',


        ]);
        $item_id = null;
        if ($request->has('item_id')) {
            $item_id = $request->item_id;
        }

        $transaction = Transaction::create([
            "user_id" => Auth::user()->id,
            "amount" => $request->amount,
            "order_id" => $request->order_id,
            "item_type" => $request->item_type,
            "item_id" => $item_id,
            "payment_description" => $request->payment_description,
            "payment_id" => $request->payment_id,
            "status" => $request->status,
        ]);
        return $transaction;
    }
    //convert win to bids
    public function rewardBid(Request $request)
    {
        $request->validate([
            'winner_id' =>  'required',
        ]);
        $win = Winner::find($request->winner_id);
        $reward_bid = $win->win_price * 100;
        $user = $win->user;
        $user->bid_amount = $user->bid_amount + $reward_bid;
        $user->save();

        $win->status = 200;
        $win->save();


        return response()->json([
            'success' => 'Your win converted to '.$reward_bid.' Bids successfully',

        ], 200);
    }
    public function saveSuccessfullPay(Request $request)
    {
        $request->validate([
            "order_id" => "required",

        ]);
        $transaction = Transaction::where('order_id', $request->order_id)->first();
        $msg = "";
        if ($transaction->status != 1) {
            return Response::json([
                'message' => "The Page Expired",
            ], 400);
        }
        try {
            DB::beginTransaction();

            if ($transaction->item_type === 1) {
                // bid package purchase

                $bid_package = BidPackage::find($transaction->item_id);
                // add bid amount to user
                $user = User::find($transaction->user_id);
                $user->bid_amount = $user->bid_amount + $bid_package->bid_amount;
                $user->save();
                $transaction->status = 100;
                $transaction->save();
                $msg = "The Amount of " . $bid_package->bid_amount . " bids added to your Account";
            } elseif ($transaction->item_type === 2) {
                // product purchase

                $user_shipped_product = UserShipedProduct::where('id', $transaction->item_id)->first();

                // add reward to user bid amount if exist
                if ($user_shipped_product->reward_bids > 0) {
                    $user = User::find($transaction->user_id);
                    $user->bid_amount = $user->bid_amount + $user_shipped_product->reward_bids;
                    $user->save();
                }
                $user_shipped_product->status = 100; //payment done and ready to shipping
                $user_shipped_product->save();

                $transaction->status = 100;
                $transaction->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return Response::json([
                'message' => $e,
            ], 500);
        }


        return Response::json([
            'message' => $msg,
        ], 201);
    }


    public function saveFailPay(Request $request)
    {
        $request->validate([
            "order_id" => "required",

        ]);
        $transaction = Transaction::where('order_id', $request->order_id)->first();
        $msg = "";
        if ($transaction->status != 1) {
            return Response::json([
                'message' => "The Page Expired",
            ], 400);
        }
        try {
            DB::beginTransaction();

            if ($transaction->item_type === 1) {
                // bid package purchase

                $transaction->status = 400;
                $transaction->save();
            } elseif ($transaction->item_type === 2) {
                // product purchase

                $user_shipped_product = UserShipedProduct::where('id', $transaction->item_id)->first();


                $user_shipped_product->status = 1; //rolling back to ready for payment
                $user_shipped_product->save();

                $transaction->status = 400;
                $transaction->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return Response::json([
                'message' => $e,
            ], 500);
        }


        return Response::json([
            'message' => $msg,
        ], 201);
    }
}
