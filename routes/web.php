<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StockController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/check-login', [AuthController::class, 'login'])->name('check.login');
Route::post('/change-password', [AuthController::class, 'changePassword'])->name('change.password');
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix'=>'admin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::group(['prefix'=>'stock'], function () {
            Route::get('/list', [StockController::class, 'index'])->name('stock.list');
            Route::get('/create', [StockController::class, 'create'])->name('stock.create');
            Route::post('/create', [StockController::class, 'store'])->name('stock.save');
            Route::get('/get-list', [StockController::class, 'list'])->name('stock.datatables');
            Route::get('{id}/edit', [StockController::class, 'edit'])->name('stock.edit');
            Route::post('/update', [StockController::class, 'update'])->name('stock.update');
            Route::delete('{id}/delete', [StockController::class, 'delete'])->name('stock.delete');

        });
    });
    Route::get('/settings', [AuthController::class, 'settings'])->name('settings');
    Route::post('/settings', [AuthController::class, 'store'])->name('update.settings');
    Route::get('/profile', [AuthController::class, 'userProfile'])->name('user.profile');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
});
