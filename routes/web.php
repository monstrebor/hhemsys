<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\home\AuthController;
use App\Http\Controllers\users\UserController;
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
    Route::post('/login-store', [AuthController::class, 'login'])->name('login.store');
    Route::post('/register-store', [AuthController::class, 'store'])->name('register.store');
});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

});

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');

});

/*
|--------------------------------------------------------------------------
| Logout Route
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Update Password Route
|--------------------------------------------------------------------------
*/

Route::post('/password/update', [SettingsController::class, 'passwordUpdate'])
    ->middleware(['auth'])
    ->name('password.update');
