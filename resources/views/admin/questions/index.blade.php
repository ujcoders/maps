@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Questions</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-dark">
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
                                <button type="submit" class="btn btn-primary btn-sm">Toggle Status</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
