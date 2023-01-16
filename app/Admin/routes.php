<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
// use App\Admin\Controllers\UserController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->get('/', 'HomeController@index')->name('home');
    $router->get('/users/mail', 'UserController@mail')->name('user.mail');
    $router->post('/users/sendmail', 'UserController@sendMail')->name('send.mail');
    $router->resource('reservations', ReservationController::class);
    $router->resource('shops', ShopController::class);
    $router->resource('users', UserController::class);
    // $router->resource('mails', MailController::class);
});
