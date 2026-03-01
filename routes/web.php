<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::get('/', function (): void {
    inertia('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->group(function (): void {
    Route::get('dashboard', function (): void {
        inertia('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
