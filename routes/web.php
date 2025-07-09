<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Api\MahasiswaController;

Route::resource('posts', PostController::class);
Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')->group(function () {
    Route::apiResource('mahasiswa', MahasiswaController::class);
});


