<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BidPackage;
use App\Models\Transaction;
use App\Models\User;
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
            "item_id" => 'required',
            "payment_description" => 'required',
            "payment_id" => 'required',
            "status" => 'required',


        ]);

        $transaction = Transaction::create([
            "user_id" => Auth::user()->id,
            "amount" => $request->amount,
            "order_id" => $request->order_id,
            "item_type" => $request->item_type,
            "item_id" => $request->item_id,
            "payment_description" => $request->payment_description,
            "payment_id" => $request->payment_id,
            "status" => $request->status,
        ]);
        return $transaction;
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
            } else {
                // product purchase
                // $bid_package=BidPackage::find($transaction->item->id);


                

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
}
