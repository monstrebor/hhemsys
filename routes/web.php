<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\home\{AuthController, SettingsController, ForgotPassController};
use App\Http\Controllers\home\ProfileController;
use App\Http\Controllers\users\{UserController, TransactionController};
use App\Http\Controllers\users\HouseholdController;
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
    Route::controller(AuthController::class)->group(function () {
        Route::post('/login-store', 'login')->name('login.store');
        Route::post('/register-store', 'store')->name('register.store');
    });
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

Route::middleware(['auth', 'role:user'])
    ->prefix('user')
    ->as('user.')
    ->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('dashboard');

        Route::get('/household', [HouseholdController::class, 'index'])->name('household.index');
        Route::post('/household', [HouseholdController::class, 'store'])->name('household.store');
        Route::post('/household/invite', [HouseholdController::class, 'sendInvite'])->name('household.invite');
        Route::get('/household/join/{code}', [HouseholdController::class, 'join'])->name('household.join');

        // Transactions
        Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
        Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    });

/*
|--------------------------------------------------------------------------
| Logout Route
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/*
|---------------------------------------------------------------------------
| Settings Routes 
|---------------------------------------------------------------------------
*/

Route::prefix('settings')->middleware(['auth'])->group(function () {
    Route::get('/', [SettingsController::class, 'index'])
        ->name('settings');

    Route::post('/password/update', [SettingsController::class, 'passwordUpdate'])
        ->name('settings-password.update');
});

/*
|---------------------------------------------------------------------------
| Profile Routes 
|---------------------------------------------------------------------------
*/

Route::prefix('profile')->middleware(['auth'])->group(function () {
    Route::get('/', [ProfileController::class, 'index'])
        ->name('profile');

    Route::post('/info/update', [ProfileController::class, 'infoCreateOrUpdate'])
        ->name('profile.createOrUpdate');
});

/*
|---------------------------------------------------------------------------
| Reset Routes 
|---------------------------------------------------------------------------
*/

Route::controller(ForgotPassController::class)->group(function () {
    Route::post('forgot-password', 'sendResetLinkEmail')->name('password.email');
    Route::get('reset-password/{token}', 'showResetForm')->name('password.reset');
    Route::post('reset-password', 'reset')->name('password.update');
});

