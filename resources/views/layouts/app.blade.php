<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Background full-screen */
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

        /* Overlay untuk blur */
        .bg-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(10px); /* Blur effect */
            background-color: rgba(255, 255, 255, 0.2); /* Semi-transparent layer */
            z-index: -1;
        }
    </style>
</head>
<body>

    <!-- Background Image -->
    <div class="bg-full"></div>
    
    <!-- Overlay Blur -->
    <div class="bg-overlay"></div>

    <!-- Konten -->
    <div class="min-h-screen flex items-center justify-center">
        @yield('content')
    </div>

    {{-- Footer --}}
    @include('partials.footer')

    @stack('scripts')

</body>
</html>
