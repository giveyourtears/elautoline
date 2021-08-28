<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\Client\RequestController;
use App\Http\Controllers\Admin\ReferenceGuideController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\DeliveriesController;
use App\Http\Controllers\Admin\CarsPageController;
use App\Http\Controllers\Admin\CarImagesController;
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
Route::get('/about', [AboutController::class, 'index'])->name('client.about');
Route::post('/request/add', [RequestController::class, 'add'])->name('client.request.add');

Route::prefix('admin')->name('admin.')->group(
    function () {
        Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
        Route::get('home', [DashboardController::class, 'index'])->name('home')->middleware('auth');
        Route::resource('homepage', HomePageController::class);
        Route::resource('values', ValuesController::class);
        Route::resource('aboutpage', AboutPageController::class);
        Route::resource('deliverypage', DeliveriesController::class);
        Route::resource('cars', CarsPageController::class);
        Route::get('images/{id}/index', [CarImagesController::class, 'index'])->name('images.index')->middleware('auth');
        Route::get('images/{id}/create', [CarImagesController::class, 'create'])->name('images.create')->middleware('auth');
        Route::post('images/{id}/store', [CarImagesController::class, 'store'])->name('images.store')->middleware('auth');
        Route::delete('images/{id}/delete', [CarImagesController::class, 'destroy'])->name('images.destroy')->middleware('auth');
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
