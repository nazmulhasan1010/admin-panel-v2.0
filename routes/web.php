<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\profileUpdateController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('pages.admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile-update', [ProfileController::class, 'user_infoUpdate'])->name('profile.info.update');
    Route::post('avatar-update', [ProfileController::class, 'avatar_update'])->name('avatar.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
