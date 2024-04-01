<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::post('/api/order', \App\Components\Order\Infrastructure\Http\Handler\CreateOrderHandler::class)
//    ->name('order.create');

Route::get('/api/order/preview', \App\Components\Order\Infrastructure\Http\Handler\PreviewOrderHandler::class)
    ->name('order.preview');
//
//
//
//Route::get('/users-test', \App\Components\User\Infrastructure\Http\Handler\UserListingHandler::class)
//    ->name('user.listing');
//
//Route::get('/users-test/{id}', \App\Components\User\Infrastructure\Http\Handler\UserShowHandler::class)
//    ->name('user.show');
//
//Route::delete('/users-test/{id}', \App\Components\User\Infrastructure\Http\Handler\UserDeleteHandler::class)
//    ->name('user.delete');
//
//Route::post('/users-test', \App\Components\User\Infrastructure\Http\Handler\UserCreateHandler::class)
//    ->name('user.create');
//
//Route::put('/users-test/{id}', \App\Components\User\Infrastructure\Http\Handler\UserUpdateHandler::class)
//    ->name('user.update');
//
//Route::patch('/users-test/{id}/block', \App\Components\User\Infrastructure\Http\Handler\UserStatusHandler::class)
//    ->name('user.block');
