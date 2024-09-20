<?php

use App\Http\Controllers\AccessoryController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\MobileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\WelcomeController;
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
Route::get("/", [WelcomeController::class, 'index']);

// Route::post('mobiles', [MobileController::class, 'store'])->name('mobiles.store');

// Route::put('mobiles/{mobile}', [MobileController::class, 'update'])->name('mobiles.update');
    Route::middleware(['auth','admin'])->group(function () {
    Route::resource('admin/mobiles', MobileController::class);
    Route::resource('admin/accessories', AccessoryController::class);
    Route::resource('admin/categories', CategoryController::class);
    Route::get('admin/search', [ItemController::class, 'search'])->name('search');
    Route::get('admin/dashboard', [LoginController::class, 'dashIND'])->name('dashboard');
});

Route::get('auth/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('auth/login', [LoginController::class, 'login']);
Route::Delete('auth/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('auth/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('auth/register', [RegisterController::class, 'register']);
