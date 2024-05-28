<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json((Question::get())->makeVisible(['lesson_id', 'created_at', 'updated_at']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'statement' => 'string|required|max:255',
            'score' => 'numeric|required|min:0',
            'multiple' => 'boolean',
            'exhaustive' => 'boolean',
            'lesson_id' => 'numeric|exists:lessons,id',
        ]);

        $question = Question::create($validated);

        return response()->json([
            'status' => 'Succesfully created.',
            'data' => $question->makeVisible(['lesson_id', 'created_at', 'updated_at']),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question, int $questionId)
    {
        $question = Question::find($questionId);

        if (!$question) {
            return response()->json(['error' => 'Not found.']);
        }

        return response()->json([
            'question' => $question->makeVisible(['lesson_id', 'created_at', 'updated_at']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question, int $questionId)
    {
        $validated = $request->validate([
            'statement' => 'string|required|max:255',
            'score' => 'numeric|required|min:0',
            'multiple' => 'boolean',
            'exhaustive' => 'boolean',
            'lesson_id' => 'numeric|exists:lessons,id',
        ]);

        $question = Question::find($questionId);

        if (!$question) {
            return response()->json(['error' => 'Not found.']);
        }

        $question->update($validated);

        return response()->json([
            'status' => 'Succesfully updated.',
            'data' => $question->makeVisible(['lesson_id', 'created_at', 'updated_at']),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question, int $questionId)
    {
        $question = Question::find($questionId);

        if (!$question) {
            return response()->json(['error' => 'Not found.']);
        }

        $question->delete();

        return response()->json([
            'status' => 'Succesfully deleted.',
            'data' => $question->makeVisible(['lesson_id', 'created_at', 'updated_at']),
        ]);
    }
}
