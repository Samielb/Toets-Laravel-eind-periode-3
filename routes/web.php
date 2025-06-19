<?php

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;

// Courses Routes
Route::resource('courses', CourseController::class);
Route::get('/', [CourseController::class, 'index'])->name('courses.index');

// Teachers Routes
Route::resource('teachers', TeacherController::class);

Route::get('/teachers/create', function () {
    return view('teachers.create');
});

Route::get('/courses/{id}/edit', function ($id) {
    $course = CourseController::show($id);
    return view('courses.edit', ['course' => $course]);
});

Route::get('/teachers/{id}/edit', function ($id) {
    $teacher = TeacherController::show($id);
    return view('teachers.edit', ['teacher' => $teacher]);
});

Route::post('/courses', [CourseController::class, 'store']);
Route::post('/teachers', [TeacherController::class, 'store']);
Route::put('/courses/{id}', [CourseController::class, 'update']);
Route::put('/teachers/{id}', [TeacherController::class, 'update']);
Route::delete('/courses/{id}', [CourseController::class, 'destroy']);
Route::delete('/teachers/{id}', [TeacherController::class, 'destroy']);
 