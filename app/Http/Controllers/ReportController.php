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
    $questions = Question::all();

    $reportData = [];

    foreach ($questions as $question) {
        $questionId = $question->id;

        // Get all the users who attempted this question
        $userAnswers = UserAnswer::where('question_id', $questionId)
            ->join('users', 'users.id', '=', 'user_answers.user_id')
            ->select('users.id', 'users.name', 'users.region', 'user_answers.is_correct')
            ->get();

        // Group the data by region
        $regionData = $userAnswers->groupBy('region');

        // Calculate statistics for each region
        $questionReportData = [];

        foreach ($regionData as $region => $answers) {
            $totalUsers = $answers->count();
            $correctAnswers = $answers->where('is_correct', 1)->count();
            $incorrectAnswers = $totalUsers - $correctAnswers;
            $correctPercentage = ($totalUsers > 0) ? ($correctAnswers / $totalUsers) * 100 : 0;

            $questionReportData[] = [
                'region' => $region,
                'total_users' => $totalUsers,
                'correct_answers' => $correctAnswers,
                'incorrect_answers' => $incorrectAnswers,
                'correct_percentage' => round($correctPercentage, 2)
            ];
        }

        // Calculate overall correct percentage for the question
        $totalUsers = $userAnswers->count();
        $totalCorrectAnswers = $userAnswers->where('is_correct', 1)->count();
        $overallPercentage = ($totalUsers > 0) ? ($totalCorrectAnswers / $totalUsers) * 100 : 0;

        // Store the data for the question
        $reportData[] = [
            'question' => $question->question_text,
            'report_data' => $questionReportData,
            'overall_percentage' => round($overallPercentage, 2)
        ];
    }

    return view('reports.index', compact('reportData'));
}
}
