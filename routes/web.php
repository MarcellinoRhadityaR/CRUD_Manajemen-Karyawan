<?php

use App\Http\Controllers\karyawanController;
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

Route::get('/karyawan', [karyawanController::class, 'index']);
Route::post('karyawan/add', [karyawanController::class, 'store'])->name('karyawan.store');
Route::post('/ningen/edit/{id}', [karyawanController::class, 'update'])->name('karyawan.edit');
Route::delete('karyawan/delete/{id}', [karyawanController::class, 'destroy'])->name('karyawan.destroy');