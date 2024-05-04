<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('index'));

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


Route::post('/api/order/create/cart', \App\Components\Order\Infrastructure\Http\Handler\CreateFromCartOrderHandler::class)
    ->name('order.createFromCart');

Route::post('/api/order/create', \App\Components\Order\Infrastructure\Http\Handler\CreateExtendedOrderHandler::class)
    ->name('order.create');
