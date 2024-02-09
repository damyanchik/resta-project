<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;

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

Route::group(['prefix' => 'admin/auth', 'as' => 'admin.auth.'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('index');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('admin.dashboard');


    Route::resource('/products', ProductController::class)
        ->only(['index', 'create', 'edit', 'store', 'update'])
        ->names([
            'index' => 'admin.product.index',
            'create' => 'admin.product.create',
            'edit' => 'admin.product.edit',
            'store' => 'admin.product.store',
            'update' => 'admin.product.update',
        ]);


    Route::get('/users', [UserController::class, 'index'])
        ->name('admin.user.index');

    Route::get('/users/{id}/edit', [UserController::class, 'edit'])
        ->name('admin.user.edit');
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
