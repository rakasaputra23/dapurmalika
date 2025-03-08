<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian - Dapur Malika</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100">

    <!-- Navbar -->
    <nav class="w-full flex justify-between items-center px-6 py-4 bg-red-500 text-white">
        <div class="text-2xl font-bold">Dapur Malika</div>
        <div class="flex space-x-6">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <a href="#" class="hover:underline">Menu</a>
            <a href="#" class="hover:underline">Kontak</a>
            <a href="#" class="hover:underline">Tentang</a>
        </div>

        <!-- Form Search -->
        <form action="{{ route('search') }}" method="GET" class="relative">
            <input type="text" name="query" placeholder="Cari menu..." class="px-4 py-2 rounded-lg text-black">
            <button type="submit" class="absolute right-2 top-2 text-gray-600">🔍</button>
        </form>
    </nav>

    <!-- Hasil Pencarian -->
    <section class="container mx-auto mt-8 p-4">
        <h2 class="text-2xl font-bold text-gray-800">Hasil Pencarian untuk: "{{ $query }}"</h2>

        @if($results->isEmpty())
            <p class="mt-4 text-gray-600">Tidak ada hasil ditemukan.</p>
        @else
            <ul class="mt-4 space-y-4">
                @foreach($results as $menu)
                    <li class="p-4 bg-white shadow rounded-lg">
                        <h3 class="text-xl font-semibold">{{ $menu->name }}</h3>
                        <p class="text-gray-600">{{ $menu->description }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center py-6 mt-8">
        <p>&copy; 2025 Dapur Malika - All Rights Reserved</p>
    </footer>

</body>
</html>
