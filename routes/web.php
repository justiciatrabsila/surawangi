<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NewsController::class, 'index'])->name('home');

Route::get('/profil', [PageController::class, 'profile'])->name('profile.index');

Route::get('/berita/{category}', [NewsController::class, 'category'])->name('news.index');

Route::get('/berita/{category}/{slug}', [NewsController::class, 'show'])->name('news.show');
