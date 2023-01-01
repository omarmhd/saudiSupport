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


Route::group([ 'prefix' => LaravelLocalization::setLocale(),'middleware'=>'auth'], function()
{
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::resource('/users',UserController::class);

    Route::resource('/orders',OrderController::class)->only([
        'edit','store','update','create','destroy'
    ]);;

    route::get('/search',[OrderController::class,'search'])->name('search');

    Route::get('/chat',function (){
        $rooms=\App\Models\Room::get();
        $orders=\App\Models\Order::get();
        return view('chat.index',compact('rooms','orders'));
    });

    Route::resource('/room',\App\Http\Controllers\RoomController::class);
    Route::resource('/message',\App\Http\Controllers\MessageController::class);

    Route::post('/attachments/{id}',[\App\Http\Controllers\Attachment::class,'attachments'])->name('attachments');
    Route::get('/getAttachments/{id}',[\App\Http\Controllers\Attachment::class,'getAttachments'])->name('getAttachments');
    Route::delete('/attachments/{id}',[\App\Http\Controllers\Attachment::class,'destroy'])->name('attachment.destroy');

    Route::get('/orders/{journey?}', [OrderController::class,'index'])->name('orders.index');

    Route::resource("departments",\App\Http\Controllers\DepartmentController::class);

    Route::prefix('order')->name('orders.')->group(function (){

        Route::get('edit/{id}/{typeOrder?}',[OrderController::class,'edit'])->name('edit');

        //Tracking
        Route::get('/indexTracking',[OrderController::class,'indexTracking'])->name('indexTracking');
        Route::get('/editTracking/{id}',[OrderController::class,'edit'])->name('editTracking');
        //end Tracking

        //Preview
        Route::get('/indexPreview',[OrderController::class,'indexPreview'])->name('indexPreview');
        Route::get('/editPreview/{id}',[OrderController::class,'edit'])->name('editPreview');
        //endPreview

        //completed
        Route::get('/indexCompleted',[OrderController::class,'indexCompleted'])->name('indexCompleted');
        Route::get('/indexCanceled',[OrderController::class,'indexCanceled'])->name('indexCanceled');
        //endCompleted


        //archive
        Route::get('/indexArchive',[OrderController::class,'indexArchive'])->name('indexArchive');
        //endArchive


    });



});

Route::get('/notifications/{id}',[\App\Http\Controllers\NotificationController::class,'read'])->name('notification');
Route::get('/notificationsReadAll',[\App\Http\Controllers\NotificationController::class,'readAll'])->name('notifications.readAll');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
