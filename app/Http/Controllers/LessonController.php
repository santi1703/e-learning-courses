<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json((Lesson::get())->makeVisible(['previous_id', 'course_id', 'created_at', 'updated_at']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|required|max:255',
            'threshold' => 'numeric|required|min:0',
            'course_id' => 'numeric|exists:courses,id',
            'previous_id' => 'numeric|exists:lessons,id',
        ]);

        $lesson = Lesson::create($validated);

        return response()->json([
            'status' => 'Succesfully created.',
            'data' => $lesson->makeVisible(['previous_id', 'course_id', 'created_at', 'updated_at']),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson, int $lessonId)
    {
        $lesson = Lesson::find($lessonId);

        if (!$lesson) {
            return response()->json(['error' => 'Not found.']);
        }

        return response()->json([
            'lesson' => $lesson->makeVisible(['previous_id', 'course_id', 'created_at', 'updated_at']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson, int $lessonId)
    {
        $validated = $request->validate([
            'name' => 'string|required|max:255',
            'threshold' => 'numeric|required|min:0',
            'course_id' => 'numeric|exists:courses,id',
            'previous_id' => 'numeric|exists:lessons,id|not_in:' . $lessonId,
        ]);

        $lesson = Lesson::find($lessonId);

        if (!$lesson) {
            return response()->json(['error' => 'Not found.']);
        }

        $lesson->update($validated);

        return response()->json([
            'status' => 'Succesfully updated.',
            'data' => $lesson->makeVisible(['previous_id', 'course_id', 'created_at', 'updated_at']),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson, int $lessonId)
    {
        $lesson = Lesson::find($lessonId);

        if (!$lesson) {
            return response()->json(['error' => 'Not found.']);
        }

        $lesson->delete();

        return response()->json([
            'status' => 'Succesfully deleted.',
            'data' => $lesson->makeVisible(['previous_id', 'course_id', 'created_at', 'updated_at']),
        ]);
    }
}
