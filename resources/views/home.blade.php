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
                            50: '#fef7ed',
                            100: '#fdefd8',
                            200: '#fbd6a5',
                            300: '#f8b968',
                            400: '#f59e0b',
                            500: '#d97706',
                            600: '#b45309',
                            700: '#92400e',
                            800: '#78350f',
                            900: '#451a03',
                        },
                        gold: {
                            400: '#fbbf24',
                            500: '#f59e0b',
                            600: '#d97706',
                        }
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                        display: ['Poppins', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 1s ease-in-out',
                        'fade-in-delayed': 'fadeIn 1.5s ease-in-out',
                        'slide-up': 'slideUp 0.8s ease-in-out',
                        'float': 'float 3s ease-in-out infinite',
                        'shimmer': 'shimmer 2s linear infinite',
                    },
                    backgroundImage: {
                        'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
                        'glass': 'linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0))',
                    },
                    backdropBlur: {
                        xs: '2px',
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
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        .carousel {
            scroll-behavior: smooth;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideUp {
            from { transform: translateY(40px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes shimmer {
            0% { background-position: -200px 0; }
            100% { background-position: calc(200px + 100%) 0; }
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .gradient-text {
            background: linear-gradient(135deg, #f59e0b, #d97706, #b45309);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .shadow-glow {
            box-shadow: 0 0 40px rgba(245, 158, 11, 0.15);
        }

        .shadow-glow-hover:hover {
            box-shadow: 0 20px 40px rgba(245, 158, 11, 0.2);
        }

        .text-shadow {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero-pattern {
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(245, 158, 11, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(217, 119, 6, 0.1) 0%, transparent 50%);
        }

        .card-hover {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
        }

        .shimmer-effect {
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            background-size: 200px 100%;
            animation: shimmer 2s infinite;
        }
        
        /* Gallery item styles from gallery page */
        .gallery-item {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            height: 100%;
            background: white;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .gallery-item img {
            transition: transform 0.5s ease;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 100%);
            color: white;
            padding: 1.5rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .category-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background-color: rgba(251, 146, 60, 0.9);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 10;
        }
        
        /* Grid layout */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        @media (max-width: 640px) {
            .gallery-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Carousel Styles */
.carousel-container {
    width: 100%;
    overflow: hidden;
    position: relative;
}

.carousel-track {
    display: flex;
    transition: transform 0.5s ease;
}

.carousel-slide {
    flex: 0 0 auto;
    padding: 0 15px;
    box-sizing: border-box;
}

@media (min-width: 768px) {
    .carousel-slide {
        flex: 0 0 50%;
    }
}

@media (min-width: 1024px) {
    .carousel-slide {
        flex: 0 0 33.33%;
    }
}
    </style>
</head>

<body class="font-sans bg-gray-50 text-gray-800 overflow-x-hidden">

    @include('partials.navbar')

    <!-- Hero Section with Enhanced Design -->
    <header class="relative w-full h-screen bg-cover bg-center hero-pattern" style="background-image: url('{{ asset('images/home.png') }}');">
        <div class="absolute inset-0 bg-gradient-to-br from-black/80 via-black/60 to-black/80"></div>
        
        <!-- Floating Elements -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-gold-400/20 rounded-full blur-xl animate-float"></div>
        <div class="absolute bottom-40 right-16 w-32 h-32 bg-gold-500/10 rounded-full blur-2xl animate-float" style="animation-delay: 1s;"></div>
        
        <div class="relative z-20 h-full flex flex-col items-center justify-center text-center text-white px-6 max-w-6xl mx-auto">
            <span class="text-gold-400 text-lg font-semibold mb-4 tracking-[0.2em] uppercase animate-fade-in border border-gold-400/30 px-6 py-2 rounded-full glass-effect">
                Selamat Datang di
            </span>
            <h1 class="text-6xl md:text-8xl font-display font-bold animate-fade-in leading-tight text-shadow mb-6">
                Dapur <span class="gradient-text">Malika</span>
            </h1>
            <p class="mt-6 text-xl md:text-2xl animate-fade-in-delayed max-w-4xl opacity-90 leading-relaxed font-light">
                Dapur Malika menyajikan hidangan Indonesia autentik dengan bahan-bahan premium untuk setiap acara spesial Anda
            </p>
            <div class="mt-12 flex flex-col sm:flex-row justify-center gap-6 animate-slide-up">
                <a href="https://wa.me/6281359161718" target="_blank" 
                   class="group bg-gradient-to-r from-gold-400 to-gold-600 hover:from-gold-500 hover:to-gold-700 text-white px-10 py-5 rounded-full font-semibold transition-all duration-300 shadow-glow shadow-glow-hover transform hover:scale-105">
                    <span class="flex items-center gap-3">
                        <i class="fab fa-whatsapp text-xl"></i>
                        Pesan Sekarang
                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </span>
                </a>
                <a href="#menu" 
                   class="glass-effect border-2 border-white/30 hover:bg-white/10 text-white px-10 py-5 rounded-full font-semibold transition-all duration-300 backdrop-blur-sm hover:scale-105">
                    <span class="flex items-center gap-3">
                        <i class="fas fa-utensils"></i>
                        Lihat Menu
                    </span>
                </a>
            </div>
        </div>
        
        <!-- Enhanced Scroll Down Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20">
            <a href="#about" class="flex flex-col items-center text-white/70 hover:text-white transition-all duration-300 group">
                <span class="text-sm font-medium mb-2 opacity-0 group-hover:opacity-100 transition-opacity">Scroll</span>
                <div class="w-8 h-12 border-2 border-white/50 rounded-full flex justify-center p-1">
                    <div class="w-1 h-3 bg-white/70 rounded-full animate-bounce"></div>
                </div>
            </a>
        </div>
    </header>

    <!-- About Section with Enhanced Statistics -->
    <section id="about" class="py-32 bg-gradient-to-br from-gray-50 via-white to-primary-50/30 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-10 left-10 w-72 h-72 bg-gold-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-primary-400 rounded-full blur-3xl"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="text-center mb-20">
                <span class="text-gold-500 font-bold uppercase tracking-wider text-sm border border-gold-200 px-4 py-2 rounded-full bg-gold-50">
                    Tentang Kami
                </span>
                <h2 class="text-5xl md:text-6xl font-display font-bold text-gray-900 mt-6 mb-6 leading-tight">
                    Mengapa Memilih <span class="gradient-text">Dapur Malika?</span>
                </h2>
                <div class="w-32 h-1 bg-gradient-to-r from-gold-400 to-gold-600 mx-auto my-8 rounded-full"></div>
                <p class="max-w-4xl mx-auto text-gray-600 text-xl leading-relaxed font-light">
                    Dapur Malika telah melayani ribuan pelanggan dengan hidangan autentik Indonesia sejak 2015. 
                    Kami berkomitmen untuk memberikan pengalaman kuliner terbaik dengan standar kualitas internasional.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">
                <div class="group relative bg-white p-10 rounded-3xl shadow-lg hover:shadow-2xl card-hover text-center border-2 border-gray-100/50 hover:border-gold-200">
                    <div class="absolute inset-0 bg-gradient-to-br from-gold-50/50 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="inline-flex items-center justify-center w-24 h-24 mb-8 bg-gradient-to-br from-gold-100 to-gold-200 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-utensils text-gold-600 text-4xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-6 text-gray-900 group-hover:text-gold-600 transition-colors">
                            Kualitas Premium
                        </h3>
                        <p class="text-gray-600 leading-relaxed text-lg">
                            Kami hanya menggunakan bahan-bahan berkualitas tinggi dan segar untuk setiap hidangan yang kami sajikan dengan standar chef profesional.
                        </p>
                    </div>
                </div>

                <div class="group relative bg-white p-10 rounded-3xl shadow-lg hover:shadow-2xl card-hover text-center border-2 border-gray-100/50 hover:border-gold-200">
                    <div class="absolute inset-0 bg-gradient-to-br from-gold-50/50 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="inline-flex items-center justify-center w-24 h-24 mb-8 bg-gradient-to-br from-gold-100 to-gold-200 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-headset text-gold-600 text-4xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-6 text-gray-900 group-hover:text-gold-600 transition-colors">
                            Layanan Responsif
                        </h3>
                        <p class="text-gray-600 leading-relaxed text-lg">
                            Tim customer service kami siap membantu Anda 24/7 dengan layanan yang ramah, profesional, dan solusi terbaik.
                        </p>
                    </div>
                </div>

                <div class="group relative bg-white p-10 rounded-3xl shadow-lg hover:shadow-2xl card-hover text-center border-2 border-gray-100/50 hover:border-gold-200">
                    <div class="absolute inset-0 bg-gradient-to-br from-gold-50/50 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="inline-flex items-center justify-center w-24 h-24 mb-8 bg-gradient-to-br from-gold-100 to-gold-200 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-truck text-gold-600 text-4xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-6 text-gray-900 group-hover:text-gold-600 transition-colors">
                            Pengiriman Tepat Waktu
                        </h3>
                        <p class="text-gray-600 leading-relaxed text-lg">
                            Kami menjamin pengiriman pesanan Anda tepat waktu dengan sistem logistik yang efisien untuk berbagai acara penting.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Menu with Enhanced Tabs -->
    <section id="menu" class="py-32 bg-white relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full opacity-5">
            <div class="absolute top-20 right-20 w-64 h-64 bg-gold-300 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-20 w-80 h-80 bg-primary-300 rounded-full blur-3xl"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="text-center mb-20">
                <span class="text-gold-500 font-bold uppercase tracking-wider text-sm border border-gold-200 px-4 py-2 rounded-full bg-gold-50">
                    Menu Spesial
                </span>
                <h2 class="text-5xl md:text-6xl font-display font-bold text-gray-900 mt-6 mb-6 leading-tight">
                    Menu <span class="gradient-text">Favorit</span> Kami
                </h2>
                <div class="w-32 h-1 bg-gradient-to-r from-gold-400 to-gold-600 mx-auto my-8 rounded-full"></div>
                <p class="max-w-4xl mx-auto text-gray-600 text-xl leading-relaxed font-light">
                    Hidangan pilihan chef yang paling diminati pelanggan kami, dibuat dengan resep autentik dan cita rasa yang tak terlupakan
                </p>
            </div>

            <!-- Enhanced Category Tabs -->
            <div class="mb-16 flex justify-center">
                <div class="flex flex-wrap justify-center gap-3 md:gap-4 bg-gray-100/80 p-2 rounded-2xl backdrop-blur-sm">
                    @foreach($kategoris as $index => $kategori)
                    @if($kategori->menus && $kategori->menus->isNotEmpty())
                    <button id="tab-{{ $kategori->id }}"
                        class="kategori-tab {{ $index === 0 ? 'active bg-gradient-to-r from-gold-400 to-gold-600 text-white shadow-lg' : 'bg-white/70 text-gray-700 hover:bg-white' }} 
                               px-8 py-4 rounded-xl text-sm font-bold transition-all duration-300 hover:scale-105 hover:shadow-md border border-transparent hover:border-gold-200"
                        onclick="showKategori('{{ $kategori->id }}')">
                        {{ $kategori->nama }}
                    </button>
                    @endif
                    @endforeach
                </div>
            </div>

            <!-- Enhanced Menu Content -->
            @foreach($kategoris as $index => $kategori)
            @if($kategori->menus->isNotEmpty())
            <div id="kategori-{{ $kategori->id }}" class="kategori-content {{ $index !== 0 ? 'hidden' : '' }}">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach($kategori->menus->take(6) as $menu)
                    <div class="menu-item group relative bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl card-hover border-2 border-gray-100/50 hover:border-gold-200">
                        <!-- Enhanced Image with Better Overlay -->
                        <div class="relative h-72 overflow-hidden">
                            <img src="{{ Storage::url($menu->foto) }}" alt="{{ $menu->nama }}"
                                class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-300"></div>
                            <span class="absolute top-6 left-6 bg-gradient-to-r from-gold-400 to-gold-600 text-white text-sm font-bold px-4 py-2 rounded-full shadow-lg backdrop-blur-sm">
                                {{ $kategori->nama }}
                            </span>
                            <!-- Price Badge -->
                            <div class="absolute bottom-6 right-6 bg-white/95 backdrop-blur-sm text-gold-600 font-black text-lg px-4 py-2 rounded-xl shadow-lg">
                                Rp{{ number_format($menu->price, 0, ',', '.') }}
                            </div>
                        </div>

                        <!-- Enhanced Content -->
                        <div class="px-8 py-6">
                            <h3 class="text-2xl font-bold text-gray-900 group-hover:text-gold-600 transition-colors mb-4 leading-tight">
                                {{ $menu->nama }}
                            </h3>
                            <p class="text-gray-600 mb-8 line-clamp-3 leading-relaxed">{{ $menu->deskripsi }}</p>

                            <a href="{{ route('menu') }}"
                                class="w-full bg-gradient-to-r from-gold-400 to-gold-600 hover:from-gold-500 hover:to-gold-700 text-white py-4 px-6 rounded-2xl font-bold transition-all duration-300 flex items-center justify-center gap-3 shadow-lg hover:shadow-xl group-hover:scale-105 transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Pesan Sekarang
                                <i class="fas fa-arrow-right text-sm"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                @if($kategori->menus->count() > 6)
                <div class="text-center mt-16">
                    <a href="{{ route('menu', ['kategori' => $kategori->id]) }}" 
                       class="inline-flex items-center bg-white border-2 border-gold-400 text-gold-600 hover:bg-gold-400 hover:text-white font-bold px-8 py-4 rounded-2xl transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl">
                        Lihat Semua {{ $kategori->nama }}
                        <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
                @endif
            </div>
            @endif
            @endforeach

            <div class="text-center mt-20">
                <a href="{{ route('menu') }}" 
                   class="inline-flex items-center text-white bg-gradient-to-r from-gold-500 to-gold-700 hover:from-gold-600 hover:to-gold-800 font-bold px-12 py-5 rounded-2xl shadow-2xl hover:shadow-gold-500/25 transition-all duration-300 hover:scale-105 transform">
                    <i class="fas fa-utensils mr-3"></i>
                    Lihat Semua Menu Kami
                    <svg class="w-6 h-6 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Enhanced Gallery Carousel Section -->
<section class="py-32 bg-gradient-to-br from-primary-50/50 via-gold-50/30 to-gray-50 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-96 h-96 bg-gold-400 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-primary-400 rounded-full blur-3xl"></div>
    </div>
    
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12">
            <span class="text-gold-500 font-bold uppercase tracking-wider text-sm border border-gold-200 px-4 py-2 rounded-full bg-white/80 backdrop-blur-sm">
                Galeri Kami
            </span>
            <h2 class="text-5xl md:text-6xl font-display font-bold text-gray-900 mt-6 mb-6 leading-tight">
                Kisah <span class="gradient-text">Dapur Malika</span>
            </h2>
            <div class="w-32 h-1 bg-gradient-to-r from-gold-400 to-gold-600 mx-auto my-8 rounded-full"></div>
            <p class="max-w-4xl mx-auto text-gray-600 text-xl leading-relaxed font-light">
                Potret kehangatan dan kelezatan dalam setiap sajian kami, diabadikan dalam momen-momen istimewa bersama pelanggan
            </p>
        </div>

        <!-- Gallery Carousel -->
        <div class="relative">
            <div class="carousel-container overflow-hidden">
                <div class="carousel-track flex transition-transform duration-500 ease-in-out" id="carousel-track">
                    @php
                        $groupedGaleri = $galeri->chunk(3); // Membagi galeri menjadi kelompok 3 item
                    @endphp
                    
                    @foreach($groupedGaleri as $group)
                    <div class="carousel-slide min-w-full px-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($group as $item)
                            <div class="gallery-item h-full">
                                <div class="relative h-64 w-full overflow-hidden rounded-xl">
                                    <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->nama }}"
                                        class="w-full h-full object-cover">
                                    
                                    @if($item->kategori)
                                    <div class="category-badge">
                                        {{ $item->kategori->nama }}
                                    </div>
                                    @endif
                                </div>
                                <div class="gallery-overlay">
                                    <h3 class="text-xl font-bold mb-1">{{ $item->nama }}</h3>
                                    <p class="text-sm opacity-90">{{ $item->created_at->format('d M Y') }}</p>
                                    <div class="flex items-center mt-2">
                                        <i class="fas fa-heart mr-1 text-amber-300"></i>
                                        <span class="text-xs">{{ rand(10, 100) }} Likes</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Carousel Controls -->
            <button class="carousel-prev absolute left-0 top-1/2 transform -translate-y-1/2 bg-white/80 p-3 rounded-full shadow-lg z-10 hover:bg-white transition-all ml-4">
                <i class="fas fa-chevron-left text-gold-600"></i>
            </button>
            <button class="carousel-next absolute right-0 top-1/2 transform -translate-y-1/2 bg-white/80 p-3 rounded-full shadow-lg z-10 hover:bg-white transition-all mr-4">
                <i class="fas fa-chevron-right text-gold-600"></i>
            </button>
        </div>

        <div class="text-center mt-16">
            <a href="{{ route('galeri') }}" 
               class="inline-flex items-center px-10 py-5 border-2 border-gold-400 text-lg font-bold rounded-2xl shadow-xl text-gold-600 bg-white/80 backdrop-blur-sm hover:bg-gold-400 hover:text-white transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                <i class="fas fa-images mr-3"></i>
                Jelajahi Lebih Banyak
                <svg class="ml-3 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('carousel-track');
    const slides = document.querySelectorAll('.carousel-slide');
    const prevBtn = document.querySelector('.carousel-prev');
    const nextBtn = document.querySelector('.carousel-next');
    
    let currentIndex = 0;
    const slideCount = slides.length;
    
    function updateCarousel() {
        const slideWidth = slides[0].offsetWidth;
        track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
    }
    
    nextBtn.addEventListener('click', function() {
        if (currentIndex < slideCount - 1) {
            currentIndex++;
            updateCarousel();
        }
    });
    
    prevBtn.addEventListener('click', function() {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });
    
    // Auto-advance carousel every 5 seconds
    setInterval(function() {
        if (currentIndex < slideCount - 1) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }
        updateCarousel();
    }, 5000);
    
    // Make carousel responsive
    window.addEventListener('resize', function() {
        updateCarousel();
    });
});
        function showKategori(kategoriId) {
            // Hide all kategori content with fade effect
            document.querySelectorAll('.kategori-content').forEach(content => {
                content.style.opacity = '0';
                setTimeout(() => {
                    content.classList.add('hidden');
                }, 150);
            });

            // Show selected kategori content with fade effect
            setTimeout(() => {
                const selectedContent = document.getElementById('kategori-' + kategoriId);
                selectedContent.classList.remove('hidden');
                selectedContent.style.opacity = '0';
                setTimeout(() => {
                    selectedContent.style.opacity = '1';
                }, 50);
            }, 150);

            // Update enhanced tab styling
            document.querySelectorAll('.kategori-tab').forEach(tab => {
                tab.classList.remove('active', 'bg-gradient-to-r', 'from-gold-400', 'to-gold-600', 'text-white', 'shadow-lg');
                tab.classList.add('bg-white/70', 'text-gray-700', 'hover:bg-white');
            });

            const activeTab = document.getElementById('tab-' + kategoriId);
            activeTab.classList.add('active', 'bg-gradient-to-r', 'from-gold-400', 'to-gold-600', 'text-white', 'shadow-lg');
            activeTab.classList.remove('bg-white/70', 'text-gray-700', 'hover:bg-white');
        }

        // Add smooth transitions to kategori content
        document.querySelectorAll('.kategori-content').forEach(content => {
            content.style.transition = 'opacity 0.3s ease-in-out';
        });
        
        // Add hover effect to gallery items
        document.querySelectorAll('.gallery-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.querySelector('img').style.transform = 'scale(1.05)';
                if(this.querySelector('.gallery-overlay')) {
                    this.querySelector('.gallery-overlay').style.opacity = '1';
                }
            });
            
            item.addEventListener('mouseleave', function() {
                this.querySelector('img').style.transform = 'scale(1)';
                if(this.querySelector('.gallery-overlay')) {
                    this.querySelector('.gallery-overlay').style.opacity = '0';
                }
            });
        });
    </script>

    <!-- Enhanced CTA Section -->
    <section class="py-24 bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-gold-900/20 via-transparent to-gold-800/10"></div>
            <div class="absolute top-20 right-20 w-96 h-96 bg-gold-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-20 w-80 h-80 bg-gold-400/5 rounded-full blur-3xl"></div>
        </div>
        
        <div class="max-w-6xl mx-auto px-4 text-center relative z-10">
            <div class="mb-8">
                <span class="text-gold-400 font-semibold uppercase tracking-wider text-sm border border-gold-400/30 px-4 py-2 rounded-full glass-effect">
                    Hubungi Kami
                </span>
            </div>
            <h2 class="text-4xl md:text-5xl font-display font-bold mb-8 leading-tight">
                Siap untuk <span class="gradient-text">Memesan?</span>
            </h2>
            <p class="text-xl md:text-2xl mb-12 opacity-90 max-w-4xl mx-auto leading-relaxed font-light">
                Hubungi kami sekarang untuk mendapatkan penawaran terbaik dan konsultasi gratis untuk acara spesial Anda
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-6">
                <a href="https://wa.me/6281359161718" target="_blank" 
                   class="group bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-10 py-5 rounded-2xl font-bold transition-all duration-300 shadow-2xl hover:shadow-green-500/25 hover:scale-105 transform">
                    <span class="flex items-center justify-center gap-3">
                        <i class="fab fa-whatsapp text-2xl"></i>
                        WhatsApp
                        <i class="fas fa-external-link-alt group-hover:translate-x-1 transition-transform"></i>
                    </span>
                </a>
                <a href="{{ route('menu') }}" 
                   class="glass-effect border-2 border-white/30 hover:bg-white/10 text-white px-10 py-5 rounded-2xl font-bold transition-all duration-300 backdrop-blur-sm hover:scale-105 hover:shadow-xl">
                    <span class="flex items-center justify-center gap-3">
                        <i class="fas fa-book-open"></i>
                        Katalog Menu
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </a>
            </div>
            
            <!-- Additional Contact Info -->
            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <div class="text-center glass-effect p-6 rounded-xl border border-white/10">
                    <i class="fas fa-clock text-gold-400 text-2xl mb-3"></i>
                    <h4 class="font-bold mb-2">Jam Operasional</h4>
                    <p class="text-sm opacity-80">Senin-Jumat: 08.00 - 20.00 WIB</p>
                </div>
                <div class="text-center glass-effect p-6 rounded-xl border border-white/10">
                    <i class="fas fa-phone text-gold-400 text-2xl mb-3"></i>
                    <h4 class="font-bold mb-2">Telepon</h4>
                    <p class="text-sm opacity-80">+62 813-3628-0522<br>Respons Cepat</p>
                </div>
                <div class="text-center glass-effect p-6 rounded-xl border border-white/10">
                    <i class="fas fa-award text-gold-400 text-2xl mb-3"></i>
                    <h4 class="font-bold mb-2">Pengalaman</h4>
                    <p class="text-sm opacity-80">3+ Tahun Melayani<br>100+ Pelanggan Puas</p>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" defer></script>
</body>

</html>