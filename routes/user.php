<?php

use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\NewsletterController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->name('user.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('newsletters', NewsletterController::class)
        ->withTrashed(['edit', 'update', 'show']);

    Route::post('/newsletters/{newsletter}/restore', [NewsletterController::class, 'restore'])
        ->name('newsletters.restore')
        ->withTrashed();
});
