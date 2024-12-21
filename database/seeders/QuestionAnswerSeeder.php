<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Answer;

class QuestionAnswerSeeder extends Seeder
{
    public function run()
    {
        // Question 1
        $question = Question::create([
            'question_text' => 'What is the capital of France?',
            'is_active' => true,
        ]);
        Answer::insert([
            ['question_id' => $question->id, 'answer_text' => 'Paris', 'is_correct' => true],
            ['question_id' => $question->id, 'answer_text' => 'London', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'Berlin', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'Madrid', 'is_correct' => false],
        ]);

        // Question 2
        $question = Question::create([
            'question_text' => 'Who developed the theory of relativity?',
            'is_active' => true,
        ]);
        Answer::insert([
            ['question_id' => $question->id, 'answer_text' => 'Albert Einstein', 'is_correct' => true],
            ['question_id' => $question->id, 'answer_text' => 'Isaac Newton', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'Galileo Galilei', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'Nikola Tesla', 'is_correct' => false],
        ]);

        // Question 3
        $question = Question::create([
            'question_text' => 'What is the largest planet in our solar system?',
            'is_active' => true,
        ]);
        Answer::insert([
            ['question_id' => $question->id, 'answer_text' => 'Jupiter', 'is_correct' => true],
            ['question_id' => $question->id, 'answer_text' => 'Saturn', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'Earth', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'Mars', 'is_correct' => false],
        ]);

        // Question 4
        $question = Question::create([
            'question_text' => 'In which year did World War II end?',
            'is_active' => true,
        ]);
        Answer::insert([
            ['question_id' => $question->id, 'answer_text' => '1945', 'is_correct' => true],
            ['question_id' => $question->id, 'answer_text' => '1944', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => '1939', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => '1950', 'is_correct' => false],
        ]);

        // Question 5
        $question = Question::create([
            'question_text' => 'Who wrote the play "Romeo and Juliet"?',
            'is_active' => true,
        ]);
        Answer::insert([
            ['question_id' => $question->id, 'answer_text' => 'William Shakespeare', 'is_correct' => true],
            ['question_id' => $question->id, 'answer_text' => 'Charles Dickens', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'Jane Austen', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'Mark Twain', 'is_correct' => false],
        ]);

        // Question 6
        $question = Question::create([
            'question_text' => 'What is the smallest country in the world?',
            'is_active' => true,
        ]);
        Answer::insert([
            ['question_id' => $question->id, 'answer_text' => 'Vatican City', 'is_correct' => true],
            ['question_id' => $question->id, 'answer_text' => 'Monaco', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'Nauru', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'San Marino', 'is_correct' => false],
        ]);

        // Question 7
        $question = Question::create([
            'question_text' => 'Which element has the chemical symbol "O"?',
            'is_active' => true,
        ]);
        Answer::insert([
            ['question_id' => $question->id, 'answer_text' => 'Oxygen', 'is_correct' => true],
            ['question_id' => $question->id, 'answer_text' => 'Osmium', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'Ozone', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'Oganesson', 'is_correct' => false],
        ]);

        // Question 8
        $question = Question::create([
            'question_text' => 'Which country is known as the Land of the Rising Sun?',
            'is_active' => true,
        ]);
        Answer::insert([
            ['question_id' => $question->id, 'answer_text' => 'Japan', 'is_correct' => true],
            ['question_id' => $question->id, 'answer_text' => 'China', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'India', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'South Korea', 'is_correct' => false],
        ]);

        // Question 9
        $question = Question::create([
            'question_text' => 'Which animal is known as the King of the Jungle?',
            'is_active' => true,
        ]);
        Answer::insert([
            ['question_id' => $question->id, 'answer_text' => 'Lion', 'is_correct' => true],
            ['question_id' => $question->id, 'answer_text' => 'Tiger', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'Elephant', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'Giraffe', 'is_correct' => false],
        ]);

        // Question 10
        $question = Question::create([
            'question_text' => 'What is the longest river in the world?',
            'is_active' => true,
        ]);
        Answer::insert([
            ['question_id' => $question->id, 'answer_text' => 'Nile', 'is_correct' => true],
            ['question_id' => $question->id, 'answer_text' => 'Amazon', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'Yangtze', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'Ganges', 'is_correct' => false],
        ]);

        // Question 11
        $question = Question::create([
            'question_text' => 'Which planet is known as the Red Planet?',
            'is_active' => true,
        ]);
        Answer::insert([
            ['question_id' => $question->id, 'answer_text' => 'Mars', 'is_correct' => true],
            ['question_id' => $question->id, 'answer_text' => 'Venus', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'Jupiter', 'is_correct' => false],
            ['question_id' => $question->id, 'answer_text' => 'Saturn', 'is_correct' => false],
        ]);
    }
}
