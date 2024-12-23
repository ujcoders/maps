<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100vw;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .map-container {
            position: relative;
            width: 100%;
            height: 100%;
            background: url('{{ asset('map.jpg') }}') no-repeat center center;
            background-size: cover;
        }
        .question-list {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .regin {
            position: absolute;
            bottom: 10px;
            left: 10px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .question-button {
            padding: 10px 15px;
            border: none;
            font-size: 14px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            min-width: 100px;
            text-align: center;
        }
        .question-button.active {
            background-color: yellow;
            color: black;
        }
        .question-button.attempted {
            background-color: blue;
        }
        .question-button.inactive {
            background-color: red;
        }
        .question-button:hover {
            filter: brightness(0.9);
        }
    </style>
</head>
<body>
    <div class="map-container">
        @php
        $user = session('user'); // Get authenticated user
        $userAnswers = \App\Models\UserAnswer::where('user_id', $user->id)->get()->keyBy('question_id'); // User attempts
        $questions = \App\Models\Question::all(); // All questions
        @endphp

        <div class="question-list">
            @foreach ($questions as $question)
                @php
                    $buttonClass = 'inactive'; // Default
                    if ($userAnswers->has($question->id)) {
                        // dump($userAnswers);
                        // dd($question->id);
                        $buttonClass = 'attempted'; // User has attempted
                    }
                    if ($question->is_active and !$userAnswers->has($question->id)) {
                        $buttonClass = 'active'; // Active question
                    }
                @endphp
               <button
               class="question-button {{ $buttonClass }}"
               onclick="navigateTo('{{ route('questions.active', $question->id) }}')"
               {{ $buttonClass === 'attempted' ? 'disabled' : '' }}>
               Q{{ $loop->iteration }}
                </button>
            @endforeach
        </div>
        <div class="regin">
            <img src="{{ asset('regin.png') }}" alt="loading" width="200px">
        </div>

    </div>

    <script>
        function navigateTo(url) {
            window.location.href = url;
        }
    </script>
</body>
</html>
