<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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


Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::resource('/users',UserController::class);
    Route::resource('/orders',OrderController::class);
    Route::prefix('orders')->name('orders.')->group(function (){
        Route::get('indexTracking',[OrderController::class,'indexTracking'])->name('indexTracking');
        Route::get('indexPreview',[OrderController::class,'indexPreview'])->name('indexPreview');
        Route::get('indexCompleted',[OrderController::class,'indexCompleted'])->name('indexCompleted');
        Route::get('indexCanceled',[OrderController::class,'indexCanceled'])->name('indexCanceled');
    });

    Route::resource('/orders',OrderController::class);


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
