<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAnswer;
use App\Models\Question;

class GraphController extends Controller
{
    public function index()
    {
        // Fetch all questions
        $questions = Question::all();

        $chartData = [];

        foreach ($questions as $question) {
            $questionId = $question->id;

            // Fetch user answers with region data
            $userAnswers = UserAnswer::where('question_id', $questionId)
                ->join('users', 'users.id', '=', 'user_answers.user_id')
                ->select('users.region', 'user_answers.is_correct')
                ->get();

            // Group data by region
            $regionData = $userAnswers->groupBy('region');

            $regions = [];
            $correctPercentages = [];
            $incorrectPercentages = [];

            // Calculate stats for each region
            foreach ($regionData as $region => $answers) {
                $totalUsers = $answers->count();
                $correctAnswers = $answers->where('is_correct', 1)->count();
                $correctPercentage = ($totalUsers > 0) ? ($correctAnswers / $totalUsers) * 100 : 0;
                $incorrectPercentage = 100 - $correctPercentage;

                $regions[] = $region;
                $correctPercentages[] = round($correctPercentage, 2);
                $incorrectPercentages[] = round($incorrectPercentage, 2);
            }

            $chartData[] = [
                'question' => $question->question_text,
                'regions' => $regions,
                'correctPercentages' => $correctPercentages,
                'incorrectPercentages' => $incorrectPercentages,
            ];
        }

        return view('graphs.index', compact('chartData'));
    }
}
