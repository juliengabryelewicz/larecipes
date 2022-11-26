<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\RecipeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('recipes', RecipeController::class);
Route::resource('categories', CategoryController::class);
Route::resource('comments', CommentController::class)->only(['index', 'destroy']);
Route::get('comments/approve/{id}', [CommentController::class, 'approve'])->name('comments.approve');
Route::get('comments/reject/{id}', [CommentController::class, 'reject'])->name('comments.reject');
