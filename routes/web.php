<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\RequestController;
use App\Http\Controllers\Admin\ReferenceGuideController;
use App\Http\Controllers\Admin\BraSizeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ValuesController;
use App\Http\Controllers\Admin\OrdersController;

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

Route::get('/', [HomeController::class, 'index'])->name('client.home');
Route::post('/request/add', [RequestController::class, 'add'])->name('client.request.add');

Route::prefix('admin')->name('admin.')->group(
    function () {
        Route::get('logout',  [AuthController::class, 'logout'])->name('logout')->middleware('auth');
        Route::get('home',  [DashboardController::class, 'index'])->name('home')->middleware('auth');
        Route::get('homepage', [HomePageController::class, 'index'])->name('homepage.index')->middleware('auth');
        Route::post('homepage/update', [HomePageController::class, 'update'])->name('homepage.update')->middleware('auth');
        Route::resource('values', ValuesController::class);
        Route::resource('reference', ReferenceGuideController::class);
        Route::resource('bra', BraSizeController::class);
        Route::resource('orders', OrdersController::class);
    }
);

Route::group(
    ['middleware' => 'guest', 'prefix' => 'admin'],
    function () {
        Route::get('', [AuthController::class, 'showLoginForm'])->name('admin.login');
        Route::post('', [AuthController::class, 'authenticate'])->name('authenticate');
    }
);
