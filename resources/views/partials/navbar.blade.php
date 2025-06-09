<nav class="fixed z-50 w-full flex items-center px-6 py-3 bg-white/95 backdrop-blur-md shadow-sm transition-all duration-300">
    <div class="w-1/4">
        <!-- Logo -->
        <div class="flex items-center">
            <div class="relative group">
                <img src="/images/logo-dapur-malika.png" alt="Logo" class="w-10 h-10 mr-3 rounded-full shadow-sm group-hover:scale-105 transition-all duration-300">
                <div class="absolute -inset-1 bg-gradient-to-r from-primary-dark to-primary-light rounded-full opacity-0 group-hover:opacity-20 transition-all duration-300 -z-10"></div>
            </div>
            <div class="text-2xl font-bold bg-gradient-to-r from-primary-dark via-primary to-primary-light bg-clip-text text-transparent hover:tracking-wide transition-all duration-300">Dapur Malika</div>
        </div>
    </div>

    <!-- Desktop Menu -->
    <div class="absolute left-1/2 transform -translate-x-1/2 hidden md:block">
        <div class="flex items-center">
            @foreach([
                ['route' => 'home', 'text' => 'Beranda'],
                ['route' => 'menu', 'text' => 'Menu'],
                ['route' => 'galeri', 'text' => 'Galeri'],
                ['route' => 'tentang', 'text' => 'Tentang Kami'],
                ['route' => 'kontak', 'text' => 'Kontak']
            ] as $item)
            <div class="relative mx-1 group">
                <a href="{{ route($item['route']) }}" 
                   class="px-4 py-2 font-medium {{ request()->routeIs($item['route']) ? 'text-primary font-semibold' : 'text-gray-900 hover:text-primary' }} transition-all duration-300">
                    {{ $item['text'] }}
                </a>
                <div class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-primary transform -translate-x-1/2 {{ request()->routeIs($item['route']) ? 'w-full' : 'group-hover:w-full' }} transition-all duration-300"></div>
            </div>
            @endforeach
        </div>
    </div>
</nav>