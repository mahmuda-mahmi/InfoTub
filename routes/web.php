<?php

use App\Http\Controllers\Creator\InformationController as CreatorInformationController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\PublicInformationController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get('/posts', [PublicInformationController::class, 'index'])
    ->name('posts.index');

Route::get('/posts/{information:slug}', [PublicInformationController::class, 'show'])
    ->name('posts.show');

Route::middleware([Authenticate::class])->group(function (): void {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::get('/information/create', [InformationController::class, 'create'])->name('information.create');
    Route::post('/information', [InformationController::class, 'store'])->name('information.store');
    Route::prefix('creator')
        ->name('creator.')
        ->group(function (): void {
            Route::resource('posts', CreatorInformationController::class);
        });
});

require __DIR__.'/settings.php';
