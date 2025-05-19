<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Dapur Malika</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            light: '#ffcc80',
                            DEFAULT: '#ff9800',
                            dark: '#ff6f00',
                        }
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 1s ease-in-out',
                        'fade-in-delayed': 'fadeIn 1.5s ease-in-out',
                        'slide-up': 'slideUp 0.8s ease-in-out',
                    }
                }
            }
        }

        function toggleMenu() {
            document.getElementById("mobile-menu").classList.toggle("hidden");
        }

        function toggleSearch() {
            document.getElementById("search-bar").classList.toggle("hidden");
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        .carousel {
            scroll-behavior: smooth;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        .animate-fade-in-delayed {
            animation: fadeIn 1.5s ease-in-out;
        }

        .animate-slide-up {
            animation: slideUp 0.8s ease-in-out;
        }
    </style>
</head>

<body class="font-sans bg-gray-50 text-gray-800">

    @include('partials.navbar')

    <!-- Hero Section with Modern Design -->
    <header class="relative w-full h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/home.jpg') }}');">
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black/70"></div>
        <div class="relative z-20 h-full flex flex-col items-center justify-center text-center text-white px-6 max-w-5xl mx-auto">
            <span class="text-amber-400 text-lg font-medium mb-3 tracking-wider animate-fade-in">SELAMAT DATANG DI</span>
            <h1 class="text-5xl md:text-7xl font-bold animate-fade-in leading-tight">Dapur <span class="text-amber-400">Malika</span></h1>
            <p class="mt-6 text-lg md:text-xl animate-fade-in-delayed max-w-2xl opacity-90">Dapur Malika menyajikan hidangan Indonesia autentik dengan bahan-bahan premium untuk setiap acara spesial Anda</p>
            <div class="mt-10 flex flex-col sm:flex-row justify-center gap-5 animate-slide-up">
                <a href="#" class="bg-amber-500 hover:bg-amber-600 text-white px-8 py-4 rounded-full font-medium transition duration-300 shadow-lg hover:shadow-amber-500/30">
                    Pesan Sekarang
                </a>
                <a href="#menu" class="bg-transparent border-2 border-white hover:bg-white hover:text-gray-900 text-white px-8 py-4 rounded-full font-medium transition duration-300">
                    Lihat Menu
                </a>
            </div>
        </div>
        <!-- Scroll Down Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20 animate-bounce">
            <a href="#about" class="text-white opacity-70 hover:opacity-100 transition">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </a>
        </div>
    </header>

    <!-- About Section With Statistics -->
    <section id="about" class="py-24 bg-gradient-to-b from-amber-50 to-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-amber-500 font-medium uppercase tracking-wider">Tentang Kami</span>
                <h2 class="text-4xl font-bold text-gray-800 mt-2 mb-4">Mengapa Memilih Dapur Malika?</h2>
                <div class="w-24 h-1 bg-amber-400 mx-auto my-4"></div>
                <p class="max-w-2xl mx-auto text-gray-600 text-lg">Dapur Malika telah melayani ribuan pelanggan dengan hidangan autentik Indonesia sejak 2015. Kami berkomitmen untuk memberikan pengalaman kuliner terbaik.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="bg-white p-8 rounded-3xl shadow-md hover:shadow-xl transition duration-300 hover:scale-105 text-center border border-gray-100">
                    <div class="inline-flex items-center justify-center w-20 h-20 mb-6 bg-amber-100 rounded-full">
                        <i class="fas fa-utensils text-amber-500 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-gray-800">Kualitas Premium</h3>
                    <p class="text-gray-600">Kami hanya menggunakan bahan-bahan berkualitas tinggi dan segar untuk setiap hidangan yang kami sajikan.</p>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-md hover:shadow-xl transition duration-300 hover:scale-105 text-center border border-gray-100">
                    <div class="inline-flex items-center justify-center w-20 h-20 mb-6 bg-amber-100 rounded-full">
                        <i class="fas fa-headset text-amber-500 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-gray-800">Layanan Responsif</h3>
                    <p class="text-gray-600">Tim kami siap membantu Anda 24/7 dengan layanan pelanggan yang ramah dan profesional.</p>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-md hover:shadow-xl transition duration-300 hover:scale-105 text-center border border-gray-100">
                    <div class="inline-flex items-center justify-center w-20 h-20 mb-6 bg-amber-100 rounded-full">
                        <i class="fas fa-truck text-amber-500 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-gray-800">Pengiriman Tepat Waktu</h3>
                    <p class="text-gray-600">Kami menjamin pengiriman pesanan Anda tepat waktu untuk berbagai acara penting Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Menu with Tabs -->
    <section id="menu" class="py-24 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-amber-500 font-medium uppercase tracking-wider">Menu Spesial</span>
                <h2 class="text-4xl font-bold text-gray-800 mt-2 mb-4">Menu Favorit Kami</h2>
                <div class="w-24 h-1 bg-amber-400 mx-auto my-4"></div>
                <p class="max-w-2xl mx-auto text-gray-600 text-lg">Hidangan pilihan chef yang paling diminati pelanggan kami</p>
            </div>

            <!-- Kategori Menu Tabs -->
            <div class="mb-10 flex justify-center">
                <div class="flex flex-wrap justify-center gap-2 md:gap-4 border-b-0">
                    @foreach($kategoris as $index => $kategori)
                    @if($kategori->menus && $kategori->menus->isNotEmpty())
                    <button id="tab-{{ $kategori->id }}"
                        class="kategori-tab {{ $index === 0 ? 'active bg-amber-500 text-white' : 'bg-gray-100 text-gray-700' }} 
                               px-6 py-3 rounded-full text-sm font-medium transition-all duration-300 hover:bg-amber-500 hover:text-white"
                        onclick="showKategori('{{ $kategori->id }}')">
                        {{ $kategori->nama }}
                    </button>
                    @endif
                    @endforeach
                </div>
            </div>

            <!-- Menu Content -->
            @foreach($kategoris as $index => $kategori)
            @if($kategori->menus->isNotEmpty())
            <div id="kategori-{{ $kategori->id }}" class="kategori-content {{ $index !== 0 ? 'hidden' : '' }}">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($kategori->menus->take(6) as $menu)
                    <div class="menu-item group bg-white rounded-3xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 border border-gray-100">
                        <!-- Gambar dengan overlay hover -->
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ Storage::url($menu->foto) }}" alt="{{ $menu->nama }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <span class="absolute top-4 left-4 bg-amber-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">
                                {{ $kategori->nama }}
                            </span>
                        </div>

                        <!-- Konten -->
                        <div class="px-6 py-5">
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="text-xl font-bold text-gray-800 group-hover:text-amber-500 transition">{{ $menu->nama }}</h3>
                                <span class="text-amber-600 font-bold text-lg">Rp{{ number_format($menu->price, 0, ',', '.') }}</span>
                            </div>
                            <p class="text-gray-600 mb-5 line-clamp-2">{{ $menu->deskripsi }}</p>

                            <a href="{{ route('menu') }}"
                                class="w-full bg-amber-500 hover:bg-amber-600 text-white py-3 px-4 rounded-xl font-medium transition-all flex items-center justify-center gap-2 shadow-md group-hover:shadow-amber-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                @if($kategori->menus->count() > 6)
                <div class="text-center mt-10">
                    <a href="{{ route('menu', ['kategori' => $kategori->id]) }}" class="inline-flex items-center bg-white border border-amber-500 text-amber-500 hover:bg-amber-500 hover:text-white font-medium px-6 py-3 rounded-full transition duration-300">
                        Lihat Semua {{ $kategori->nama }}
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
                @endif
            </div>
            @endif
            @endforeach

            <div class="text-center mt-16">
                <a href="{{ route('menu') }}" class="inline-flex items-center text-white bg-amber-600 hover:bg-amber-700 font-medium px-8 py-4 rounded-full shadow-md hover:shadow-lg transition duration-300">
                    Lihat Semua Menu Kami
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- JavaScript for Tab Functionality -->
    <script>
        function showKategori(kategoriId) {
            // Hide all kategori content
            document.querySelectorAll('.kategori-content').forEach(content => {
                content.classList.add('hidden');
            });

            // Show selected kategori content
            document.getElementById('kategori-' + kategoriId).classList.remove('hidden');

            // Update tab styling
            document.querySelectorAll('.kategori-tab').forEach(tab => {
                tab.classList.remove('active', 'bg-amber-500', 'text-white');
                tab.classList.add('bg-gray-100', 'text-gray-700');
            });

            document.getElementById('tab-' + kategoriId).classList.add('active', 'bg-amber-500', 'text-white');
            document.getElementById('tab-' + kategoriId).classList.remove('bg-gray-100', 'text-gray-700');
        }
    </script>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-primary-dark via-primary to-primary-light text-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">Siap untuk Memesan?</h2>
            <p class="text-lg mb-8">Hubungi kami sekarang untuk mendapatkan penawaran terbaik untuk acara spesial Anda</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#" class="bg-white text-primary hover:bg-gray-100 px-8 py-3 rounded-full font-medium transition">
                    <i class="fab fa-whatsapp mr-2"></i> WhatsApp
                </a>
                <a href="{{ route('menu') }}" class="bg-transparent border-2 border-white hover:bg-white hover:text-primary text-white px-8 py-3 rounded-full font-medium transition">
                    Katalog Menu
                </a>
            </div>
        </div>
    </section>

    @include('partials.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" defer></script>
</body>

</html>