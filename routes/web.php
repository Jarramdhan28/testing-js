<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('users.index');
Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
// Route::get('/search', [UserController::class, 'search'])->name('users.search');
