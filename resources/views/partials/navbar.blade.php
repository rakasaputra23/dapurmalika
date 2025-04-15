<nav class="bg-white shadow-md fixed top-0 w-full z-50">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <img src="/images/logo.png" alt="Logo" class="h-8">
            <span class="text-orange-500 font-bold text-xl">Dapur Malika</span>
        </div>
        <ul class="flex space-x-6 font-medium">
            <li><a href="{{ route('home') }}" class="hover:text-orange-500 {{ request()->is('/') ? 'text-orange-500' : '' }}">Beranda</a></li>
            <li><a href="{{ route('menu') }}" class="hover:text-orange-500 {{ request()->is('menu') ? 'text-orange-500' : '' }}">Menu Catering</a></li>
            <li><a href="{{ route('galeri') }}" class="hover:text-orange-500 {{ request()->is('galeri') ? 'text-orange-500' : '' }}">Galeri</a></li>
            <li><a href="{{ route('tentang') }}" class="hover:text-orange-500 {{ request()->is('tentang') ? 'text-orange-500' : '' }}">Tentang Kami</a></li>
            <li><a href="{{ route('kontak') }}" class="hover:text-orange-500 {{ request()->is('kontak') ? 'text-orange-500' : '' }}">Kontak</a></li>
        </ul>
        <div class="flex items-center space-x-4">
            <a href="#pesan" class="bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600">Pesan Sekarang</a>
        </div>
    </div>
</nav>
