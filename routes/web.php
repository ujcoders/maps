<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersQuizController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\GraphController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Redirect to Login
Route::redirect("/", "login");

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Quiz Routes
Route::get('/inactive', [UsersQuizController::class, 'inactiveView'])->name('inactive.view');
Route::get('/complete', [UsersQuizController::class, 'completeView'])->name('complete.view');

// Admin Routes for Questions Management
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
    Route::put('/questions/{id}/toggle-status', [QuestionController::class, 'toggleStatus'])->name('questions.toggleStatus');
});

// Question Routes
Route::get('/active/{questionId?}', [QuestionController::class, 'showActiveQuestion'])->name('questions.active');
Route::post('/questions/{questionId}/check-answer', [QuestionController::class, 'checkAnswer'])->name('questions.checkAnswer');
Route::get('/thank-you', [QuestionController::class, 'thankYou'])->name('thankYou');
Route::post('/update-attempts', [QuestionController::class, 'updateAttempts'])->name('user.updateAttempts');

// Report Page
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

// Graphs Page
Route::get('/graphs', [GraphController::class, 'index'])->name('graphs.index');
