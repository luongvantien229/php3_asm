<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProducerController;
use App\Http\Controllers\AdminProductController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', [SiteController::class, 'index']);
Route::get('/productDetail/{id}', [SiteController::class, 'productDetail']);
Route::get('/productInProducer/{producer_id}', [SiteController::class, 'productInProducer']);
Route::get('/notification', [SiteController::class, 'notification']);
Route::get('/product', [SiteController::class, 'product']);
Route::get('/product/{id}', [SiteController::class, 'product']);
Route::post('/comment_save', [SiteController::class, 'comment_save']);
Route::get('/addcart/{idsp}', [SiteController::class, 'addcart']);
Route::get('/viewcart', [SiteController::class, 'viewcart']);
Route::get('/delcart/{idsp}', [SiteController::class, 'delcart']);
Route::post('/updatecart', [SiteController::class, 'updatecart']);
Route::group(['prefix' => 'admin','middleware' => [AdminMiddleware::class]], function () {
    Route::resource('producer', AdminProducerController::class);
    Route::resource('product', AdminProductController::class);
});
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', [AdminController::class,'index']);
    Route::get('login', [AdminController::class,'login']);
    Route::post('login', [AdminController::class,'login_']);
    Route::get('logout', [AdminController::class, 'logout']);
    });

