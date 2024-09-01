<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SecretController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SecretController::class, 'index']);
Route::get('/home', function () {
    return view('secrets-components.index');
});

Route::post('/submit', [SecretController::class, 'store']);
Route::get('/secret/{secret}', [SecretController::class, 'show']);


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::put('/dashboard/{id}', [DashboardController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard.update');
Route::delete('/dashboard/{id}', [DashboardController::class, 'destroy'])->middleware(['auth', 'verified'])->name('dashboard.destroy');
Route::get('/dashboard/{id}', [DashboardController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard.show');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
