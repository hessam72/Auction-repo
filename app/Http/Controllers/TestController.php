<?php

namespace App\Http\Controllers;

use App\Models\BiddingQueue;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request)
    {

        BiddingQueue::where('id', 559)->update([
            'status' => 0,
        ]);
        return 'done';
    }
}
