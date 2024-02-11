<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
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

Route::group(['prefix' => 'admin', 'as' => 'admin.auth.'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('index');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('admin.dashboard');


    Route::resource('/products', ProductController::class)
        ->only(['index', 'create', 'edit', 'store', 'update', 'destroy'])
        ->names([
            'index' => 'admin.product.index',
            'create' => 'admin.product.create',
            'edit' => 'admin.product.edit',
            'store' => 'admin.product.store',
            'update' => 'admin.product.update',
            'destroy' => 'admin.product.destroy',
        ]);

    Route::resource('/users', UserController::class)
        ->only(['index', 'create', 'edit', 'store', 'update', 'destroy'])
        ->names([
            'index' => 'admin.user.index',
            'create' => 'admin.user.create',
            'edit' => 'admin.user.edit',
            'store' => 'admin.user.store',
            'update' => 'admin.user.update',
            'destroy' => 'admin.user.destroy',
        ]);

    Route::resource('/categories', CategoryController::class)
        ->only(['index', 'create', 'edit', 'store', 'update', 'destroy'])
        ->names([
            'index' => 'admin.category.index',
            'create' => 'admin.category.create',
            'edit' => 'admin.category.edit',
            'store' => 'admin.category.store',
            'update' => 'admin.category.update',
            'destroy' => 'admin.category.destroy',
        ]);

    Route::resource('/orders', OrderController::class)
        ->only(['index', 'create', 'edit', 'store', 'update', 'destroy'])
        ->names([
            'index' => 'admin.order.index',
            'create' => 'admin.order.create',
            'edit' => 'admin.order.edit',
            'store' => 'admin.order.store',
            'update' => 'admin.order.update',
            'destroy' => 'admin.order.destroy',
        ]);
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
