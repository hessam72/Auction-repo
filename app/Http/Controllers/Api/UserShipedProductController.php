<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserShipedProductResource;
use App\Models\UserShipedProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        UserShipedProduct::create([
            "user_id"=>Auth::user()->id,
            "status"=>1, 
            "transaction_id" => 22,
            "address" => $request->address,
            "postal_code" => $request->postal_code,
            "price" => $request->price,
            "product_id" => $request->product_id,
            "state_id" => $request->state_id,
            "city_id" => $request->city_id,
           
        ]);
        return Response::json([
            'message' => "shipping data stored successfully",
        ], 201);

    }
}
