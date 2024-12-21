<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAnswer;
use App\Models\User;
use App\Models\Question;
use DB;

class GraphController extends Controller
{
    public function index()
    {
        // Get all questions
        $questions = Question::all(); // Fetch all questions

        $chartData = [];

        // Loop through each question to prepare chart data
        foreach ($questions as $question) {
            $questionId = $question->id;

            // Get all the users who attempted this question
            $userAnswers = UserAnswer::where('question_id', $questionId)
                ->join('users', 'users.id', '=', 'user_answers.user_id')
                ->select('users.id', 'users.name', 'users.state', 'user_answers.is_correct')
                ->get();

            // Group the data by state
            $stateData = $userAnswers->groupBy('state');

            // Prepare the data for the chart
            $states = [];
            $correctPercentages = [];
            $incorrectPercentages = [];

            // Calculate statistics for each state
            foreach ($stateData as $state => $answers) {
                $totalUsers = $answers->count();
                $correctAnswers = $answers->where('is_correct', 1)->count();
                $incorrectAnswers = $totalUsers - $correctAnswers;
                $correctPercentage = ($totalUsers > 0) ? ($correctAnswers / $totalUsers) * 100 : 0;
                $incorrectPercentage = 100 - $correctPercentage;

                $states[] = $state;
                $correctPercentages[] = $correctPercentage;
                $incorrectPercentages[] = $incorrectPercentage;
            }

            // Prepare chart data for the question
            $chartData[] = [
                'question' => $question->question_text,  // Assuming you have a 'text' field for the question
                'states' => $states,
                'correctPercentages' => $correctPercentages,
                'incorrectPercentages' => $incorrectPercentages
            ];
        }

        // Pass the data to the view
        return view('graphs.index', compact('chartData'));
    }
}
