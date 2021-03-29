<?php

declare(strict_types=1);

use App\Http\Controllers\Survey\SurveyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\SurveyResults\SurveyResultsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Survey\SharedSurveyController;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/auth/{method}', [AuthController::class, 'authenticate'])->name('auth');
    Route::get('/auth/{method}/callback', [AuthController::class, 'callback']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('surveys')->group(function () {
        Route::get('/', [SurveyController::class, 'surveys'])->name('surveys');
        Route::get('/builder', [SurveyController::class, 'builder'])->name('builder');
        Route::post('/', [SurveyController::class, 'create']);
        Route::put('/{id}', [SurveyController::class, 'edit']);
        Route::delete('/{id}', [SurveyController::class, 'delete']);
        Route::post('/{id}/clear', [SurveyController::class, 'clear']);
        Route::post('/{id}/results', [SurveyResultsController::class, 'results']);
        Route::post('/{id}/results/media', [SurveyResultsController::class, 'media']);
    });
});

Route::domain('survey.' . env('app.url'))->group(function () {
    Route::get('/{code}', [SharedSurveyController::class, 'load']);
    Route::post('/{code}', [SharedSurveyController::class, 'submit']);
});
