<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;
use App\Models\User;
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
    return view('home', compact('roles'));
})->middleware(['auth'])->name('home');

Route::get('/', function(){
    return redirect('/login');
});


Route::get('/data-mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
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

Route::get('/data-jadwal', [JadwalController::class, 'index'])->name('data-jadwal.index');
Route::get('/data-jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
Route::post('/data-jadwal/create', [JadwalController::class, 'store'])->name('jadwal.store');
Route::get('/data-jadwal/edit/{user}', [JadwalController::class, 'edit'])->name('jadwal.edit');
Route::post('/data-jadwal/update/{user}', [JadwalController::class, 'update'])->name('jadwal.update');
Route::get('/data-jadwal/delete/{user}', [JadwalController::class, 'destroy'])->name('jadwal.delete');
Route::get('data-jadwal/qrcode/{id}', [JadwalController::class, 'generateQRCode'])->name('data-jadwal.qrcode');

require __DIR__.'/auth.php';
