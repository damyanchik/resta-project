<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
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

Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])
        ->name('admin.auth.index');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('admin.auth.login');

    Route::get('/logout', [AuthController::class, 'logout'])
        ->name('admin.auth.logout');


    Route::get('/', [DashboardController::class, 'index'])
        ->name('admin.dashboard');


    Route::get('/products', [ProductController::class, 'index'])
        ->name('admin.product.index');

    Route::get('/products/create', [ProductController::class, 'create'])
        ->name('admin.product.create');

    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])
        ->name('admin.product.edit');

    Route::post('/products', [ProductController::class, 'store'])
        ->name('admin.product.store');

    Route::put('/products/{id}', [ProductController::class, 'update'])
        ->name('admin.product.update');
});

Route::get('/', function () {
    return view('home.index');
});

Route::get('/menu', function () {
    return view('menu.index');
});

Route::get('/order', function () {
    return view('order.index');
});

Route::get('/summary', function () {
    return view('summary.index');
});

Route::get('/order', function () {
    return view('order.index');
});
