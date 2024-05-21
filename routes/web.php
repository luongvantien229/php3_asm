<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index']);
Route::get('/productDetail/{id}', [SiteController::class, 'productDetail']);
Route::get('/productInProducer/{producer_id}', [SiteController::class, 'productInProducer']);
Route::get('/notification', [SiteController::class, 'notification']);


