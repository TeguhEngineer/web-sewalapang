<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\DataPenyewaanController;
use App\Http\Controllers\Admin\InputJadwalController;
use App\Http\Controllers\Admin\PesanAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\HomeUserController;
use App\Http\Controllers\User\JadwalSewaController;
use App\Http\Controllers\User\KontakController;
use App\Http\Controllers\User\RiwayatController;
use App\Http\Controllers\User\SewaController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

// Tes tampilan login
Route::get('/tesRegister', function () {
    return view('auth.tesRegister');
});

Auth::routes();

Route::middleware('can:admin')->group(function () {
    Route::get('/homeAdmin', [DashboardAdminController::class, 'index'])->name('dashboardAdmin');
    Route::resource('/dataPenyewaan', DataPenyewaanController::class);
    Route::get('/print', [DataPenyewaanController::class, 'print']);
    Route::resource('/inputJadwal', InputJadwalController::class);
    Route::resource('/pesan', PesanAdminController::class);
});

Route::middleware('can:user')->group(function () {
    Route::get('/home', [HomeUserController::class, 'index']);
    Route::get('/sewa', [SewaController::class, 'index']);
    Route::get('/inputSewa/{id}', [SewaController::class, 'create']);
    Route::post('/inputSewa', [SewaController::class, 'store']);
    Route::get('/jadwalsewa', [JadwalSewaController::class, 'index']);
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
    Route::put('/riwayat/{id}', [RiwayatController::class, 'uploadBuktiPembayaran']);
    Route::delete('/riwayat/{id}', [RiwayatController::class, 'delete']);
    Route::get('/kontak', [KontakController::class, 'index']);
});

// Form Login Admin
Route::get('/administrator', [LoginController::class, 'loginAdmin'])->name('administrator');
Route::post('/administrator', [LoginController::class, 'cekLogin']);
