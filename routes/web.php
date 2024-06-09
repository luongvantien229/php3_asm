<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index']);
Route::get('/productDetail/{id}', [SiteController::class, 'productDetail']);
Route::get('/productInProducer/{producer_id}', [SiteController::class, 'productInProducer']);
Route::get('/notification', [SiteController::class, 'notification']);
Route::get('/product', [SiteController::class, 'product']);
Route::get('/product/{id}', [SiteController::class, 'product']);
Route::post('/comment_save', [SiteController::class,'comment_save']);

