<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\siswaController;
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
Route::get('/', [siswaController::class, 'index'])->name('home');
Route::get('/add/siswa', [siswaController::class, 'store'])->name('add');
Route::get('/edit/siswa/{id}', [siswaController::class, 'edit'])->name('edit');
Route::post('/insert/siswa', [siswaController::class, 'add']);
Route::post('/update/siswa/{id}', [siswaController::class, 'update']);
Route::delete('/delete/siswa/{id}',[siswaController::class, 'delete']);
