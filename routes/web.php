<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionAnswerController;
use App\Http\Controllers\MenuController;
Route::get('/', function () {
    return view('welcome');
});


Route::resource('contact', ContactController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('menu', MenuController::class)->only(['index', 'store','edit','destroy','update']);
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');

Route::resource('question_answer', QuestionAnswerController::class)->only(['index','store','edit','update','destroy']);
require __DIR__.'/auth.php';
