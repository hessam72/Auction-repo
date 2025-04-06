<?php

namespace App\Http\Controllers;

use App\Models\BiddingQueue;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request)
    {

        dd(Carbon::now());
        // BiddingQueue::where('id', 559)->update([
        //     'status' => 0,
        // ]);
        return 'done';
    }
}
