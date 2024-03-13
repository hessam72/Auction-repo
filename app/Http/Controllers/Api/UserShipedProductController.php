<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserShipedProductResource;
use App\Models\UserShipedProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserShipedProductController extends Controller
{
    public function all()
    {
        $shiped=UserShipedProduct::where('user_id' , Auth::user()->id)->with('product' , 'city')->get();

        return  new UserShipedProductResource($shiped);
    }
}
