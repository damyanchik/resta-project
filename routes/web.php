<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
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
            'index' => 'admin.orderDirection.index',
            'create' => 'admin.orderDirection.create',
            'edit' => 'admin.orderDirection.edit',
            'store' => 'admin.orderDirection.store',
            'update' => 'admin.orderDirection.update',
            'destroy' => 'admin.orderDirection.destroy',
        ]);
});

Route::get('/', function () {
    return view('home.index');
});

Route::get('/menu', function () {
    return view('menu.index');
});

Route::get('/orderDirection', function () {
    return view('orderDirection.index');
});

Route::get('/summary', function () {
    return view('summary.index');
});

Route::get('/orderDirection', function () {
    return view('orderDirection.index');
});


Route::get('/users-test', \App\Components\User\Infrastructure\Http\Handler\UserListingHandler::class)
    ->name('user.listing');

Route::get('/users-test/{id}', \App\Components\User\Infrastructure\Http\Handler\UserShowHandler::class)
    ->name('user.show');

Route::delete('/users-test/{id}', \App\Components\User\Infrastructure\Http\Handler\UserDeleteHandler::class)
    ->name('user.delete');

Route::post('/users-test', \App\Components\User\Infrastructure\Http\Handler\UserCreateHandler::class)
    ->name('user.store');

Route::put('/users-test/{id}', \App\Components\User\Infrastructure\Http\Handler\UserUpdateHandler::class)
    ->name('user.update');

Route::patch('/users-test/{id}/block', \App\Components\User\Infrastructure\Http\Handler\UserStatusHandler::class)
    ->name('user.block');
