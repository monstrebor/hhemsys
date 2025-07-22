<?php

use App\Http\Controllers\admin\{AdministratorController, CustomerHomeImagesController, LoginController,RegisterController,SettingsController};
use App\Http\Controllers\{ProductController,OrderController};
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
    return view('home.landing-page');
})->name('home');

Route::get('/login', function () {
    return view('home.index');
})->name('login');

Route::get('/register', function () {
    return view('home.index');
})->name('register');


/*
|--------------------------------------------------------------------------
| Guest Routes (Unauthenticated)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::post('/login-store', [LoginController::class, 'login'])->name('login.store');
    Route::post('/register-store', [RegisterController::class, 'store'])->name('register.store');
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

    //Customer Home Images
    Route::get('/customer-home-images', [CustomerHomeImagesController::class, 'index'])->name('customer-home-images.dashboard');
    Route::post('/customer-home-images-store', [CustomerHomeImagesController::class,'store'])->name('customer-home-images.store');
    Route::post('/customer-home-images-update', [CustomerHomeImagesController::class,'update'])->name('customer-home-images.update');
    Route::delete('/admin/customer-home-images/{id}', [CustomerHomeImagesController::class, 'destroy'])->name('customer-home-images.destroy');


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

    //Order
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders-store', [OrderController::class, 'store'])->name('orders.store');


    //Settings
    Route::post('/password/update', [SettingsController::class, 'passwordUpdate'])->name('password.update');
});

/*
|--------------------------------------------------------------------------
| Logout Route
|--------------------------------------------------------------------------
*/
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
