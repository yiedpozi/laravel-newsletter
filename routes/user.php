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

    Route::get('/test', function () {
        // \App\Models\Newsletter::inRandomOrder()->first()->delete();
        \App\Models\Newsletter::withTrashed()->inRandomOrder()->first()->restore();
        // event(new App\Events\NewsletterDeleted(\App\Models\Newsletter::inRandomOrder()->first()));
        // event(new App\Events\NewsletterRestored(\App\Models\Newsletter::inRandomOrder()->first()));
    });
