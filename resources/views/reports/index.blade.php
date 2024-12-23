@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <h1 class="mb-4">Questions Report</h1>

    @foreach ($reportData as $data)
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2>Report for Question: {{ $data['question'] }}</h2>
            </div>
            <div class="card-body">
                <h4 class="text-success">Overall Correct Percentage: {{ $data['overall_percentage'] }}%</h4>

                <!-- Region-wise Report -->
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Region</th>
                                <th>Total Users</th>
                                <th>Correct Answers</th>
                                <th>Incorrect Answers</th>
                                <th>Correct Percentage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['report_data'] as $regionData)
                                <tr>
                                    <td>{{ $regionData['region'] }}</td>
                                    <td>{{ $regionData['total_users'] }}</td>
                                    <td>{{ $regionData['correct_answers'] }}</td>
                                    <td>{{ $regionData['incorrect_answers'] }}</td>
                                    <td>{{ $regionData['correct_percentage'] }}%</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
