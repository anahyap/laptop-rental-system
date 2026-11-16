<?php

use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::resource('laptops', RentalController::class);

    
    Route::get('/rentals', [RentalController::class, 'index'])
        ->name('rentals.index');

    Route::get('/rentals/create', [RentalController::class, 'create'])
        ->name('rentals.create');

    Route::post('/rentals', [RentalController::class, 'store'])
        ->name('rentals.store');

    Route::get('/rentals/{rental}/edit', [RentalController::class, 'edit'])
        ->name('rentals.edit');

    Route::put('/rentals/{rental}', [RentalController::class, 'update'])
        ->name('rentals.update');

    Route::delete('/rentals/{rental}', [RentalController::class, 'destroy'])
        ->name('rentals.destroy');
    
    Route::get('/app', function () { 
        return view('app');
    })->name('app');

});
    require __DIR__.'/settings.php';
