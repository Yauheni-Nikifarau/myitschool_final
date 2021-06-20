<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TripsController;
use App\Http\Controllers\HotelsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [MainController::class, 'index']);
Route::get('/trips/{slug}', [TripsController::class, 'show']);
Route::get('/hotels', [HotelsController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/trips', function () {
    return view('trips');
});

Route::get('/trip', function () {
    return view('trip');
});



Route::get('/hotel', function () {
    return view('hotel');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/myorders', function () {
    return view('myOrders');
});

Route::get('/order', function () {
    return view('order');
});
