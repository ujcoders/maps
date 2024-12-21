@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Questions</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped table-hover text-dark">
        <thead>
            <tr>
                <th>ID</th>
                <th>Question Text</th>
                <th>Is Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->question_text }}</td>
                    <td>{{ $question->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.questions.toggleStatus', $question->id) }}">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-primary">Toggle Status</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
