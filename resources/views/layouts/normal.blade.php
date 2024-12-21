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
            background-color: #2d3e3f; /* Dark teal background */
            color: #ffffff; /* White text color */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Navbar */
        .navbar {
            background-color: #1c1f1f; /* Darker black for the navbar */
            padding: 15px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            width: 100%;
        }

        .navbar a {
            color: #ffffff;
            text-decoration: none;
            padding: 10px;
            display: inline-block;
        }

        .navbar a:hover {
            background-color: #3c4a4a; /* Darker teal hover effect */
        }

        .navbar .logout-btn {
            background-color: #e74c3c; /* Red logout button */
            color: #ffffff;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .navbar .logout-btn:hover {
            background-color: #c0392b; /* Darker red on hover */
        }

        .toggle-btn {
            display: none;
            cursor: pointer;
            font-size: 30px;
        }

        /* Sidebar */
        .sidebar {
            background-color: #34495e; /* Dark gray-blue sidebar */
            height: 100vh;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            transition: all 0.3s ease;
        }

        .sidebar a {
            color: #ffffff;
            display: block;
            padding: 12px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #3c4a4a; /* Darker teal hover effect */
        }

        /* Content area */
        .content {
            margin-left: 250px;
            padding: 20px;
            margin-top: 60px; /* Adjust for fixed navbar */
            transition: margin-left 0.3s ease;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #1c1f1f; /* Dark footer */
            color: #ffffff;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Mobile View */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
                left: -200px; /* Hidden by default */
            }

            .sidebar.active {
                left: 0; /* Sidebar visible */
            }

            .content {
                margin-left: 0;
            }

            .navbar .toggle-btn {
                display: block;
            }

            .navbar a {
                display: inline-block;
            }
        }

        /* Table Style */
        .table {
            background-color: #2c3e50; /* Darker gray background for the table */
            border: 1px solid #ffffff; /* White border for the table */
            color: #ffffff; /* White text for table */
        }

        .table th, .table td {
            border-color: #ffffff; /* White border for the table cells */
            color: #ffffff; /* Ensure text is white */
        }

        .table th {
            background-color: #3c4a4a; /* Dark teal background for table headers */
        }

        .table-striped tbody tr:nth-child(odd) {
            background-color: #34495e; /* Alternating rows in a dark gray-blue */
        }

        .table-hover tbody tr:hover {
            background-color: #3c4a4a; /* Dark teal hover effect */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="#">Dashboard</a>
        {{-- <a href="#">Users</a>
        <a href="#">Settings</a> --}}
        <button class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <span class="toggle-btn" onclick="toggleSidebar()">☰</span>
    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('content') <!-- Content for each page will go here -->
    </div>

    <!-- Footer -->
    <footer>
        <p>Admin Dashboard &copy; 2024</p>
    </footer>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script to toggle sidebar on mobile -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }
    </script>
</body>
</html>
