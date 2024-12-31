<?php

use App\Events\TestEvent;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuctionController;
use App\Http\Controllers\Admin\BidPackageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChallengeController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\NotificationController;
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
use App\Http\Controllers\TestController;
use App\Http\Resources\TicketResource;
use App\Http\Resources\UserResource;
use App\Models\Auction;
use App\Models\BidBuddy;
use App\Models\BiddingHistory;
use App\Models\BiddingQueue;
use App\Models\Challenge;
use App\Models\City;
use App\Models\Comment;
use App\Models\HighestBidderLevel;
use App\Models\Product;
use App\Models\Temprary;
use App\Models\Ticket;
use App\Models\TrackVisit;
use App\Models\User;
use App\Models\UserChallenge;
use App\Models\UserShipedProduct;
use App\Models\Winner;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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

// Route::redirect('/dashboard', '/676fbdd1/dashboard');


Route::prefix('676fbdd1')->name('admin.')->middleware('auth')->group(function () {


    Route::redirect('/', '/676fbdd1/dashboard');

    // Route::redirect('/dashboard', '/admin/dashboard');

    Route::redirect('/676fbdd1', '/676fbdd1/dashboard');

    Route::controller(NotificationController::class)->group(function () {
        Route::post('/notifications/seen', 'seen_notifications');
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
    Route::resource('notifications', NotificationController::class);

    Route::controller(ProductController::class)->group(function () {


        Route::get('/edit-products/{product}', 'edit')->name('edit-products');
    });
});


Route::controller(ProductController::class)->group(function () {

    Route::post('/modify/save-rich-text', 'saveRichText');
    Route::post('/modify/get-rich-text', 'getRichText');
    Route::get('/modify/edit-products/{product}', 'edit')->name('edit-products');
});

require __DIR__ . '/auth.php';



Route::controller(ProductController::class)->group(function () {

    Route::get('image/upload', 'fileCreate');
    Route::post('image/upload/store', 'fileStore');
    Route::post('image/delete', 'fileDestroy');
});



Route::controller(TestController::class)->group(function () {
    Route::get('/test', 'test');

});


//vue development Routes
Route::get('{any?}', function () {
    return view('app');
})->where('any', '^(?!admin|products|modify|image|dashboard|test).*$');
