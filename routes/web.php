<?php

use App\Http\Controllers\ChangePasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    Route::post('/reset_pass', 'App\Http\Controllers\Auth\ChangePasswordController@reset')->name('reset_pass');
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});

Auth::routes();
