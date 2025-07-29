<?php

use App\Http\Controllers\admin\{AdministratorController, AdminOrderController, CustomerHomeImagesController, LoginController, RegisterController, SettingsController};
use App\Http\Controllers\{CartController, DeliveriesController, ProductController, OrderController};
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\users\{CustomerAccountController, CustomerController, RiderController};
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
    Route::post('/customer-home-images-store', [CustomerHomeImagesController::class, 'store'])->name('customer-home-images.store');
    Route::post('/customer-home-images-update', [CustomerHomeImagesController::class, 'update'])->name('customer-home-images.update');
    Route::delete('/admin/customer-home-images/{id}', [CustomerHomeImagesController::class, 'destroy'])->name('customer-home-images.destroy');

    //Orders
    Route::get('/admin-orders',[AdminOrderController::class, 'index'])->name('admin.orders.index');

    //Assigning Order to Rider
    Route::post('/assign-rider',[DeliveriesController::class, 'assign'])->name('admin.orders.assignRider');

    //transaction
    Route::get('/admin-transactions',[TransactionController::class, 'index'])->name('admin.transactions.index');
});

/*
|--------------------------------------------------------------------------
| Rider
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:rider'])->group(function () {
    Route::get('/rider', [RiderController::class, 'index'])->name('rider.dashboard');

    //Deliveries
    Route::get('/deliveries',[DeliveriesController::class,'index'])->name('deliveries.dashboard');

    //Accept Deliveries
    Route::post('/rider/delivery/accept', [DeliveriesController::class, 'accept'])->name('rider.delivery.accept');

    //Delivery Complete
    Route::post('/rider/delivery/complete', [DeliveriesController::class, 'complete'])->name('rider.delivery.complete');
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
    Route::patch('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');

    //Cart
    Route::get('/my-cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    //Account
    Route::get('/customer-account',[CustomerAccountController::class, 'index'])->name('customer-account.dashboard');
    Route::post('/customer-account/update-email',[CustomerAccountController::class, 'updateEmail'])->name('customer-account-email.update');
    Route::post('/customer-account/update',[CustomerAccountController::class, 'update'])->name('customer-account.update');
});

/*
|--------------------------------------------------------------------------
| Logout Route
|--------------------------------------------------------------------------
*/
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::post('/password/update', [SettingsController::class, 'passwordUpdate'])
    ->middleware(['auth'])
    ->name('password.update');


