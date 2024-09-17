<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

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

Route::middleware(['auth'])->group(function () {
    Route::resource('brands', BrandController::class);
    Route::resource('products', ProductController::class);
    Route::post('/reset_pass', 'App\Http\Controllers\Auth\ChangePasswordController@reset')->name('reset_pass');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

Auth::routes();
