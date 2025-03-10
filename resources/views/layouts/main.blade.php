<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Background Blur Effect */
        .bg-full {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/images/background.jpg') no-repeat center center fixed;
            background-size: cover;
            z-index: -1;
        }

        .bg-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(12px);
            background-color: rgba(255, 255, 255, 0.2);
            z-index: -1;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">

    <!-- Background -->
    <div class="bg-full"></div>
    <div class="bg-overlay"></div>

    <!-- Navbar -->
    <nav class="bg-white shadow-md py-4 px-6 fixed w-full top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-800 hover:text-orange-600 transition">
                Dapur Malika
            </a>
            <div>
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-orange-600 mx-4 transition">Home</a>
                <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-orange-600 mx-4 transition">Dashboard</a>
                <a href="{{ route('logout') }}" class="text-white bg-orange-500 px-4 py-2 rounded-lg hover:bg-orange-600 transition">
                    Logout
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-24 px-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-10">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Dapur Malika - All Rights Reserved</p>
            <div class="mt-3">
                <a href="#" class="mx-2 text-gray-400 hover:text-white transition"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="mx-2 text-gray-400 hover:text-white transition"><i class="fab fa-twitter"></i></a>
                <a href="#" class="mx-2 text-gray-400 hover:text-white transition"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>

</body>
</html>
