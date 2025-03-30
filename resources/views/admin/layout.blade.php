<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('header-title', 'Admin Panel')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> <!-- Enlace al archivo dashboard.css -->
    @stack('styles')
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #ecf0f1;
            margin: 0;
            padding: 0;
            color: #2c3e50;
        }
        .admin-container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #34495e;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            text-align: center;
            color: #ecf0f1;
        }
        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px 15px;
            margin: 5px 0;
            border-radius: 5px;
            font-size: 0.9rem;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .sidebar a:hover {
            background-color: #1abc9c;
            transform: translateX(5px);
        }
        .main-content {
            flex: 1;
            padding: 30px;
            background-color: #ecf0f1;
        }
        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 25px;
            transition: transform 0.2s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .table th {
            background-color: #34495e;
            color: white;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn-primary {
            background-color: #3498db;
            color: white;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
        .btn-danger {
            background-color: #e74c3c;
            color: white;
        }
        .btn-danger:hover {
            background-color: #c0392b;
        }
        .btn-outline {
            background-color: white;
            border: 1px solid #3498db;
            color: #3498db;
        }
        .btn-outline:hover {
            background-color: #3498db;
            color: white;
        }
        footer {
            text-align: center;
            padding: 15px;
            background-color: #34495e;
            color: white;
            margin-top: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div>
                <h2>Admin Panel</h2>
                @include('admin.sidebar')
            </div>
            <footer>
                &copy; {{ date('Y') }} Tiendita
            </footer>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
    </div>
</body>
</html>