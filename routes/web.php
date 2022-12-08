<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/search', [ShopController::class, 'search'])->name('shop.search');
    Route::get('/{shop}/favorite', [ShopController::class, 'favorite'])->name('shop.favorite');
    Route::get('/detail/{id}', [ShopController::class, 'detail'])->name('shop.detail');
    Route::post('reserve/create', [ReservationController::class, "create"])->name("reserve.create");
    Route::get('reserve/done', [ReservationController::class, "create"])->name("reserve.done");
    Route::get('/mypage', [UserController::class, 'mypage'])->name('shop.mypage');
    Route::post('reserve/delete', [ReservationController::class, 'delete'])->name('reserve.delete');
});
require __DIR__ . '/auth.php';