<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\PersertaController;
use App\Http\Controllers\PesertaController;
use App\Models\User;
use App\Http\Controllers\RiwayatPresensiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', function () {
    $user = Auth::user();
    $roles = $user->roles->pluck('name'); // Mengambil nama role
    $mhs = User::role('mahasiswa')->count();
    $dsn = User::role('dosen')->count();
    return view('home', compact('roles', 'mhs','dsn'));
})->middleware(['auth'])->name('home');

Route::get('/', function(){
    return redirect('/login');
});


Route::group(['middleware' => ['role:admin', 'auth']], function() {
    Route::get('/data-mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/data-mahasiswa/import', [MahasiswaController::class, 'by_excel'])->name('page.mahasiswa');
    Route::post('/data-mahasiswa/import-data', [MahasiswaController::class, 'import'])->name('import.mahasiswa');
    Route::get('/data-mahasiswa/create', [MahasiswaController::class, 'create']);
    Route::post('/data-mahasiswa/create', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/data-mahasiswa/edit/{user}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::post('/data-mahasiswa/update/{user}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::get('/data-mahasiswa/delete/{user}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.delete');

    Route::get('/data-dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('/data-dosen/create', [DosenController::class, 'create']);
    Route::post('/data-dosen/create', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('/data-dosen/edit/{user}', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::post('/data-dosen/update/{user}', [DosenController::class, 'update'])->name('dosen.update');
    Route::get('/data-dosen/delete/{user}', [DosenController::class, 'destroy'])->name('dosen.delete');



    Route::get('/data-admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/data-admin/create', [AdminController::class, 'create']);
    Route::post('/data-admin/create', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/data-admin/edit/{user}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/data-admin/update/{user}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/data-admin/delete/{user}', [AdminController::class, 'destroy'])->name('admin.delete');

    Route::get('/data-matkul', [MatkulController::class, 'index'])->name('matkul.index');
    Route::get('/data-matkul/create', [MatkulController::class, 'create']);
    Route::post('/data-matkul/create', [MatkulController::class, 'store'])->name('matkul.store');
    Route::get('/data-matkul/edit/{user}', [MatkulController::class, 'edit'])->name('matkul.edit');
    Route::post('/data-matkul/update/{user}', [MatkulController::class, 'update'])->name('matkul.update');
    Route::get('/data-matkul/delete/{user}', [MatkulController::class, 'destroy'])->name('matkul.delete');

    Route::get('/data-jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
    Route::get('/data-jadwal/create', [JadwalController::class, 'create']);
    Route::post('/data-jadwal/create', [JadwalController::class, 'store'])->name('jadwal.store');
    Route::get('/data-jadwal/edit/{user}', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::post('/data-jadwal/update/{user}', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::get('/data-jadwal/delete/{user}', [JadwalController::class, 'destroy'])->name('jadwal.delete');

    Route::get('/data-perserta', [PersertaController::class, 'index']);
    Route::get('/data-perserta/import', [PersertaController::class, 'by_excel'])->name('page.perserta');
    Route::post('/data-perserta/import-data', [PersertaController::class, 'import'])->name('import.perserta');
    Route::get('/data-perserta/create', [PersertaController::class, 'create']);
    Route::post('/data-perserta/create', [PersertaController::class, 'store'])->name('perserta.store');
    Route::get('/data-perserta/edit/{user}', [PersertaController::class, 'edit'])->name('perserta.edit');
    Route::post('/data-perserta/update/{user}', [PersertaController::class, 'update'])->name('perserta.update');
    Route::get('/data-perserta/delete/{user}', [PersertaController::class, 'destroy'])->name('perserta.delete');
});


Route::group(['middleware' => ['role:admin', 'auth', 'role:mahasiswa']], function() {

});

Route::get('/scan-qr-code', [AbsensiController::class, 'index'])->name('scan');
Route::get('/scan/choose/{id}', [AbsensiController::class, 'index'])->name('scan.choose');
Route::get('/scan/masuk/{id}', [AbsensiController::class, 'scanQRCodeIn'])->name('peserta.scan-qr-code');
Route::get('/scan/keluar/{id}', [AbsensiController::class, 'scanQRCodeOut'])->name('peserta.keluar.scan-qr-code');
Route::get('/scan-qr-codes', [AbsensiController::class, 'edit'])->name('scan.qr.process');


Route::group(['middleware' => ['role:admin|dosen', 'auth']], function() {
    Route::get('/data-jadwal/qrcode/masuk/{id}', [JadwalController::class, 'generateQRCodeIn'])->name('data-jadwal.qrcode');
    Route::get('/data-jadwal/qrcode/keluar/{id}', [JadwalController::class, 'generateQRCodeOut'])->name('data-jadwal.qrcode');

    Route::get('/data-jadwal/show/{id}', [JadwalController::class, 'show'])->name('data-jadwal.show');
    Route::get('/data-jadwal/status/{id}', [JadwalController::class, 'viewAttendance'])->name('data-jadwal.status');

    Route::get('/buka-kelas', [JadwalController::class, 'buka_kelas'])->name('jadwal.dosen');
});


Route::get('/riwayat_presensi/mahasiswa', [RiwayatPresensiController::class, 'RiwayatMhs']);
Route::get('/riwayat_presensi/mahasiswadsn', [RiwayatPresensiController::class, 'RiwayatMhsMatkul']);
Route::get('/riwayat_presensi/dosen', [RiwayatPresensiController::class, 'RiwayatDsn']);
Route::get('/riwayat_presensi/dosen/all', [RiwayatPresensiController::class, 'RiwayatDsnAll']);
Route::get('/riwayat_presensi/mahasiswa/all', [RiwayatPresensiController::class, 'RiwayatMhsAll']);
Route::get('/api/attendance', [AbsensiController::class, 'getAttendanceData']);
require __DIR__.'/auth.php';
