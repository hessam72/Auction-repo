<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Public\Api\AuctionController;
use App\Http\Controllers\User\Api\BiddingController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/categories-list', 'App\Http\Controllers\Admin\CategoryController@sendJsonResponse');
Route::get('/test' , function(){
    return 'test';
});

Route::resource('/auctions', AuctionController::class)->except(['create', 'delete', 'edit', 'destroy']);

Route::controller(BiddingController::class)->prefix('/auction')->group(function () {

        
    Route::post('/bidding/create', 'createBid');
});