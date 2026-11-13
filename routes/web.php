<?php

use App\Http\Controllers\laptopcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', [laptopcontroller::class, 'index'])->name('home');
Route::resource('laptop', laptopcontroller::class);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
