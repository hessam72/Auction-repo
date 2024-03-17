<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BidPackageResource;
use App\Models\BidPackage;
use Illuminate\Http\Request;

class BidPackageController extends Controller
{
    public function all(Request $request)
    {
        // calling from homepage
        $skip = 0;
        $take = 10;
        if ($request->has('from_home')) {
            $take = 3;
        }
        // <!-- first package is most expensive and main one -->

        return BidPackageResource::collection(BidPackage::orderBy('price','desc')->skip($skip)->take($take)->get());
    }
}
