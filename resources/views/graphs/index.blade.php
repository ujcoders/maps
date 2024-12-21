@extends('layouts.admin')

@section('content')
    <h1 class="text-center text-light">Questions Report</h1>

    @foreach ($chartData as $data)
        <div class="chart-container mb-5">
            <h3 class="text-light">Report for Question: {{ $data['question'] }}</h3>

            <!-- Bar Chart -->
            <div class="chart-wrapper">
                <canvas id="bar-chart-{{ $loop->index }}" class="chart" width="400" height="200"></canvas>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Bar Chart
            var ctx = document.getElementById('bar-chart-{{ $loop->index }}').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($data['states']) !!},  // States
                    datasets: [{
                        label: 'Correct Answers',
                        data: {!! json_encode($data['correctPercentages']) !!},  // Correct percentages
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Light green color
                        borderColor: 'rgba(75, 192, 192, 1)',  // Green border
                        borderWidth: 1
                    }, {
                        label: 'Incorrect Answers',
                        data: {!! json_encode($data['incorrectPercentages']) !!},  // Incorrect percentages
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',  // Light red color
                        borderColor: 'rgba(255, 99, 132, 1)',  // Red border
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100  // Percentage scale
                        }
                    }
                }
            });
        </script>
    @endforeach
@endsection

@push('styles')
    <style>
        .text-center {
            text-align: center;
        }

        .text-light {
            color: #ffffff;
        }

        .chart-container {
            margin-bottom: 30px;
        }

        .chart-wrapper {
            margin-bottom: 15px;
        }

        .chart {
            max-width: 100% !important;
            width: 100%;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .chart-wrapper {
                margin-bottom: 10px;
            }

            .chart {
                max-width: 100% !important;
                width: 100%;
                height: 150px !important;
            }

            h3 {
                font-size: 1.5rem; /* Adjust font size for smaller screens */
            }

            h1 {
                font-size: 2rem; /* Adjust font size for smaller screens */
            }
        }
    </style>
@endpush
