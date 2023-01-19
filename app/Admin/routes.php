<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Admin\Controllers\HomeController;
use App\Admin\Controllers\ReservationController;
use App\Admin\Controllers\ShopController;
use App\Admin\Controllers\UserController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    // 'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->get('/', [HomeController::class, 'index'])->name('home');
    $router->resource('/reservations', ReservationController::class);
    $router->resource('/shops', ShopController::class);
    $router->resource('/users', UserController::class);
    $router->get('/send/mail', [UserController::class, 'sendMail'])->name('send.mail');
});
