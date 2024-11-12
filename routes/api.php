<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DishController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/books', [BookController::class,'index']);
Route::get('/dishes', [DishController::class,'index']);
Route::get('/courses', [CourseController::class,'index']);
Route::get('/courses/{id}', [CourseController::class,'show']);
