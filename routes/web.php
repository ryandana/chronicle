<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
// Route::get('/', \App\Livewire\PostsList::class);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
// Route::get('/categories/{category:slug}', [CategoryController::class, 'index']);
Route::get('/authors/{author:username}', [AuthorController::class, 'show']);
