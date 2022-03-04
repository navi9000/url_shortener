<?php

use App\Http\Controllers\URLShortenerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [URLShortenerController::class, 'index'])->name('main');
Route::post('/', [URLShortenerController::class, 'generate']);
Route::post('/{token}', [URLShortenerController::class, 'remote'])->name('remote');
