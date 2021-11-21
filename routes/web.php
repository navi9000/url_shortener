<?php

use App\Http\Controllers\URLShortenerController;
use Illuminate\Support\Facades\Route;

Route::get('/sandbox', function () {
    return view('sandbox');
});

Route::get('/', [URLShortenerController::class, 'index'])->name('main');
Route::post('/', [URLShortenerController::class, 'generate']);
Route::get('/{token}', [URLShortenerController::class, 'remote'])->name('remote');
