<!-- Navbar -->
<nav class="fixed z-50 w-full flex items-center px-6 py-3 bg-white/90 backdrop-blur-md text-gray-800 shadow-sm transition-all duration-300">
        <div class="w-1/4">
            <!-- Logo (Left) -->
            <div class="flex items-center">
                <div class="relative group">
                    <img src="/api/placeholder/50/50" alt="Logo" class="w-10 h-10 mr-3 rounded-full shadow-sm group-hover:scale-105 transition-all duration-300">
                    <div class="absolute -inset-1 bg-gradient-to-r from-primary-dark to-primary-light rounded-full opacity-0 group-hover:opacity-20 transition-all duration-300 -z-10"></div>
                </div>
                <div class="text-2xl font-bold bg-gradient-to-r from-primary-dark via-primary to-primary-light bg-clip-text text-transparent hover:tracking-wide transition-all duration-300">Dapur Malika</div>
            </div>
        </div>

        <!-- Desktop Menu (Absolute Center) -->
        <div class="absolute left-1/2 transform -translate-x-1/2 hidden md:block">
            <div class="flex items-center">
                <div class="relative mx-1 group">
                    <a href="{{ route('home') }}" class="px-4 py-2 font-medium text-gray-700 hover:text-primary transition-all duration-300">Beranda</a>
                    <div class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-primary transform -translate-x-1/2 group-hover:w-full transition-all duration-300"></div>
                </div>
                <div class="relative mx-1 group">
                    <a href="{{ route('menu') }}" class="px-4 py-2 font-medium text-gray-700 hover:text-primary transition-all duration-300">Menu</a>
                    <div class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-primary transform -translate-x-1/2 group-hover:w-full transition-all duration-300"></div>
                </div>
                <div class="relative mx-1 group">
                    <a href="{{ route('galeri') }}" class="px-4 py-2 font-medium text-gray-700 hover:text-primary transition-all duration-300">Galeri</a>
                    <div class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-primary transform -translate-x-1/2 group-hover:w-full transition-all duration-300"></div>
                </div>
                <div class="relative mx-1 group">
                    <a href="{{ route('tentang') }}" class="px-4 py-2 font-medium text-gray-700 hover:text-primary transition-all duration-300">Tentang Kami</a>
                    <div class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-primary transform -translate-x-1/2 group-hover:w-full transition-all duration-300"></div>
                </div>
                <div class="relative mx-1 group">
                    <a href="{{ route('kontak') }}" class="px-4 py-2 font-medium text-gray-700 hover:text-primary transition-all duration-300">Kontak</a>
                    <div class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-primary transform -translate-x-1/2 group-hover:w-full transition-all duration-300"></div>
                </div>
            </div>
        </div>
    </nav>