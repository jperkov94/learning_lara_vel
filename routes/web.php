<?php

use App\Http\Livewire\Admin\AdminDashboardController;
use App\Http\Livewire\CartController;
use App\Http\Livewire\CheckoutController;
use App\Http\Livewire\DetailsController;
use App\Http\Livewire\HomeController;
use App\Http\Livewire\ShopController;
use App\Http\Livewire\User\UserDashboardController as UserUserDashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeController::class)->name('home.controller');
Route::get('/cart', CartController::class)->name('cart.controller');
Route::get('/checkout', CheckoutController::class)->name('checkout.controller');
Route::get('/shop', ShopController::class)->name('shop.controller');
Route::get('/product/{slug}',DetailsController::class)->name('details.controller');
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard', UserUserDashboardController::class)->name('user.dashboard');
});

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardController::class)->name('admin.dashboard');
});
