<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;

Route::apiResource('teachers', TeacherController::class);
Route::apiResource('courses', CourseController::class);
