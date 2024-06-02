<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboadController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboadController::class, 'index']);

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', [DashboadController::class, 'dashboard'])->name('dashboard');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/lessons', LessonController::class);
    Route::resource('/roles', RoleController::class);
});
