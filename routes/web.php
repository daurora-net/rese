<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth\EmailVerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::group(['middleware' => ['verified']], function () {
    Route::get('/', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/search', [ShopController::class, 'search'])->name('shop.search');
    Route::get('/{shop}/favorite', [ShopController::class, 'favorite'])->name('shop.favorite');
    Route::get('/detail/{id}', [ShopController::class, 'detail'])->name('shop.detail');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::post('/reserve/done', [ReservationController::class, "create"])->name("reserve.create");
    Route::post('/reserve/update', [ReservationController::class, 'update'])->name('reserve.update');
    Route::get('/mypage', [UserController::class, 'mypage'])->name('shop.mypage');
    Route::post('reserve/delete', [ReservationController::class, 'delete'])->name('reserve.delete');
    Route::get('/reserve/{id}', [ReservationController::class, 'show'])->name('reserve.show');
    // Route::get('/pdf/{id}', [PDFController::class, 'show'])->name('pdf.show');
});

// verified
// auth
// メール確認の通知
// メール確認のハンドラ
// メール確認の再送信
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

require __DIR__ . '/auth.php';