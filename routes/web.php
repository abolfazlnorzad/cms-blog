<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\LikePostController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\EditorUploadController;
use App\Http\Controllers\Panel\PostController;
use App\Http\Controllers\Panel\CommentController;
use App\Http\Controllers\Panel\ProfileController;
use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\SendCommentController;
use App\Http\Controllers\ShowPostController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', [LandingController::class,'index']);
Route::post('comment',[SendCommentController::class,'send'])->middleware('auth')->name('send.comment');
Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::post('/like/{post:slug}',[LikePostController::class,'index'])->middleware('auth')->name('like');
Route::get('/profile', [ProfileController::class,'show'])->name('profile');
Route::patch('/profile', [ProfileController::class,'update'])->name('profile.update');
Route::get('/category/{category:slug}',[\App\Http\Controllers\ShowCategoryController::class,'index'])->name('category.show');
Route::get('post/{post:slug}',[ShowPostController::class,'show'])
->name('show.post');
Route::get('/search',[\App\Http\Controllers\SearchController::class,'index'])->name('search');

Route::middleware(['auth', 'admin'])
    ->prefix('/panel')->group(function () {
        Route::resource('/users', UserController::class)
            ->except('show');
        Route::resource('/categories', CategoryController::class)
            ->except(['create', 'show']);
        Route::resource('/comments', CommentController::class)
            ->except(['create', 'show','edit','store']);

    });
Route::middleware(['auth', 'author'])
    ->prefix('/panel')->group(function () {
        Route::resource('/posts', PostController::class)
            ->except(['show']);
    });

Route::post('editor-upload',[EditorUploadController::class,'upload'])->name('editor-upload');


