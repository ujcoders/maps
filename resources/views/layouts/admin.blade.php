<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Add Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa; /* Light background */
            color: #212529; /* Dark text color */
        }

        .navbar {
            background-color: #343a40; /* Dark navbar */
        }

        .navbar a, .navbar .logout-btn {
            color: #ffffff;
        }

        .logout-btn:hover {
            background-color: #495057; /* Slightly lighter on hover */
        }

        .sidebar {
            background-color: #343a40; /* Dark sidebar */
        }

        .sidebar a {
            color: #ffffff;
        }

        footer {
            background-color: #343a40; /* Dark footer */
            color: #ffffff;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Graphs</a>
                    </li> --}}
                </ul>
                <!-- Logout button -->
                <button class="btn btn-danger logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
                <!-- Logout form (hidden) -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="d-flex">
        <div class="sidebar p-3" style="width: 250px; min-height: 100vh;">
            <h5 class="text-white">Admin Panel</h5>
            <a href="{{ route('admin.questions.index') }}" class="nav-link">Dashboard</a>
            <a href="{{ route('reports.index') }}" class="nav-link">Reports</a>
            <a href="{{ route('graphs.index') }}" class="nav-link">Graphs</a>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-3">
        Admin Dashboard &copy; 2024
    </footer>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
