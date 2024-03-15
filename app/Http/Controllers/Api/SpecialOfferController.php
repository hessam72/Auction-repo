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
        if ($data->type === 1) {
			// bid
		
			// return $data->bidPackage;
            $data= SpecialOffer::where('status' , 1)->with('bidPackage')->latest()->first();
           


		} elseif ($data->type === 2) {
			// product
            // return $data->product;
            $data= SpecialOffer::where('status' , 1)->with('product')->latest()->first();


		}
        
        return new SpecialOfferResource($data);
    }
}
