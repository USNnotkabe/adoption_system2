<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

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
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pets', [PetController::class, 'index'])->name('pet.index');
    Route::get('/pets/create', [PetController::class, 'create'])->name('pet.create');
    Route::post('/pets', [PetController::class, 'store'])->name('pet.store');
    Route::get('/pets/{pet}/edit', [PetController::class, 'edit'])->name('pet.edit');
    Route::put('/pets/{pet}/update', [PetController::class, 'update'])->name('pet.update');
    Route::delete('/pets/{pet}/delete', [PetController::class, 'destroy'])->name('pet.destroy');
});








require __DIR__ . '/auth.php';