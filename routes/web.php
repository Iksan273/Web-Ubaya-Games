<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BadmintonController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\DanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EsportController;
use App\Http\Controllers\FutsalController;
use App\Http\Controllers\VoliController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|sss
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

// voli for user//
Route::view('/voli2', 'voli.index')->name('voli.index');
Route::view('/formVoli', 'voli.register')->name('voli.form');
Route::post('/register/voli', [VoliController::class, 'store'])->name('register.voli');

// badminton for user//

Route::view('/formBadminton', 'badminton.register')->name('badminton.form');
Route::post('/register/badminton', [BadmintonController::class, 'store'])->name('register.badminton');

// basket for user//

Route::view('/formBasket', 'basket.register')->name('basket.form');
Route::post('/register/basket', [BasketController::class, 'store'])->name('register.basket');

// Futsal for user//

Route::view('/formFutsal', 'futsal.register')->name('futsal.form');
Route::post('/register/futsal', [FutsalController::class, 'store'])->name('register.futsal');

// Dance for user//

Route::view('/formDance', 'dance.register')->name('dance.form');
Route::post('/register/dance', [DanceController::class, 'store'])->name('register.dance');

// Esport for user//

Route::view('/formEsport', 'esport.register')->name('esport.form');
Route::post('/register/esport', [EsportController::class, 'store'])->name('register.esport');

Route::get('/peraturan', function () {
    return view('peraturan');
})->name('peraturan');

Route::get('/register-done', function () {
    return view('berhasil');
})->name('RegisterBerhasil');

Route::get('/status-pendaftaran',[DashboardController::class, 'AllData'])->name('StatusPendaftaran');
//halaman admin dan view admin routing//
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/Add-admin',[DashboardController::class, 'adminForm'])->name('add-admin.form');

    //- Voli for admin-//
    Route::get('/adminVoli', [VoliController::class, 'index'])->name('admin.voli');
    Route::get('/voli/editVoli/{id}', [VoliController::class, 'edit'])->name('admin.editVoli');
    Route::put('/voli/updateVoli/{id}', [VoliController::class, 'update'])->name('admin.updateVoli');
    Route::delete('/voli/deleteVoli/{id}', [VoliController::class, 'delete'])->name('admin.deleteVoli');

    //- badminton for admin-//
    Route::get('/adminBadminton', [BadmintonController::class, 'index'])->name('admin.badminton');
    Route::get('/badminton/editBadminton/{id}', [BadmintonController::class, 'edit'])->name('admin.editBadminton');
    Route::put('/badminton/updateBadminton/{id}', [BadmintonController::class, 'update'])->name('admin.updateBadminton');
    Route::delete('/badminton/deleteBadminton/{id}', [BadmintonController::class, 'delete'])->name('admin.deleteBadminton');

     //- basket for admin-//
     Route::get('/adminBasket', [BasketController::class, 'index'])->name('admin.basket');
     Route::get('/basket/editBasket/{id}', [BasketController::class, 'edit'])->name('admin.editBasket');
     Route::put('/basket/updateBasket/{id}', [BasketController::class, 'update'])->name('admin.updateBasket');
     Route::delete('/basket/deleteBasket/{id}', [BasketController::class, 'delete'])->name('admin.deleteBasket');

     //- futsal for admin-//
     Route::get('/adminFutsal', [FutsalController::class, 'index'])->name('admin.futsal');
     Route::get('/futsal/editFutsal/{id}', [FutsalController::class, 'edit'])->name('admin.editFutsal');
     Route::put('/futsal/updateFutsal/{id}', [FutsalController::class, 'update'])->name('admin.updateFutsal');
     Route::delete('/futsal/deleteFutsal/{id}', [FutsalController::class, 'delete'])->name('admin.deleteFutsal');

     //-dance for admin-//
     Route::get('/adminDance', [DanceController::class, 'index'])->name('admin.dance');
     Route::get('/dance/editDance/{id}', [DanceController::class, 'edit'])->name('admin.editDance');
     Route::put('/dancel/updateDance/{id}', [DanceController::class, 'update'])->name('admin.updateDance');
     Route::delete('/dance/deleteDance/{id}', [DanceController::class, 'delete'])->name('admin.deleteDance');

     //-esport for admin-//
     Route::get('/adminEsport', [EsportController::class, 'index'])->name('admin.esport');
     Route::get('/esport/editEsport/{id}', [EsportController::class, 'edit'])->name('admin.editEsport');
     Route::put('/esport/updateEsport/{id}', [EsportController::class, 'update'])->name('admin.updateEsport');
     Route::delete('/esport/deleteEsport/{id}', [EsportController::class, 'delete'])->name('admin.deleteEsport');
});

Route::get('/', function () {
    return view('index');
})->name('home');
