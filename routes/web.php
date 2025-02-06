<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('users.index');
Route::get('/article', [ArticleController::class, 'index'])->name('article.index');

Route::get('/users-search', [ArticleController::class, 'viewSearch'])->name('article.search-view');
Route::get('/search-users', [ArticleController::class, 'search'])->name('article.search');

Route::post('/update-article-user/{id}', [ArticleController::class, 'updateUser']);
// Route::get('/search', [UserController::class, 'search'])->name('users.search');
