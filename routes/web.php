<?php

use Illuminate\Support\Facades\Route;

Route::post('/api/order', \App\Components\Order\Infrastructure\Http\Handler\CreateOrderHandler::class)
    ->name('order.create');

Route::get('/api/order/preview', \App\Components\Order\Infrastructure\Http\Handler\PreviewOrderHandler::class)
    ->name('order.preview');


Route::post('/api/cart/add/{uuid}', \App\Components\Cart\Infrastructure\Http\Handler\AddItemCartHandler::class)
    ->name('cart.add');

Route::get('/api/cart/display', \App\Components\Cart\Infrastructure\Http\Handler\DisplayCartHandler::class)
    ->name('cart.display');

Route::post('/api/cart/remove/{uuid}', \App\Components\Cart\Infrastructure\Http\Handler\RemoveItemCartHandler::class)
    ->name('cart.remove');

Route::post('/api/cart/destroy', \App\Components\Cart\Infrastructure\Http\Handler\DestroyCartHandler::class)
    ->name('cart.destroy');


Route::post('/api/product/create', \App\Components\Product\Infrastructure\Http\Handler\CreateProductHandler::class)
    ->name('product.create');

Route::get('/api/product/{uuid}', \App\Components\Product\Infrastructure\Http\Handler\ShowProductHandler::class)
    ->name('product.show');
