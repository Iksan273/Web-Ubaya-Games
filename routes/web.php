<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VoliController;

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

//--AUTH ROUTING--//
Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// halaman voli for user//
Route::view('/voli2', 'voli.index')->name('voli.index');
Route::view('/formVoli', 'voli.register')->name('voli.form');
Route::post('/register/voli', [VoliController::class, 'store'])->name('register.voli');



//halaman admin dan view admin routing//
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/adminVoli', [VoliController::class, 'index'])->name('admin.voli');
    Route::get('/voli/editVoli/{id}', [VoliController::class, 'edit'])->name('admin.editVoli');
    Route::put('/voli/updateVoli/{id}', [VoliController::class, 'update'])->name('admin.updateVoli');
    Route::delete('/voli/deleteVoli/{id}', [VoliController::class, 'delete'])->name('admin.deleteVoli');
});

Route::get('/', function () {
    return view('auth.login');
});
