<?php


use App\Events\AutoBiddingEvent;
use App\Events\MyEvent;
use App\Events\TestEvent;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Api\BiddersController;
use App\Http\Controllers\Api\BookmarkController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\SpecialOfferController;
use App\Http\Controllers\Api\WinnerController;
use App\Http\Controllers\Auth\ApiController;
use App\Http\Controllers\Api\AuctionController;
use App\Http\Controllers\Api\BiddingController;
use App\Models\Auction;
use App\Models\BidBuddy;
use App\Models\BiddingHistory;
use App\Models\BiddingQueue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(ApiController::class)->prefix('/auth')->group(function () {
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
});


Route::middleware('auth:sanctum')->controller(AuctionController::class)->prefix('/auctions')->group(function () {

    Route::post('/search', 'search');

    Route::post('/filter', 'filter');
    Route::post('/test-image', 'test');
});
Route::controller(AuctionController::class)->group(function () {
    Route::get('/pusher', 'test_pusher');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/categories-list', 'App\Http\Controllers\Admin\CategoryController@sendJsonResponse');
Route::get('/test', function () {



    dd(Carbon::now());
});



Route::resource('/auctions', AuctionController::class)->except(['create', 'delete', 'edit', 'destroy']);


Route::controller(BiddingController::class)->prefix('/auction')->group(function () {


    Route::post('/bidding/create', 'createBid');
    Route::post('/bidding/storeBidBuddy', 'storeBidBuddy');
    Route::post('/bidding/storeBidBuddyBid', 'storeBidBuddyBid');
});

Route::controller(BookmarkController::class)->prefix('/bookmark')->group(function () {


    Route::post('/store', 'storeBookmark');
    Route::post('/user_bookmark', 'userBookmark');
    Route::delete('/delete', 'destroyBookmark');
});
Route::controller(SpecialOfferController::class)->prefix('/special_offer')->group(function () {


    Route::get('/', 'index');
});
Route::controller(WinnerController::class)->prefix('/winners')->group(function () {


    Route::post('/auction', 'index');
    Route::post('/store', 'storeWinner');
});
Route::controller(CommentController::class)->prefix('/comments')->group(function () {


    Route::post('/auction', 'auctionComments');
    Route::post('/store', 'storeComment');
});
Route::controller(BiddersController::class)->prefix('/bidders')->group(function () {


    Route::post('/auction', 'biddersInAuction');
    
});
