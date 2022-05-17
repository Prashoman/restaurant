<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ItemController;
use App\Http\Controllers\admin\ReserveController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Auth::routes();
Route::post('/reservation', [App\Http\Controllers\ReservationController::class, 'store'])->name('reservation.store');

Route::get('/email/{id}', [App\Http\Controllers\EmailController::class, 'email'])->name('eamil');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('slider', SliderController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('item', ItemController::class);
    Route::resource('reserve', ReserveController::class);
});

// Route::get('admin/dashboard', [\App\Http\Controllers\admin\DashboardController::class, 'index']);


