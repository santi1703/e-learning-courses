<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\ProfessorRoleMiddleware;
use App\Http\Middleware\StudentRoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('user')->middleware(StudentRoleMiddleware::class)->group(function () {
        Route::get('courses', [StudentController::class, 'courses']);
        Route::get('lessons/{lesson_id}', [StudentController::class, 'lessonDetails']);
        Route::get('lessons/course/{course_id}', [StudentController::class, 'lessons']);
    });

    Route::prefix('courses')->middleware(ProfessorRoleMiddleware::class)->group(function () {
        Route::get('', [CourseController::class, 'index']);
        Route::post('', [CourseController::class, 'store']);
        Route::get('/{course_id}', [CourseController::class, 'show']);
        Route::put('/{course_id}', [CourseController::class, 'update']);
        Route::delete('/{course_id}', [CourseController::class, 'destroy']);
    });

    Route::prefix('lessons')->middleware(ProfessorRoleMiddleware::class)->group(function () {
        Route::get('', [LessonController::class, 'index']);
        Route::post('', [LessonController::class, 'store']);
        Route::get('/{lesson_id}', [LessonController::class, 'show']);
        Route::put('/{lesson_id}', [LessonController::class, 'update']);
        Route::delete('/{lesson_id}', [LessonController::class, 'destroy']);
    })->middleware(ProfessorRoleMiddleware::class);

    Route::prefix('questions')->middleware(ProfessorRoleMiddleware::class)->group(function () {
        Route::get('', [QuestionController::class, 'index']);
        Route::post('', [QuestionController::class, 'store']);
        Route::get('/{question_id}', [QuestionController::class, 'show']);
        Route::put('/{question_id}', [QuestionController::class, 'update']);
        Route::delete('/{question_id}', [QuestionController::class, 'destroy']);
    })->middleware(ProfessorRoleMiddleware::class);
});
