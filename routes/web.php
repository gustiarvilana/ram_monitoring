<?php

use App\Http\Controllers\CancelController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\SallesController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PenjualanDetailController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', fn () => redirect()->route('login'));

Route::get('/dashboard', fn () => view('dashboard'));


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/user/data', [UserController::class, 'data'])->name('user.data');
    Route::resource('user', UserController::class);
    
    Route::get('/customer/data', [CustomerController::class, 'data'])->name('customer.data');
    Route::get('/customer/list', [CustomerController::class, 'list'])->name('customer.list');
    Route::resource('customer', CustomerController::class);
});