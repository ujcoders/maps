@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h1 class="text-center text-light mb-4">Questions Report</h1>

    @foreach ($chartData as $data)
        <div class="card shadow-lg bg-dark text-light mb-5">
            <div class="card-header bg-primary">
                <h3 class="text-center">{{ $data['question'] }}</h3>
            </div>
            <div class="card-body">
                <!-- Bar Chart -->
                <div class="chart-container">
                    <canvas id="bar-chart-{{ $loop->index }}" class="chart"></canvas>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx = document.getElementById('bar-chart-{{ $loop->index }}').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($data['regions']) !!}, // Regions
                    datasets: [
                        {
                            label: 'Correct Answers',
                            data: {!! json_encode($data['correctPercentages']) !!}, // Correct percentages
                            backgroundColor: 'rgba(54, 162, 235, 0.6)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                        },
                        {
                            label: 'Incorrect Answers',
                            data: {!! json_encode($data['incorrectPercentages']) !!}, // Incorrect percentages
                            backgroundColor: 'rgba(255, 99, 132, 0.6)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                        },
                    ],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Performance by Region',
                        },
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100, // Percentage scale
                        },
                    },
                },
            });
        </script>
    @endforeach
</div>
@endsection

@push('styles')
<style>
    body {
        background-color: #1a1a1a;
        color: #fff;
    }

    .text-light {
        color: #fff !important;
    }

    .card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
    }

    .card-header {
        font-size: 1.5rem;
        text-align: center;
        padding: 10px 0;
    }

    .chart-container {
        position: relative;
        width: 100%;
        max-height: 400px;
    }

    .chart {
        max-width: 100%;
        height: auto;
    }

    @media (max-width: 768px) {
        .chart-container {
            max-height: 300px;
        }

        h1 {
            font-size: 1.8rem;
        }

        h3 {
            font-size: 1.4rem;
        }
    }
</style>
@endpush
