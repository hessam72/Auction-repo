<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SpecialOfferResource;
use App\Models\SpecialOffer;
use Illuminate\Http\Request;

class SpecialOfferController extends Controller
{
    public function index(){

        $data= SpecialOffer::where('status' , 1)->latest()->first();
        return new SpecialOfferResource($data);
    }
}
