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
        
        // Carousel functionality
        let currentSlide = 0;
        const slides = document.querySelectorAll('#carousel > div');
        
        function moveCarousel(index) {
            currentSlide = index;
            updateCarousel();
        }
        
        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            updateCarousel();
        }
        
        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            updateCarousel();
        }
        
        function updateCarousel() {
            const carousel = document.getElementById('carousel');
            carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
            
            // Update dots
            document.querySelectorAll('.carousel-dot').forEach((dot, index) => {
                if(index === currentSlide) {
                    dot.classList.add('bg-primary');
                    dot.classList.remove('bg-gray-300');
                } else {
                    dot.classList.remove('bg-primary');
                    dot.classList.add('bg-gray-300');
                }
            });
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        .carousel {
            scroll-behavior: smooth;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
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

    <!-- Navbar -->
    <nav class="fixed z-50 w-full flex justify-between items-center px-6 py-4 bg-white bg-opacity-95 text-gray-800 shadow-md transition-all duration-300">
        <div class="flex items-center">
            <img src="/api/placeholder/50/50" alt="Logo" class="w-10 h-10 mr-3 rounded-full">
            <div class="text-2xl font-bold bg-gradient-to-r from-primary-dark via-primary to-primary-light bg-clip-text text-transparent">Dapur Malika</div>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex space-x-8">
            <a href="#" class="hover:text-primary transition font-medium">Beranda</a>
            <a href="{{ route('menu') }}" class="hover:text-primary transition font-medium">Menu Catering</a>
            <a href="{{ route('galeri') }}" class="hover:text-primary transition font-medium">Galeri</a>
            <a href="{{ route('tentang') }}" class="hover:text-primary transition font-medium">Tentang Kami</a>
            <a href="{{ route('kontak') }}" class   ="hover:text-primary transition font-medium">Kontak</a>
        </div>

        <div class="hidden md:flex items-center space-x-4">
            <button onclick="toggleSearch()" class="text-gray-700 hover:text-primary text-xl transition">
                <i class="fa-solid fa-search"></i>
            </button>
            <a href="#" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-full transition">
                Pesan Sekarang
            </a>
            
            @if($isAdmin ?? false)
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

        <!-- Mobile Menu Button -->
        <div class="md:hidden flex items-center">
            <button onclick="toggleSearch()" class="text-gray-700 px-2">
                <i class="fa-solid fa-search"></i>
            </button>
            <button onclick="toggleMenu()" class="text-gray-700 p-2">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed z-40 hidden bg-white w-full top-16 left-0 shadow-md p-4 md:hidden">
        <div class="flex flex-col space-y-3">
            <a href="#" class="py-2 px-4 hover:bg-gray-100 rounded-lg">Beranda</a>
            <a href="{{ route('menu') }}" class="py-2 px-4 hover:bg-gray-100 rounded-lg">Menu Catering</a>
            <a href="{{ route('galeri') }}" class="py-2 px-4 hover:bg-gray-100 rounded-lg">Galeri</a>
            <a href="#" class="py-2 px-4 hover:bg-gray-100 rounded-lg">Tentang Kami</a>
            <a href="#" class="py-2 px-4 hover:bg-gray-100 rounded-lg">Kontak</a>
            <a href="#" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg text-center">
                Pesan Sekarang
            </a>
            
            @if($isAdmin ?? false)
                <a href="{{ route('admin.profile') }}" class="py-2 px-4 hover:bg-gray-100 rounded-lg flex items-center">
                    <i class="fa-solid fa-user text-gray-700 mr-2"></i>
                    <span>{{ $admin->name ?? 'Admin' }}</span>
                </a>
                <form action="{{ route('admin.logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">Logout</button>
                </form>
            @endif
        </div>
    </div>

    <!-- Search Bar -->
    <div id="search-bar" class="hidden fixed top-16 left-0 w-full bg-white shadow-md p-4 flex justify-center z-40">
        <div class="w-full max-w-2xl relative">
            <input type="text" id="search-input" placeholder="Cari menu..." class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
            <button class="absolute right-3 top-2.5 text-gray-500 hover:text-primary">
                <i class="fa-solid fa-search text-lg"></i>
            </button>
        </div>
    </div>

    <!-- Hero Section -->
    <header class="relative w-full h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('https://source.unsplash.com/1600x900/?indonesian,food');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-20 text-center text-white px-4 max-w-4xl">
            <h1 class="text-4xl md:text-6xl font-bold animate-fade-in">Nikmati Kelezatan Masakan Indonesia</h1>
            <p class="mt-6 text-lg md:text-xl animate-fade-in-delayed">Dapur Malika menyajikan hidangan Indonesia autentik dengan bahan-bahan premium untuk setiap acara spesial Anda</p>
            <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4 animate-slide-up">
                <a href="#" class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-full font-medium transition">
                    Pesan Sekarang
                </a>
                <a href="#menu" class="bg-transparent border-2 border-white hover:bg-white hover:text-gray-900 text-white px-8 py-3 rounded-full font-medium transition">
                    Lihat Menu
                </a>
            </div>
        </div>
    </header>

    <!-- Promo Carousel Section -->
    <section class="py-16 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-2">Promo Terbaru</h2>
            <p class="text-center text-gray-600 mb-10">Nikmati penawaran spesial dari Dapur Malika</p>
            
            <!-- Carousel Container -->
            <div class="relative">
                <div class="overflow-hidden">
                    <div id="carousel" class="carousel flex transition-transform duration-300 ease-in-out">
                        <!-- Promo 1 -->
                        <div class="min-w-full px-2">
                            <div class="bg-gradient-to-r from-red-50 to-orange-50 rounded-2xl shadow-lg overflow-hidden">
                                <div class="flex flex-col md:flex-row">
                                    <div class="md:w-1/2">
                                        <img src="/api/placeholder/800/600" alt="Promo Paket Keluarga" class="w-full h-64 md:h-full object-cover">
                                    </div>
                                    <div class="md:w-1/2 p-8 flex flex-col justify-center">
                                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-medium inline-block mb-4">Promo Spesial</span>
                                        <h3 class="text-2xl font-bold mb-4">Paket Keluarga Bahagia</h3>
                                        <p class="text-gray-600 mb-6">Nikmati menu paket keluarga untuk 5 orang dengan harga spesial. Diskon 25% untuk pemesanan di hari Senin-Kamis.</p>
                                        <div class="flex items-center mb-6">
                                            <span class="text-3xl font-bold text-primary-dark">Rp499.000</span>
                                            <span class="ml-3 text-lg text-gray-500 line-through">Rp650.000</span>
                                        </div>
                                        <a href="#" class="bg-primary hover:bg-primary-dark text-white text-center px-6 py-3 rounded-lg transition w-full md:w-auto">Pesan Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Promo 2 -->
                        <div class="min-w-full px-2">
                            <div class="bg-gradient-to-r from-green-50 to-teal-50 rounded-2xl shadow-lg overflow-hidden">
                                <div class="flex flex-col md:flex-row">
                                    <div class="md:w-1/2">
                                        <img src="/api/placeholder/800/600" alt="Promo Nasi Kotak" class="w-full h-64 md:h-full object-cover">
                                    </div>
                                    <div class="md:w-1/2 p-8 flex flex-col justify-center">
                                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-medium inline-block mb-4">Promo Bulanan</span>
                                        <h3 class="text-2xl font-bold mb-4">Nasi Kotak Hemat</h3>
                                        <p class="text-gray-600 mb-6">Dapatkan diskon 15% untuk pemesanan nasi kotak minimal 50 box. Cocok untuk acara kantor dan gathering.</p>
                                        <div class="flex items-center mb-6">
                                            <span class="text-3xl font-bold text-primary-dark">Rp25.500</span>
                                            <span class="ml-3 text-lg text-gray-500 line-through">Rp30.000</span>
                                        </div>
                                        <a href="#" class="bg-primary hover:bg-primary-dark text-white text-center px-6 py-3 rounded-lg transition w-full md:w-auto">Pesan Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Promo 3 -->
                        <div class="min-w-full px-2">
                            <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl shadow-lg overflow-hidden">
                                <div class="flex flex-col md:flex-row">
                                    <div class="md:w-1/2">
                                        <img src="/api/placeholder/800/600" alt="Promo Prasmanan" class="w-full h-64 md:h-full object-cover">
                                    </div>
                                    <div class="md:w-1/2 p-8 flex flex-col justify-center">
                                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-medium inline-block mb-4">Promo Terbatas</span>
                                        <h3 class="text-2xl font-bold mb-4">Prasmanan Premium</h3>
                                        <p class="text-gray-600 mb-6">Pemesanan prasmanan untuk 100 orang dapatkan gratis 2 menu tambahan dan 1 stall dessert spesial.</p>
                                        <div class="flex items-center mb-6">
                                            <span class="text-3xl font-bold text-primary-dark">Rp65.000</span>
                                            <span class="ml-3 text-sm text-gray-500">per orang</span>
                                        </div>
                                        <a href="#" class="bg-primary hover:bg-primary-dark text-white text-center px-6 py-3 rounded-lg transition w-full md:w-auto">Pesan Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Carousel Navigation -->
                <div class="flex justify-center mt-8">
                    <button onclick="moveCarousel(0)" class="w-3 h-3 rounded-full bg-primary mx-1 carousel-dot"></button>
                    <button onclick="moveCarousel(1)" class="w-3 h-3 rounded-full bg-gray-300 mx-1 carousel-dot"></button>
                    <button onclick="moveCarousel(2)" class="w-3 h-3 rounded-full bg-gray-300 mx-1 carousel-dot"></button>
                </div>
                
                <!-- Carousel Controls -->
                <button onclick="prevSlide()" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 rounded-full p-2 shadow-md focus:outline-none">
                    <i class="fas fa-chevron-left text-xl text-primary"></i>
                </button>
                <button onclick="nextSlide()" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 rounded-full p-2 shadow-md focus:outline-none">
                    <i class="fas fa-chevron-right text-xl text-primary"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- About Section With Statistics -->
    <section id="about" class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Mengapa Memilih Dapur Malika?</h2>
                <p class="max-w-2xl mx-auto text-gray-600">Dapur Malika telah melayani ribuan pelanggan dengan hidangan autentik Indonesia sejak 2015. Kami berkomitmen untuk memberikan pengalaman kuliner terbaik.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition hover:scale-105 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 mb-6 bg-primary bg-opacity-20 rounded-full">
                        <i class="fas fa-utensils text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Kualitas Premium</h3>
                    <p class="text-gray-600">Kami hanya menggunakan bahan-bahan berkualitas tinggi dan segar untuk setiap hidangan yang kami sajikan.</p>
                </div>
                
                <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition hover:scale-105 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 mb-6 bg-primary bg-opacity-20 rounded-full">
                        <i class="fas fa-headset text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Layanan Responsif</h3>
                    <p class="text-gray-600">Tim kami siap membantu Anda 24/7 dengan layanan pelanggan yang ramah dan profesional.</p>
                </div>
                
                <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition hover:scale-105 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 mb-6 bg-primary bg-opacity-20 rounded-full">
                        <i class="fas fa-truck text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Pengiriman Tepat Waktu</h3>
                    <p class="text-gray-600">Kami menjamin pengiriman pesanan Anda tepat waktu untuk berbagai acara penting Anda.</p>
                </div>
            </div>
            
            <!-- Statistics -->
            <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="text-4xl font-bold text-primary">5,000+</div>
                    <p class="text-gray-600 mt-2">Pesanan Sukses</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-primary">100+</div>
                    <p class="text-gray-600 mt-2">Variasi Menu</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-primary">50+</div>
                    <p class="text-gray-600 mt-2">Acara Besar</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-primary">4.9</div>
                    <p class="text-gray-600 mt-2">Rating Kepuasan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Menu -->
    <section id="menu" class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Menu Favorit Kami</h2>
                <p class="max-w-2xl mx-auto text-gray-600">Hidangan pilihan chef yang paling diminati pelanggan kami</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Menu Item 1 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="relative">
                        <img src="/api/placeholder/600/400" alt="Nasi Tumpeng" class="w-full h-56 object-cover">
                        <div class="absolute top-4 right-4 bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">
                            Terlaris
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <h3 class="text-xl font-semibold mb-2">Nasi Tumpeng Komplit</h3>
                        <p class="text-gray-600 text-sm mb-4">Tumpeng dengan 7 macam lauk pauk tradisional</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-primary-dark">Rp850.000</span>
                            <a href="#" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg text-sm transition">Pesan</a>
                        </div>
                    </div>
                </div>
                
                <!-- Menu Item 2 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="relative">
                        <img src="/api/placeholder/600/400" alt="Nasi Kotak" class="w-full h-56 object-cover">
                    </div>
                    <div class="px-6 py-4">
                        <h3 class="text-xl font-semibold mb-2">Paket Nasi Kotak Premium</h3>
                        <p class="text-gray-600 text-sm mb-4">Nasi dengan ayam bakar, cah kangkung, dan lalapan</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-primary-dark">Rp35.000</span>
                            <a href="#" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg text-sm transition">Pesan</a>
                        </div>
                    </div>
                </div>
                
                <!-- Menu Item 3 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="relative">
                        <img src="/api/placeholder/600/400" alt="Prasmanan" class="w-full h-56 object-cover">
                        <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                            Baru
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <h3 class="text-xl font-semibold mb-2">Prasmanan Executive</h3>
                        <p class="text-gray-600 text-sm mb-4">10 pilihan menu utama dengan 3 dessert</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-primary-dark">Rp85.000</span>
                            <a href="#" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg text-sm transition">Pesan</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-10">
                <a href="{{ route('menu') }}" class="inline-flex items-center text-primary hover:text-primary-dark font-medium">
                    Lihat Semua Menu
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>
    
    <!-- Testimonial -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Kata Pelanggan Kami</h2>
                <p class="max-w-2xl mx-auto text-gray-600">Apa kata mereka yang telah menggunakan jasa catering Dapur Malika</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-primary">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">"Makanan dari Dapur Malika sangat lezat dan fresh. Pesanan datang tepat waktu dan presentasinya sangat cantik. Akan pesan lagi untuk acara berikutnya!"</p>
                    <div class="flex items-center">
                        <img src="/api/placeholder/50/50" alt="Customer" class="w-12 h-12 rounded-full object-cover">
                        <div class="ml-4">
                            <h4 class="font-semibold">Budi Santoso</h4>
                            <p class="text-gray-500 text-sm">Jakarta</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-primary">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">"Sangat puas dengan layanan Dapur Malika untuk acara pernikahan kami. Tim sangat profesional dan makanannya mendapat pujian dari semua tamu."</p>
                    <div class="flex items-center">
                        <img src="/api/placeholder/50/50" alt="Customer" class="w-12 h-12 rounded-full object-cover">
                        <div class="ml-4">
                            <h4 class="font-semibold">Sinta Dewi</h4>
                            <p class="text-gray-500 text-sm">Bandung</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-primary">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">"Saya rutin memesan catering untuk acara kantor dari Dapur Malika. Harga terjangkau dengan kualitas yang konsisten. Sangat direkomendasikan!"</p>
                    <div class="flex items-center">
                        <img src="/api/placeholder/50/50" alt="Customer" class="w-12 h-12 rounded-full object-cover">
                        <div class="ml-4">
                            <h4 class="font-semibold">Rudi Hartono</h4>
                            <p class="text-gray-500 text-sm">Surabaya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
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

    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center py-6">
        <p>&copy; 2025 Dapur Malika - All Rights Reserved</p>
        <p>Jl. Contoh No. 123, Kota Kuliner, Indonesia</p>
        <p>Email: support@dapurmalika.com | Telp: +62 812 3456 7890</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" defer></script>
</body>
</html>