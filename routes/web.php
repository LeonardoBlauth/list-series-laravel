<?php

use App\Http\Controllers\EntrarController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\SairController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadasController;
use Illuminate\Support\Facades\Route;

Route::resources([
    '/series' => SeriesController::class,
    '/temporadas' => TemporadasController::class,
    '/entrar' => EntrarController::class,
    '/registrar' => RegistrarController::class,
    '/sair' => SairController::class
]);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
