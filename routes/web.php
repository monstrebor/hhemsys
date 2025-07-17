<?php

use App\Http\Controllers\admin\{AdministratorController,LoginController,RegisterController,SettingsController};
use App\Http\Controllers\ProductController;
use App\Http\Controllers\users\CustomerController;
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

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/login', function () {
    return view('home.index');
})->name('login');

/*
|--------------------------------------------------------------------------
| Guest Routes (Unauthenticated)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:administrator'])->group(function () {
    Route::get('/admin', [AdministratorController::class, 'index'])->name('administrator.dashboard');

    //Product
    Route::get('/product', [ProductController::class, 'index'])->name('product.dashboard');
    Route::post('/product-store', [ProductController::class, 'store'])->name('product.store');
    Route::post('/product-update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

    //Settings
    Route::post('/password/update', [SettingsController::class, 'passwordUpdate'])->name('password.update');
});

/*
|--------------------------------------------------------------------------
| Rider
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:rider'])->group(function () {
    // Route::get('/rider', [RiderController::class, 'index'])->name('rider.dashboard');
});

/*
|--------------------------------------------------------------------------
| Cashier
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:cashier'])->group(function () {
    // Route::get('/cashier', [CashierController::class, 'index'])->name('cashier.dashboard');
});

/*
|--------------------------------------------------------------------------
| Customer
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.dashboard');

    //Settings
    Route::post('/password/update', [SettingsController::class, 'passwordUpdate'])->name('password.update');
});

/*
|--------------------------------------------------------------------------
| Logout Route
|--------------------------------------------------------------------------
*/
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
