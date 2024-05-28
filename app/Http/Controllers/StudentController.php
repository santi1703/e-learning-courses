<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function courses(): object
    {
        return $this->user->getCourses();
    }

    public function lessons(int $courseId): object
    {
        return $this->user->getLessons($courseId);
    }

    public function lessonDetails(int $lessonDetails): object
    {
        return $this->user->getLessonDetails($lessonDetails);
    }
}
