<?php

use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\RegisterController;
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

/*
|--------------------------------------------------------------------------
| Guest Routes (Unauthenticated)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');
    // Route::post('/login', [LoginController::class, 'login']);

    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    // Route::post('/register', [RegisterController::class, 'register']);
});

/*
|--------------------------------------------------------------------------
| Onboarding Route for New Users (optional, if using is_new flag)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'is_new'])->group(function () {
    // Route::get('/onboarding', [OnboardingController::class, 'index'])->name('onboarding');
});

/*
|--------------------------------------------------------------------------
| Role-Based Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:administrator'])->group(function () {
    // Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:rider'])->group(function () {
    // Route::get('/rider', [RiderController::class, 'index'])->name('rider.dashboard');
});

Route::middleware(['auth', 'role:cashier'])->group(function () {
    // Route::get('/cashier', [CashierController::class, 'index'])->name('cashier.dashboard');
});

Route::middleware(['auth', 'role:customer'])->group(function () {
    // Route::get('/customer', [CustomerController::class, 'index'])->name('customer.dashboard');
});

/*
|--------------------------------------------------------------------------
| Logout Route
|--------------------------------------------------------------------------
*/
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
