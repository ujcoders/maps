<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\UserAnswer;
use App\Models\Answer;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('admin.questions.index', compact('questions'));
    }

    public function toggleStatus($id)
    {
        $question = Question::findOrFail($id);
        $question->is_active = !$question->is_active;
        $question->save();

        return redirect()->route('admin.questions.index')->with('success', 'Question status updated.');
    }
    public function showActiveQuestion($questionId)
    {
        // Retrieve the active question (ensure there's at least one active question)
        $question = Question::where('is_active', true)->where('id',$questionId)->first();

        // If no active question, redirect to the Thank You page
        if (!$question) {
            return redirect()->route('thankYou'); // Redirect if no active question
        }

        // Pass the question and its associated answers to the view
        return view('active', compact('question'));
    }

    public function checkAnswer(Request $request, $questionId)
    {
        $question = Question::find($questionId);

        if (!$question) {
            return redirect()->route('thankYou');
        }

        // Get the selected answer's ID
        $selectedAnswerId = $request->input('answer');
        if (empty($selectedAnswerId)) {
            return back()->with('error', 'Your  Please select one option');
        }
        $correctAnswer = $question->answers()->where('is_correct', true)->first(); // Get the correct answer

        // Determine if the answer is correct
        $isCorrect = $correctAnswer && $selectedAnswerId == $correctAnswer->id;

        // Store the user's answer in the database
        UserAnswer::create([
            'user_id' => session('user')->id, // Assuming the user is authenticated
            'question_id' => $questionId,
            'answer_id' => $selectedAnswerId,
            'is_correct' => $isCorrect,
        ]);

        // If the answer is correct, move to the next question based on id
        if ($isCorrect) {
            // Query for the next question with id greater than the current question id
            $nextQuestion = Question::where('id', '>', $questionId)->where('is_active', true)->first();

            if ($nextQuestion) {
                // Proceed to the next question
                return redirect()->route('questions.active', ['questionId' => $nextQuestion->id])->with('success', 'Your answer is correct! Proceeding to the next question.');
            }

            // If there are no more questions, redirect to the Thank You page
            return redirect()->route('thankYou')->with('success', 'You have completed all questions.');
        }

        // If the answer is incorrect, stay on the current question
        return back()->with('error', 'Your answer is wrong! Please try again.');
    }



    public function thankYou()
    {
        return view('thank-you');
    }

    public function updateAttempts(Request $request)
    {
        $user = session('user'); // Get the authenticated user
        $user->attempts = $user->attempts + $request->attempt; // Increment attempts by 1
        $user->save();
        return response()->json(['success' => true]);
    }
}
