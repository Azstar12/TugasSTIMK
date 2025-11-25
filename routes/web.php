<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\jurusanController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\authController;
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

//jika route not found ketik "php artisan optimize"

Route::get('/', [authController::class, 'index'])->name('login');
Route::post('/', [authController::class, 'proses_login']);
Route::post('/logout', [authController::class, 'logout']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('/mahasiswa', [mahasiswaController::class, 'index'])->name('home');
    Route::get('/add/mahasiswa', [mahasiswaController::class, 'store'])->name('add');
    Route::get('/edit/mahasiswa/{id}', [mahasiswaController::class, 'edit'])->name('edit');
    Route::post('/insert/mahasiswa', [mahasiswaController::class, 'add'])->name('insert');
    Route::post('/update/mahasiswa/{id}', [mahasiswaController::class, 'update'])->name('update');
    Route::delete('/delete/mahasiswa/{id}', [mahasiswaController::class, 'delete'])->name('delete');

    Route::get('/jurusan', [jurusanController::class, 'index'])->name('jurusan');
    Route::get('/add/jurusan', [jurusanController::class, 'store'])->name('jurusan.add');
    Route::get('/edit/jurusan/{id}', [jurusanController::class, 'edit'])->name('jurusan.edit');
    Route::post('/insert/jurusan', [jurusanController::class, 'add'])->name('jurusan.insert');
    Route::post('/update/jurusan/{id}', [jurusanController::class, 'update'])->name('jurusan.update');
    Route::delete('/delete/jurusan/{id}', [jurusanController::class, 'delete'])->name('jurusan.delete');

    Route::get('/kelas', [kelasController::class, 'index'])->name('kelas');
    Route::get('/add/kelas', [kelasController::class, 'store'])->name('kelas.add');
    Route::get('/edit/kelas/{id}', [kelasController::class, 'edit'])->name('kelas.edit');
    Route::post('/insert/kelas', [kelasController::class, 'add'])->name('kelas.insert');
    Route::put('/update/kelas/{id}', [kelasController::class, 'update'])->name('kelas.update');
    Route::delete('/delete/kelas/{id}',[kelasController::class, 'delete'])->name('kelas.delete');
});
