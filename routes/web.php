<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Logging\Junit;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest:siswa'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/proseslogin', [AuthController::class, 'proseslogin']);
});

Route::middleware(['guest:user'])->group(function () {
    Route::get('/panel', function () {
        return view('auth.loginadmin');
    })->name('loginadmin');
    Route::post('/prosesloginadmin', [AuthController::class, 'prosesloginadmin']);
});

Route::middleware(['auth:siswa'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/proseslogout', [AuthController::class, 'proseslogout']);

    //presensi
    Route::get('/presensi/create', [PresensiController::class, 'create']);
    Route::post('/presensi/store', [PresensiController::class, 'store']);

    //editprofile
    Route::get('/editprofile', [PresensiController::class, 'editprofile']);
    Route::post('/presensi/{nis}/updateprofile', [PresensiController::class, 'updateprofile']);

    // histori
    Route::get('presensi/histori', [PresensiController::class, 'histori']);
    Route::post('gethistori', [PresensiController::class, 'gethistori']);

    //ajuan ijin
    Route::get('presensi/izin', [PresensiController::class, 'izin']);
    Route::get('presensi/buatizin', [PresensiController::class, 'buatizin']);
    Route::post('presensi/storeizin', [PresensiController::class, 'storeizin']);
    Route::post('/presensi/cekpengajuanizin', [PresensiController::class, 'cekpengajuanizin']);

});

Route::middleware(['auth:user'])->group(function () {
    Route::get('/proseslogoutadmin', [AuthController::class, 'proseslogoutadmin']);
    Route::get('/panel/dashboardadmin', [DashboardController::class, 'dashboardadmin']);

    //siswa
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::post('/siswa/store', [SiswaController::class, 'store']);
    Route::post('/siswa/edit', [SiswaController::class, 'edit']);
    Route::post('/siswa/{nis}/update', [SiswaController::class, 'update']);
    Route::post('/siswa/{nis}/delete', [SiswaController::class, 'delete']);

    //jurusan
    Route::get('/jurusan',[JurusanController::class, 'index']);
    Route::post('/jurusan/store', [JurusanController::class, 'store']);
    Route::post('/jurusan/edit', [JurusanController::class, 'edit']);
    Route::post('/jurusan/{kode_jur}/update', [JurusanController::class, 'update']);
    Route::post('/jurusan/{kode_jur}/delete', [JurusanController::class, 'delete']);

    //guru
    Route::get('/guru', [GuruController::class, 'index']);
    Route::post('/guru/store', [GuruController::class, 'store']);
    Route::post('/guru/edit', [GuruController::class, 'edit']);
    Route::post('/guru/{nik}/update', [GuruController::class, 'update']);
    Route::post('/guru/{nik}/delete', [GuruController::class, 'delete']);

    //rombel
    Route::get('/rombel', [RombelController::class, 'index']);
    Route::post('/rombel/store', [RombelController::class, 'store']);
    Route::post('/rombel/edit', [RombelController::class, 'edit']);
    Route::post('/rombel/{kode_rom}/update', [RombelController::class, 'update']);
    Route::post('/rombel/{kode_rom}/delete', [RombelController::class, 'delete']); 

    //presensi
    Route::get('presensi/monitoring', [PresensiController::class, 'monitoring']);
    Route::post('/getpresensi',[PresensiController::class, 'getpresensi']);
    Route::post('/tampilkanpeta',[PresensiController::class, 'tampilkanpeta']);
    Route::get('/presensi/laporan',[PresensiController::class, 'laporan']);
    Route::post('/presensi/cetaklaporan',[PresensiController::class, 'cetaklaporan']);
    Route::get('/presensi/rekap',[PresensiController::class, 'rekap']);
    Route::post('/presensi/cetakrekap',[PresensiController::class, 'cetakrekap']);
    Route::get('/presensi/izinsakit',[PresensiController::class,'izinsakit']);
    Route::post('/presensi/approveizinsakit',[PresensiController::class,'approveizinsakit']);
    Route::get('/presensi/{id}/batalkanizinsakit',[PresensiController::class,'batalkanizinsakit']);

    //cabang
    Route::get('/cabang',[CabangController::class, 'index']);
    Route::post('/cabang/store',[CabangController::class, 'store']);
    Route::post('/cabang/edit', [CabangController::class, 'edit']);
    Route::post('/cabang/update', [CabangController::class, 'update']);
    Route::post('/cabang/{kode_cabang}/delete', [CabangController::class, 'delete']);


    //konfigurasi
    Route::get('/konfigurasi/lokasikantor',[KonfigurasiController::class, 'lokasikantor']);
    Route::post('/konfigurasi/updatelokasikantor',[KonfigurasiController::class, 'updatelokasikantor']);






});
