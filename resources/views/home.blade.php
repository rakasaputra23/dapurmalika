<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Dapur Malika</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleMenu() {
            document.getElementById("mobile-menu").classList.toggle("hidden");
        }

        function toggleSearch() {
            document.getElementById("search-bar").classList.toggle("hidden");
        }
    </script>
</head>
<body class="font-sans bg-gray-100">

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" defer></script>

<!-- Navbar -->
<nav class="fixed z-50 w-full flex justify-between items-center px-6 py-4 bg-gradient-to-r from-[#ff6f00] via-[#ff9800] to-[#ffcc80] text-white shadow-md">
    <div class="text-2xl font-bold">Dapur Malika</div>
    <div class="hidden md:flex space-x-6">
        <a href="{{ route('menu') }}" class="hover:underline active:scale-95 transition">Menu</a>
        <a href="{{ route('galeri') }}" class="hover:underline active:scale-95 transition">Galeri</a>
        <a href="{{ route('kontak') }}" class="hover:underline active:scale-95 transition">Kontak</a>
        <a href="{{ route('tentang') }}" class="hover:underline active:scale-95 transition">Tentang</a>
    </div>

    <div class="hidden md:flex items-center space-x-4">
        <button onclick="toggleSearch()" class="text-white text-xl hover:scale-110 transition">
            <i class="fa-solid fa-search"></i>
        </button>

        @if($isAdmin)
            <a href="{{ route('admin.profile') }}" class="flex items-center space-x-2 bg-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-200 transition">
                <i class="fa-solid fa-user text-gray-700 text-lg"></i>
                <span class="text-black font-semibold">{{ $admin->name ?? 'Admin' }}</span>
            </a>
            <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-red-500 px-4 py-2 rounded-lg hover:bg-red-600 transition">Logout</button>
            </form>
        @endif
    </div>
</nav>

<!-- Redirect untuk halaman reset password admin -->
@if(request()->is('admin/password/reset'))
    <script>
        window.location.href = "{{ route('admin.login') }}";
    </script>
@endif

<!-- Search Bar -->
<div id="search-bar" class="hidden fixed top-16 left-0 w-full bg-white shadow-md p-4 flex justify-center">
    <input type="text" id="search-input" placeholder="Cari menu..." class="w-3/4 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
</div>

<!-- Hero Section -->
<header class="relative w-full h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('https://source.unsplash.com/1600x900/?restaurant,food');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative z-20 text-center text-white animate-fade-in">
        <h1 class="text-5xl font-bold animate-bounce">Welcome to Dapur Malika</h1>
        <p class="mt-4 text-lg animate-fade-in-delayed">Tempat terbaik untuk makanan berkualitas.</p>
    </div>
</header>

<!-- About Section -->
<section id="about" class="py-16 bg-white text-center">
    <h2 class="text-3xl font-bold text-gray-800">What We Stand For</h2>
    <div class="mt-8 flex flex-wrap justify-center gap-10">
        <div class="max-w-xs p-6 bg-gray-100 rounded-lg shadow-md hover:shadow-xl transition hover:scale-105">
            <div class="text-red-500 text-4xl">&#9632;</div>
            <h3 class="text-xl font-semibold mt-4">Responsive</h3>
            <p class="mt-2 text-gray-600">Kami memberikan layanan terbaik untuk pelanggan.</p>
        </div>
        <div class="max-w-xs p-6 bg-gray-100 rounded-lg shadow-md hover:shadow-xl transition hover:scale-105">
            <div class="text-blue-500 text-4xl">&#9632;</div>
            <h3 class="text-xl font-semibold mt-4">Quality</h3>
            <p class="mt-2 text-gray-600">Kami hanya menggunakan bahan makanan berkualitas tinggi.</p>
        </div>
        <div class="max-w-xs p-6 bg-gray-100 rounded-lg shadow-md hover:shadow-xl transition hover:scale-105">
            <div class="text-green-500 text-4xl">&#9632;</div>
            <h3 class="text-xl font-semibold mt-4">Support</h3>
            <p class="mt-2 text-gray-600">Kami selalu siap membantu pelanggan kami.</p>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-white text-center py-6">
    <p>&copy; 2025 Dapur Malika - All Rights Reserved</p>
    <p>Jl. Contoh No. 123, Kota Kuliner, Indonesia</p>
    <p>Email: support@dapurmalika.com | Telp: +62 812 3456 7890</p>
</footer>

</body>
</html>
