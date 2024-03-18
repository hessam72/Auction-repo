<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Product;
use App\Models\Winner;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function home_statistics()
    {
        // Live Auctions count
        $live_count = Auction::where('start_time' ,'<', Carbon::now())->count();

        // Upcomming Auctions count
        $starting_soon_count = Auction::where('start_time' ,'>', Carbon::now())->count();

        // Total Wins count
        $win_count = Winner::count();
        // Products count
        $product_count = Product::count();

        return response([
            'live_count' => $live_count,
            'starting_soon_count' => $starting_soon_count,
            'win_count' => $win_count,
            'product_count' => $product_count,
        ]);
    }
}
