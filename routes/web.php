<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProducerController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
Route::group(['prefix' => 'admin', 'middleware' => [AdminMiddleware::class]], function () {
    Route::resource('producer', AdminProducerController::class);
    Route::resource('product', AdminProductController::class);
    Route::resource('user', AdminUserController::class);
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('login', [AdminController::class, 'login']);
    Route::post('login', [AdminController::class, 'login_']);
    Route::get('logout', [AdminController::class, 'logout']);
});
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login_']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/download', [SiteController::class, 'download'])->middleware('auth', 'verified');
Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'register_']);
Route::get('/forgot-password', [UserController::class, 'forgotPassword']);
Route::post('/forgot-password', [UserController::class, 'forgotPassword_']);
Route::get('/change-password/{id}', [UserController::class, 'changePassword']);
Route::post('/change-password/{id}', [UserController::class, 'changePassword_']);
Route::get('/thanks', [UserController::class, 'thanks']);
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/verify', function () {
    return view('verify-email');
})->middleware('auth')->name('verification.notice');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Thư kích hoạt đã gửi!');  
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('contact', [SiteController::class, 'contact']);
Route::post('contact', [SiteController::class, 'contact_']);

