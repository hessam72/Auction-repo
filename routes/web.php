<?php

use App\Events\TestEvent;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuctionController;
use App\Http\Controllers\Admin\BidPackageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChallengeController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RedeemCodeController;
use App\Http\Controllers\Admin\RewardController;
use App\Http\Controllers\Admin\ShippedProductsController;
use App\Http\Controllers\Admin\SpecialOfferController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\WinnerController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ProfileController;
use App\Http\Resources\UserResource;
use App\Models\Auction;
use App\Models\BidBuddy;
use App\Models\BiddingHistory;
use App\Models\BiddingQueue;
use App\Models\Challenge;
use App\Models\City;
use App\Models\HighestBidderLevel;
use App\Models\Product;
use App\Models\Temprary;
use App\Models\TrackVisit;
use App\Models\User;
use App\Models\UserChallenge;
use App\Models\Winner;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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

Route::middleware('auth')->get('/dashboard', function () {
    return view('admin.dashboard');
}); 
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {


    // Route::get('/', function () {
    //     return view('admin.dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    }); 
    Route::get('/admin', function () {
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
    Route::resource('tickets', TicketController::class);
    Route::resource('winners', WinnerController::class);
    Route::resource('shipped_products', ShippedProductsController::class);

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
    $challenge = Challenge::first();
    $users = User::where('status', 1)->get();
    foreach ($users as $user) {
      dd(User::CalculateUserLevel($user->id) === $challenge->level);
        if (User::CalculateUserLevel($user->id) === $challenge->level) {
            //user is on same level as the challenge
          dd();
        }
    }





    $bids_placed = BiddingHistory::where('user_id' ,2 )->where('auction_id' , 546)->count();
    dd($bids_placed);



        //fetch auctions that are live 
        $liveAuctions = Auction::where('status', 100)->orderBy('timer', 'DESC')->get();
        $auction = Auction::find(546);

        $excuted_bids = [];
        //check if they have bid in queue
        // foreach ($liveAuctions as $auction) {
            $next_bid = $auction->next_bidding_queue;
dd($auction->uniqe_bid_buddies);
            if ($next_bid) {
                //has bid to run


            //   check to see if next buddy in queue is from different user than latest auction bidder
            if(count($auction->uniqe_bid_buddies)===0){
                return;
            }
               
                // $auction->current_winner_id = $auction->current_winner->id;
                // "user_id" => $next_bid->bid_buddy->user_id,

                // "current_winner_id" => $next_bid->bid_buddy->user_id,
                // "current_winner_username" => $next_bid->bid_buddy->user->username,





                //check timer
                $now = Carbon::now()->subSeconds(3);
                $next_3_sec = Carbon::now()->addSeconds(4);
                if ($auction->timer->between($now, $next_3_sec)) {
                    // submit bid ...
                    $new_price = $auction->current_price + 1;
                    // $new_timer = Carbon::create($auction->timer)->addSeconds(10);
                    $new_timer = Carbon::now()->addSeconds(10);

                    try {
                        DB::beginTransaction();
                        $auction->current_price = $new_price;
                        // TODO fix user id
                        $auction->current_winner_id = 2;
                        $auction->timer = $new_timer;

                        $auction->save();
                        // TODO fix user id
                        BiddingHistory::create([
                            "user_id" => 2,
                            "auction_id" => $auction->id,
                            "category_id" => $auction->product->category->id,
                            "bid_price" => $new_price
                        ]);
                        $next_bid->status = 0;
                        $next_bid->save();

                        $bidBuddy = BidBuddy::find($next_bid->bid_buddy_id);
                        //check if user still has bids in their bot
                        if ($bidBuddy->available_bids > 1) {
                            BiddingQueue::create([
                                'bid_buddy_id' => $bidBuddy->id,
                                'auction_id' => $auction->id,
                                'status' => 1 // pending and ready to be submitted
                            ]);
                        }
                        $bidBuddy->available_bids -= 1;
                        $bidBuddy->save();


                        DB::commit();

                        $new_queue=$auction->next_bidding_queue;

                        // TODO fix user id + name
                        //add auction to excuted bids array
                        $excuted_bids[] = [
                            'id' => $auction->id,
                            'bid_price' => $new_price,
                            "current_winner_id" => 2,
                            "current_winner_username" => 'test name',
                            "timer" => $new_timer,
                            // 'bidderQueueId' => $next_bid->id,
                            "bidding_queues" => $new_queue,

                        ];
                    } catch (\Exception $e) {
                        DB::rollback();
                    }
                }
            }
        // }
       
        // dd($excuted_bids);

        //if there was any new bid submitted then broadcast it
        if (count($excuted_bids) > 0) {
            broadcast(new TestEvent($excuted_bids));
        }
    



    // $auc = Auction::first();

    // dd($auc->current_winner);

    // // fetch daily challenges
    // $users = User::where('status', 1)->get();
    // $past_week = Carbon::now()->subMinutes(43200);

    // foreach ($users as $user) {
    //     foreach ($user->challenges as $user_challenge) {
    //         // check user progress in specific challenge
    //         if ($user_challenge->pivot->status === 1 && $user_challenge->time_type === 3) {
    //             //challenge is active and is daily

    //             // check for the type of challenge
    //             // 1 = bidding  - 2= winning auction (both in spec category)
    //             if ($user_challenge->type === 1) {
    //                 //bidding

    //                 //count user bids in past 24h

    //                 // count of bidding in specific category

    //                 $count = BiddingHistory::where('created_at', '>=', $past_week)
    //                     ->where('category_id', $user_challenge->category_id)->count();
    //                 if ($count >= $user_challenge->number_to_win) {
    //                     // user has won the chalenge
    //                     //rewarding bid to user
    //                     $user->bid_amount = $user->bid_amount + $user_challenge->reward->amount;
    //                     $user->save();
    //                     //update user challeng to won 
    //                     $user->challenges()->updateExistingPivot($user_challenge->id, ['status' => 3]);
    //                 }
    //             } elseif ($user_challenge->type === 2) {
    //                 //auction winning
    //                 dd('auction win check');
    //                 $product_ids = [];
    //                 foreach ($user_challenge->category->products as $product) {
    //                     $product_ids[] = $product->id;
    //                 }

    //                 //check user wins in past 24h in specific product ids array
    //                 $count = Winner::where('user_id', $user->id)->where('created_at', '>=', $past_week)
    //                     ->whereIn('product_id', $product_ids)->count();

    //                 if ($count >= $user_challenge->number_to_win) {
    //                     $user->bid_amount = $user->bid_amount + $user_challenge->reward->amount;
    //                     $user->save();
    //                     //update user challeng to won 
    //                     $user->challenges()->updateExistingPivot($user_challenge->id, ['status' => 3]);
    //                 }
    //             }
    //         }
    //     }
    // }
});
