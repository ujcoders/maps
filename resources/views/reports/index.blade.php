@extends('layouts.admin')

@section('content')
    <h1>Questions Report</h1>

    @foreach ($reportData as $data)
        <h2>Report for Question: {{ $data['question'] }}</h2>
        <h4>Overall Correct Percentage: {{ $data['overall_percentage'] }}%</h4>

        <!-- State-wise Report -->
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>State</th>
                    <th>Total Users</th>
                    <th>Correct Answers</th>
                    <th>Incorrect Answers</th>
                    <th>Correct Percentage</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['report_data'] as $stateData)
                    <tr>
                        <td>{{ $stateData['state'] }}</td>
                        <td>{{ $stateData['total_users'] }}</td>
                        <td>{{ $stateData['correct_answers'] }}</td>
                        <td>{{ $stateData['incorrect_answers'] }}</td>
                        <td>{{ $stateData['correct_percentage'] }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
@endsection
