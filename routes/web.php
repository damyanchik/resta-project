<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;

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
        ->name('admin.index');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('admin.login');

    Route::get('/logout', [AuthController::class, 'logout'])
        ->name('admin.logout');


    Route::get('/', [DashboardController::class, 'index']);
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
