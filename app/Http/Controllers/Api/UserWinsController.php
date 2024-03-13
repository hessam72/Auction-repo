<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WinnerResource;
use App\Models\Winner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserWinsController extends Controller
{
    public function user_wins()
    {
        // $user_wins=Winner::where('user_id' , Auth::user()->id)->with('product.product_galleries')->get();
        $user_wins=Winner::where('user_id' , Auth::user()->id)->with('product')->get();
        return new WinnerResource($user_wins);
    }
}
