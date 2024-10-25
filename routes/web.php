<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home.home');
});

// Route::resource('buku', BukuController::class);

Route::prefix('/buku')->name('buku.')->group(function() {
    Route::get('/', [BukuController::class, 'index'])->name('index'); // Menampilkan daftar buku
    Route::get('/create', [BukuController::class, 'create'])->name('create'); // Menampilkan form tambah buku
    Route::post('/store', [BukuController::class, 'store'])->name('store'); // Proses penyimpanan buku
    Route::get('/{id}/edit', [BukuController::class, 'edit'])->name('edit'); // Menampilkan form edit buku
    Route::get('/{id}', [BukuController::class, 'show'])->name('show'); // Menampilkan detail buku
    Route::put('/{id}', [BukuController::class, 'update'])->name('update'); // Proses update buku
    Route::delete('/{id}', [BukuController::class, 'destroy'])->name('destroy'); // Proses hapus buku
});




Route::prefix('/akun')->name('akun.')->group(function () {
    Route::get('/data', [UserController::class, 'index'])->name('data');
    Route::get('/tambah', [UserController::class, 'create'])->name('tambah');
    Route::post('/tambah/akun', [UserController::class, 'store'])->name('tambah.akun');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::patch('/edit/{id}', [UserController::class, 'update'])->name('edit.formulir');
    Route::delete('/hapus/{id}', [UserController::class, 'destroy'])->name('hapus');
    });

