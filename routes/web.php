<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\QuickLoginController;
use App\Http\Controllers\Survey\SurveyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\SurveyResults\SurveyResultsController;
use App\Http\Controllers\Auth\SocialMediaAuthController;
use App\Http\Controllers\Survey\SharedSurveyController;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/auth/{method}', [SocialMediaAuthController::class, 'authenticate'])->name('auth');
    Route::get('/auth/{method}/callback', [SocialMediaAuthController::class, 'callback']);
    Route::post('/quicklogin', [QuickLoginController::class, 'requestLoginLink'])->name('quicklogin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('surveys')->group(function () {
        Route::get('/', [SurveyController::class, 'surveys'])->name('surveys');
        Route::get('/create', [SurveyController::class, 'builder'])->name('create-survey');
        Route::get('/{id}', [SurveyController::class, 'edit'])->name('edit-survey');

        Route::post('/', [SurveyController::class, 'create'])->name('save-survey');
        Route::put('/{id}', [SurveyController::class, 'update'])->name('update-survey');
        Route::put('/{id}/status', [SurveyController::class, 'updateStatus'])->name('update-survey-status');
        Route::delete('/{id}', [SurveyController::class, 'delete'])->name('delete-survey');

        Route::get('/{id}/results', [SurveyResultsController::class, 'results'])->name('survey-results');
        Route::delete('/{id}/clear', [SurveyController::class, 'clear'])->name('clear-survey-results');
        Route::get('/{id}/results/media', [SurveyResultsController::class, 'media'])->name('survey-results-media');
    });
});

Route::prefix('survey')->group(function () {
    Route::get('/join/{code}', [SharedSurveyController::class, 'joinSurvey'])->name('join-survey');
    Route::get('/{code}', [SharedSurveyController::class, 'load'])->name('load-survey');
    Route::post('/{code}', [SharedSurveyController::class, 'submit'])->name('submit-survey');
});
