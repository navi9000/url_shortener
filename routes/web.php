<?php

use App\Http\Controllers\URLShortenerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\App;

if (App::environment('production')) {
    URL::forceScheme('https');
}

Route::get('/', [URLShortenerController::class, 'index'])->name('main');
Route::post('/', [URLShortenerController::class, 'generate']);
Route::get('/{token}', [URLShortenerController::class, 'remote'])->name('remote');
