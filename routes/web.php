<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StripePaymentsController;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/search', [ShopController::class, 'search'])->name('shop.search');
    Route::get('/{shop}/favorite', [ShopController::class, 'favorite'])->name('shop.favorite');
    Route::get('/detail/{id}', [ShopController::class, 'detail'])->name('shop.detail');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reserve/{id}', [ReservationController::class, 'show'])->name('reserve.show');
    Route::post('/reserve/done', [ReservationController::class, "create"])->name("reserve.create");
    Route::post('/reserve/update', [ReservationController::class, 'update'])->name('reserve.update');
    Route::get('/mypage', [UserController::class, 'mypage'])->name('shop.mypage');
    Route::post('reserve/delete', [ReservationController::class, 'delete'])->name('reserve.delete');
    Route::get('/subscription', [StripePaymentsController::class, 'subscription'])->name('stripe.subscription');
    Route::post('/subscription/afterpay', [StripePaymentsController::class, 'afterpay'])->name('stripe.afterpay');
});
require __DIR__ . '/auth.php';
