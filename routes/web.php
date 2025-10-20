<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NewsController::class, 'index'])->name('home');

// Halaman Profil
Route::get('/profil', [PageController::class, 'profile'])->name('profile.index');

// Daftar berita per kategori (pakai binding slug)
Route::get('/berita/{category:slug}', [NewsController::class, 'category'])->name('news.index');

// Detail berita berdasarkan kategori + slug
Route::get('/berita/{category:slug}/{slug}', [NewsController::class, 'show'])->name('news.show');
