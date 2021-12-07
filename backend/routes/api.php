<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\TrolleyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::post('login', [RegisterController::class, 'login'])->name('login');
     
Route::middleware('auth:api')->group( function () {
    Route::resource('products', ProductController::class);

    Route::get('trolleys', [TrolleyController::class, 'itemList'])->name('itemList');

    Route::get('current_location', [TrolleyController::class, 'currentLocation'])->name('get_current_location');
    Route::get('current_location/{slug}', [TrolleyController::class, 'itemCurrentLocation'])->name('get_item_current_location');
    Route::get('basic_location', [TrolleyController::class, 'basicLocation'])->name('get_basic_location');
    Route::get('basic_location/{slug}', [TrolleyController::class, 'itemBasicLocation']);

    Route::post('current_location', [TrolleyController::class, 'postCurrentLocation'])->name('post_current_location');
    Route::post('basic_location', [TrolleyController::class, 'postBasicLocation'])->name('post_basic_location');
});
