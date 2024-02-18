<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuctionController;
use App\Http\Controllers\Admin\BidPackageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChallengeController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RedeemCodeController;
use App\Http\Controllers\Admin\RewardController;
use App\Http\Controllers\Admin\SpecialOfferController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ProfileController;
use App\Models\Auction;
use App\Models\BiddingHistory;
use App\Models\Challenge;
use App\Models\City;
use App\Models\HighestBidderLevel;
use App\Models\Product;
use App\Models\Temprary;
use App\Models\User;
use App\Models\Winner;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Auth::routes(['broadcasting'=>false]);

// Route::get('/dashboard', function () {
//     return view('admin.pages.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {


    // Route::get('/', function () {
    //     return view('admin.dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/', function () {
        return view('admin.dashboard');
    });


    Route::controller(AdminController::class)->group(function () {
        Route::get('/edit-password', 'updatePasswordIndex')->name('edit-password');
        Route::get('/info', 'profile')->name('info');
        Route::get('/', 'index')->name('dashboard');
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::post('/profile/update-password/{user}', 'updatePassword')->name('update-password');
    });

    Route::resource('profile', AdminController::class);
    Route::resource('auctions', AuctionController::class);
    Route::resource('categories', CategoryController::class)->except(['create', 'show', 'edit']);
    Route::resource('bidPackages', BidPackageController::class)->except(['create', 'show', 'edit']);
    Route::resource('rewards', RewardController::class)->except(['create', 'show', 'edit']);
    Route::resource('states', StateController::class)->except(['create', 'show', 'edit']);
    Route::resource('cities', CityController::class)->except(['create', 'show', 'edit']);
    Route::resource('products', ProductController::class);
    Route::resource('specialOffers', SpecialOfferController::class);
    Route::resource('challenges', ChallengeController::class);
    Route::resource('redeemCodes', RedeemCodeController::class);

    Route::controller(ProductController::class)->group(function () {


        Route::get('/edit-products/{product}', 'edit')->name('edit-products');
    });
});


Route::controller(ProductController::class)->group(function () {

    Route::post('/save-rich-text', 'saveRichText');
    Route::post('/get-rich-text', 'getRichText');
    Route::get('/edit-products/{product}', 'edit')->name('edit-products');
});

require __DIR__ . '/auth.php';



Route::controller(ProductController::class)->group(function () {

    Route::get('image/upload', 'fileCreate');
    Route::post('image/upload/store', 'fileStore');
    Route::post('image/delete', 'fileDestroy');
});






//vue development Routes

Route::get('/vue/v1/{any?}', function () {
    return view('app');
})->where('any', '.*');


Route::get('/test', function () {



    // fetch daily challenges
    $users = User::all();
    foreach ($users as $user) {
        foreach ($user->challenges as $user_challenge) {
            // check user progress in specific challenge
            
            if ($user_challenge->pivot->status === 1 && $user_challenge->time_type ===1) {
                //challenge is active and is daily

                // check for the type of challenge
                // 1 = bidding  - 2= winning auction (both in spec category)
                if ($user_challenge->type === 1) {
                    //bidding

                    //count user bids in past 24h
                    $past_24h = Carbon::now()->subMinutes(1440);

                    // count of bidding in specific category

                    $count = BiddingHistory::where('created_at', '>=', $past_24h)
                        ->where('category_id', $user_challenge->category_id)->count();
                    if ($count >= $user_challenge->number_to_win) {
                        // user has won the chalenge
                        //rewarding bid to user
                        $user->bid_amount = $user->bid_amount + $user_challenge->reward->amount;
                        $user->save();
                        //update user challeng to won 
                        $user->challenges()->updateExistingPivot($user_challenge->id, ['status' => 3]);
                    }
                } elseif ($user_challenge->type === 2) {
                    //auction winning
                    $past_24h = Carbon::now()->subMinutes(1440);
                    $product_ids = [];
                    foreach ($user_challenge->category->products as $product) {
                        $product_ids[] = $product->id;
                    }

                    //check user wins in past 24h in specific product ids array
                    $count = Winner::where('user_id', $user->id)->where('created_at', '>=', $past_24h)
                        ->whereIn('product_id', $product_ids)->count();

                    if ($count >= $user_challenge->number_to_win) {
                        $user->bid_amount = $user->bid_amount + $user_challenge->reward->amount;
                        $user->save();
                        //update user challeng to won 
                        $user->challenges()->updateExistingPivot($user_challenge->id, ['status' => 3]);
                    }
                }
            }
        }
    }
});
