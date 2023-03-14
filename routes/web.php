<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\JurusanController;
use App\Http\Controllers\admin\KelasController;
use App\Http\Controllers\admin\PembayaranController;
use App\Http\Controllers\admin\PetugasController;
use App\Http\Controllers\admin\SiswaController;
use App\Http\Controllers\admin\SppController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LoginPetugasController;
use App\Http\Controllers\siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\siswa\PembayaranController as SiswaPembayaranController;
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

Route::get('/', function() {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login.siswa');
Route::post('/login', [LoginController::class, 'login'])->name('login.siswa.post');
Route::post('/logoutsiswa', [LoginController::class, 'logoutsiswa'])->name('logout.siswa');

Route::post('/logoutpetugas', [LoginPetugasController::class, 'logoutpetugas'])->name('logout.petugas');
Route::get('/loginpetugas', [LoginPetugasController::class, 'index'])->name('login');
Route::post('/loginpetugas', [LoginPetugasController::class, 'loginpetugas'])->name('login.post');

Route::group(['middleware' => ['auth', 'login_check'], 'prefix' => 'admin'], function(){
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/siswa', SiswaController::class)->middleware('admin_check');
    Route::resource('/petugas', PetugasController::class)->middleware('admin_check');
    Route::resource('/kelas', KelasController::class)->middleware('admin_check');
    Route::resource('/spp', SppController::class)->middleware('admin_check');
    Route::resource('/pembayaran', PembayaranController::class);
    Route::get('/search/siswa', [PembayaranController::class, 'searchSiswa'])->name('pembayaran.search_siswa');
    Route::get('/invoicedetails/{id}', [PembayaranController::class, 'invoicedetails']);
});


Route::group(['middleware' => ['siswa_login'], 'prefix' => 'siswa'], function () {
    Route::get('/dashboard', [SiswaDashboardController::class, 'index'])->name('siswa.dashboard');
    Route::get('/pembayaran', [SiswaPembayaranController::class, 'index'])->name('siswa.pembayaran');
});
