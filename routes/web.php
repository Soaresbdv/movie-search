<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\FavoriteController;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

Route::get('/filmes', [MovieController::class, 'index']);

Route::post('/favoritos', [FavoriteController::class, 'store'])->middleware('auth');

require __DIR__ . '/settings.php';
