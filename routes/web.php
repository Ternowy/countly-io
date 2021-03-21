<?php

declare(strict_types=1);

use App\Http\Controllers\Survey\SurveyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\SurveyResults\SurveyResultsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Survey\SharedSurveyController;

Route::get('/', [HomeController::class, 'home']);

Route::post('/auth/{method}', [AuthController::class, 'authenticate']);
Route::post('/auth/{method}/callback', [AuthController::class, 'callback']);

Route::middleware([])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::prefix('surveys')->group(function () {
        Route::get('/', [SurveyController::class, 'surveys']);
        Route::get('/{id}', [SurveyController::class, 'builder']);
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
