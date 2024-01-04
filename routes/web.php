<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\ProfileController;
use App\Models\City;
use App\Models\Product;
use App\Models\Temprary;
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


// Route::get('/dashboard', function () {
//     return view('admin.pages.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {


    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/dashboard', function () {
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
    Route::resource('categories', CategoryController::class)->except(['create', 'show', 'edit']);
    Route::resource('states', StateController::class)->except(['create', 'show', 'edit']);
    Route::resource('cities', CityController::class)->except(['create', 'show', 'edit']);
    Route::resource('products', ProductController::class);
});


Route::controller(ProductController::class)->group(function () {

    Route::post('/save-rich-text', 'saveRichText');
    Route::post('/get-rich-text', 'getRichText');
    Route::get('/edit-products/{product}', 'edit')->name('edit-products');
});

require __DIR__ . '/auth.php';



Route::get('/test', function () {
    $temp = Product::create([
        'category_id' => 25,
            'title' => 'sddsdssd',
            'discount' => 0,
            'sales_count' => 44,
            'short_desc' => 'dddddddddddeeeeeeeeeeee',
            'description' => 'dsdsdsds',
            'price' => 4445,
            'product_inventory' => 54,
        
        
    ]);
    return $temp;
});
