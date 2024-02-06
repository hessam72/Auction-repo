<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WinnerResource;
use App\Models\Winner;
use Illuminate\Http\Request;

class WinnerController extends Controller
{
    public function index(Request $request)
    {

        $request->validate([
            'product_id' =>  'required',
        ]);

        $data = Winner::where('product_id', $request->product_id)->latest()->get();
        return new WinnerResource($data);
    }

    public function storeWinner(Request $request)
    {

        $request->validate([
            'product_id' =>  'required',
            'user_id' =>  'required',
            'win_price' =>  'required',
        ]);

        $data = Winner::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'win_price' => $request->user_id,
        ]);

        return response()->json([
            'success' => 'winner added successfully',

        ], 200);
      
    }
}
