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
            overflow: hidden;
        }
        .map-container {
            position: relative;
            width: 100vw;
            height: 100vh;
        }
        .map-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .button {
            position: absolute;
            padding: 10px 20px;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        .button:hover {
            filter: brightness(0.9);
        }
        .active-btn {
            top: 40%;
            left: 90%;
            background-color: yellow;
            color: black;
        }
        .inactive-btn {
            top: 50%;
            left: 90%;
            background-color: red;
        }
        .complete-btn {
            top: 60%;
            left: 90%;
            background-color: blue;
        }
    </style>
</head>
<body>
    <div class="map-container">
        <img src="{{ asset('map.jpg') }}" alt="Map" class="map-image">

        @php
        $nextQuestion = \App\Models\Question::where('is_active', true)->first();
        $user = session('user'); // Assuming you are using authentication to get the logged-in user
        $userHasAttempted = $user->attempts > 0;
        @endphp

<button class="button active-btn" onclick="setActiveAndNavigate('{{ route('questions.active', $nextQuestion->id) }}')">Active</button>
        {{-- @if (!$userHasAttempted)
        @endif --}}

        <button class="button inactive-btn" onclick="navigateTo('{{ route('inactive.view') }}')">Inactive</button>
        <button class="button complete-btn" onclick="navigateTo('{{ route('complete.view') }}')">Complete</button>
    </div>

    <script>
        function navigateTo(url) {
            window.location.href = url;
        }

        function setActiveAndNavigate(url) {
            // Send AJAX request to update attempts
            fetch('{{ route('user.updateAttempts') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ attempt: 1 })
            })
            .then(response => response.json())
            .then(data => {
                // Navigate to the active question
                window.location.href = url;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
