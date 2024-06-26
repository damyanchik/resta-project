<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', fn() => view('index'))->where('any', '^(?!api).*');

Route::get('/admin', fn() => view('admin'));

Route::post('/api/cart/add/{uuid}', \App\Components\Cart\Infrastructure\Http\Handler\AddItemCartHandler::class)
    ->name('cart.add');

Route::get('/api/cart/display', \App\Components\Cart\Infrastructure\Http\Handler\DisplayCartHandler::class)
    ->name('cart.display');

Route::post('/api/cart/remove/{uuid}', \App\Components\Cart\Infrastructure\Http\Handler\RemoveItemCartHandler::class)
    ->name('cart.remove');

Route::post('/api/cart/destroy', \App\Components\Cart\Infrastructure\Http\Handler\DestroyCartHandler::class)
    ->name('cart.destroy');


Route::get('/api/product/listing', \App\Components\Product\Infrastructure\Http\Handler\ListingProductHandler::class)
    ->name('product.listing');

Route::post('/api/product/create', \App\Components\Product\Infrastructure\Http\Handler\CreateProductHandler::class)
    ->name('product.create');

Route::get('/api/product/{uuid}', \App\Components\Product\Infrastructure\Http\Handler\ShowProductHandler::class)
    ->name('product.show');

Route::post('/api/product/delete/{uuid}', \App\Components\Product\Infrastructure\Http\Handler\DeleteProductHandler::class)
    ->name('product.delete');


Route::get('/api/order/{uuid}', \App\Components\Order\Infrastructure\Http\Handler\ShowOrderHandler::class)
    ->name('order.show');

Route::get('/api/order/listing', \App\Components\Order\Infrastructure\Http\Handler\ListingOrderHandler::class)
    ->name('order.listing');

Route::post('/api/order/create/cart', \App\Components\Order\Infrastructure\Http\Handler\CreateFromCartOrderHandler::class)
    ->name('order.createFromCart');

Route::post('/api/order/create', \App\Components\Order\Infrastructure\Http\Handler\CreateExtendedOrderHandler::class)
    ->name('order.create');
