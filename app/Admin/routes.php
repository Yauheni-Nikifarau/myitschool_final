<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resource('users', UsersController::class);

    $router->resource('trips', TripController::class);

    $router->resource('hotels', HotelsController::class);

    $router->resource('orders', OrdersController::class);

    $router->resource('tags', TagsController::class);

    $router->get('find/hotels', 'TripController@findHotelsByName');
    $router->get('find/discounts', 'TripController@findDiscountsByValue');


});
