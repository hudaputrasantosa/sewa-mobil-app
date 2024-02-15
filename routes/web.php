<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RedirectAuthenticatedController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get("/redirectAuthenticated", [RedirectAuthenticatedController::class, "index"]);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->middleware('checkRole:admin')->controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('admin.dashboard');
        Route::get('/mobil/tambah', 'tambahMobil')->name('admin.tambahMobil');
        Route::post('/mobil/store', 'kirimDataMobil')->name('admin.kirimDataMobil');
    });

    Route::prefix('user')->middleware('checkRole:user', 'verified')->controller(UserController::class)->group(function () {
        Route::get('/homepage', 'index')->name('user.homepage');
        Route::post('/sewa/store', 'sewa')->name('user.sewa');
    });
});

require __DIR__ . '/auth.php';
