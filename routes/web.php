<?php

use App\Http\Controllers\DashboadController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboadController::class, 'index']);

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', [DashboadController::class, 'dashboard'])->name('dashboard');
});
