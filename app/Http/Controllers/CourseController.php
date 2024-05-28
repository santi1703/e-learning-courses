<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json((Course::get())->makeVisible(['previous_id', 'created_at', 'updated_at']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|required|max:255',
            'previous_id' => 'numeric|exists:courses,id',
        ]);

        $course = Course::create($validated);

        return response()->json([
            'status' => 'Succesfully created.',
            'data' => $course->makeVisible(['previous_id', 'created_at', 'updated_at'])
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, int $courseId)
    {
        $course = Course::find($courseId);

        if (!$course) {
            return response()->json(['error' => 'Not found.']);
        }

        return response()->json([
            'course' => $course->makeVisible(['previous_id', 'created_at', 'updated_at'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course, int $courseId)
    {
        $validated = $request->validate([
            'name' => 'string|required|max:255',
            'previous_id' => 'numeric|exists:courses,id|exists:courses,id|not_in:' . $courseId,
        ]);

        $course = Course::find($courseId);

        if (!$course) {
            return response()->json(['error' => 'Not found.']);
        }

        $course->update($validated);

        return response()->json([
            'status' => 'Succesfully updated.',
            'data' => $course->makeVisible(['previous_id', 'created_at', 'updated_at'])
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, int $courseId)
    {
        $course = Course::find($courseId);

        if (!$course) {
            return response()->json(['error' => 'Not found.']);
        }

        $course->delete();

        return response()->json([
            'status' => 'Succesfully deleted.',
            'data' => $course->makeVisible(['previous_id', 'created_at', 'updated_at'])
        ]);
    }
}
