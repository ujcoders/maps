@extends('layouts.normal')

@section('content')
<div class="container mt-4">
    <h1>Active Question</h1>

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($question)
    <!-- Ensure that $question is passed correctly -->
    <h3>{{ $question->question_text }}</h3>

    <form action="{{ route('questions.checkAnswer', $question->id) }}" method="POST">
        @csrf
        @foreach($question->answers as $answer)
        <!-- Iterate through the associated answers -->
        <div class="form-check">
            <input class="form-check-input" type="radio" name="answer" id="answer{{ $answer->id }}"
                value="{{ $answer->id }}">
            <label class="form-check-label" for="answer{{ $answer->id }}">
                {{ $answer->answer_text }}
            </label>
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary mt-3">Submit Answer</button>
    </form>

    @if(session('success') && !session('error'))
    @php
    $nextQuestion = \App\Models\Question::where('id', '>', $question->id)->where('is_active', true)->first();
    @endphp

    @if(session('success') && !session('error'))
    <!-- Display next button only if the current question is answered correctly -->
    @if($nextQuestion)
    <a href="{{ route('questions.active', $nextQuestion->id) }}" class="btn btn-success mt-3">Next Question</a>
    @else
    <a href="{{ route('thankYou') }}" class="btn btn-success mt-3">Thank You</a>
    @endif
    @endif

    @endif
    @else
    <p>No active questions available.</p>
    @endif
</div>
@endsection
