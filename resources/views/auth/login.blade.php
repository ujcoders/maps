<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* General Reset */
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #121212; /* Black background */
            color: #e0e0e0; /* Light gray text */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            color: #32a852; /* Dark green */
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background-color: #1e1e1e; /* Darker background */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.6);
            width: 100%;
            max-width: 400px;
            animation: fadeIn 1s ease-in-out;
        }

        label {
            font-size: 1rem;
            color: #e0e0e0;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #444;
            border-radius: 5px;
            background-color: #2a2a2a;
            color: #e0e0e0;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #32a852;
            background-color: #353535;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #32a852;
            color: #e0e0e0;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #28a745;
            transform: scale(1.05);
        }

        button:active {
            background-color: #23963b;
        }

        /* Error Message Styling */
        .errors {
            margin-bottom: 20px;
            background-color: #442222;
            color: #ffaaaa;
            padding: 10px;
            border-radius: 5px;
            font-size: 0.9rem;
        }

        .errors ul {
            padding-left: 20px;
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div>
        <h1>Login</h1>
        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
