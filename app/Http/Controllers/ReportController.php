<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAnswer;
use App\Models\User;
use App\Models\Question;
use DB;

class ReportController extends Controller
{
    public function index()
    {
        // Get all questions
        $questions = Question::all(); // Fetch all questions

        $reportData = [];

        foreach ($questions as $question) {
            $questionId = $question->id;

            // Get all the users who attempted this question
            $userAnswers = UserAnswer::where('question_id', $questionId)
                ->join('users', 'users.id', '=', 'user_answers.user_id')
                ->select('users.id', 'users.name', 'users.state', 'user_answers.is_correct')
                ->get();

            // Group the data by state
            $stateData = $userAnswers->groupBy('state');

            // Calculate statistics for each state
            $questionReportData = [];

            foreach ($stateData as $state => $answers) {
                $totalUsers = $answers->count();
                $correctAnswers = $answers->where('is_correct', 1)->count();
                $incorrectAnswers = $totalUsers - $correctAnswers;
                $correctPercentage = ($totalUsers > 0) ? ($correctAnswers / $totalUsers) * 100 : 0;

                $questionReportData[] = [
                    'state' => $state,
                    'total_users' => $totalUsers,
                    'correct_answers' => $correctAnswers,
                    'incorrect_answers' => $incorrectAnswers,
                    'correct_percentage' => round($correctPercentage, 2)
                ];
            }

            // Calculate average correct percentage for this question across all states
            $totalUsers = $userAnswers->count();
            $totalCorrectAnswers = $userAnswers->where('is_correct', 1)->count();
            $overallPercentage = ($totalUsers > 0) ? ($totalCorrectAnswers / $totalUsers) * 100 : 0;

            // Store the data for the question in the report
            $reportData[] = [
                'question' => $question->question_text, // Assuming you have a 'text' field for the question
                'report_data' => $questionReportData,
                'overall_percentage' => round($overallPercentage, 2)
            ];
        }

        // Pass the data to the view
        return view('reports.index', compact('reportData'));
    }
}
