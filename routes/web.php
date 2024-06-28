<?php

use App\Http\Controllers;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Students
    Route::name('students.')->group(function () {
        Route::post('import', [Controllers\StudentController::class, 'import'])->name('import');
        Route::get('export', [Controllers\StudentController::class, 'export'])->name('export');
    });

    Route::resource('students', Controllers\StudentController::class)->except('create', 'store', 'show', 'edit', 'update', 'destroy');
});

require __DIR__ . '/auth.php';
