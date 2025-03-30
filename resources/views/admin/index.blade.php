<!-- resources/views/admin/index.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Si tienes un archivo CSS -->
</head>
<body>
    <div class="admin-container">
        @include('admin.sidebar', ['activeSection' => $activeSection])
        <div class="main-content">
            @include('admin.header', ['activeSection' => $activeSection])
            <main class="content">
                {{ dd($activeSection) }}
                @switch($activeSection)
                    @case('dashboard')
                        @include('admin.dashboard')
                    @break

                    @case('reports')
                        @include('admin.reports')
                    @break

                    @case('users')
                        @include('admin.users')
                    @break

                    @case('products')
                        @include('admin.products')
                    @break

                    @case('waste')
                        @include('admin.waste')
                    @break

                    @case('statistics')
                        @include('admin.statistics')
                    @break

                    @default
                        @include('admin.dashboard')
                @endswitch
            </main>
        </div>
    </div>
</body>
</html>