<!-- resources/views/galeri.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - Dapur Malika</title>
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
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

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

        /* Gallery specific styles */
        .galeri-item {
            transition: all 0.3s ease;
        }
        .galeri-item:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
        }
        [x-cloak] {
            display: none !important;
        }
        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
        }
        .pagination li {
            margin: 0 4px;
        }
        .pagination li a,
        .pagination li span {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 4px;
            border: 1px solid #e5e7eb;
            color: #4b5563;
            transition: all 0.3s;
        }
        .pagination li a:hover {
            background-color: #f3f4f6;
        }
        .pagination li.active span {
            background-color: #d97706;
            color: white;
            border-color: #d97706;
        }
        .pagination li.disabled span {
            opacity: 0.5;
            pointer-events: none;
        }
    </style>
</head>

<body class="font-sans bg-gray-50 text-gray-800">
    @include('partials.navbar')

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed z-40 hidden bg-white/95 backdrop-blur-md w-full top-16 left-0 shadow-md p-5 md:hidden transition-all duration-300 ease-in-out">
        <div class="flex flex-col space-y-2">
            <a href="{{ route('home') }}" class="py-3 px-4 hover:bg-gray-50 rounded-lg font-medium text-gray-700 hover:text-primary transition-all duration-300 flex items-center">
                <span class="relative">
                    Beranda
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary group-hover:w-full transition-all duration-300"></span>
                </span>
            </a>
            <a href="{{ route('menu') }}" class="py-3 px-4 hover:bg-gray-50 rounded-lg font-medium text-gray-700 hover:text-primary transition-all duration-300 flex items-center">
                <span class="relative">
                    Menu Catering
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary group-hover:w-full transition-all duration-300"></span>
                </span>
            </a>
            <a href="{{ route('galeri') }}" class="py-3 px-4 hover:bg-gray-50 rounded-lg font-medium text-gray-700 hover:text-primary transition-all duration-300 flex items-center">
                <span class="relative">
                    Galeri
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary group-hover:w-full transition-all duration-300"></span>
                </span>
            </a>
            <a href="{{ route('tentang') }}" class="py-3 px-4 hover:bg-gray-50 rounded-lg font-medium text-gray-700 hover:text-primary transition-all duration-300 flex items-center">
                <span class="relative">
                    Tentang Kami
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary group-hover:w-full transition-all duration-300"></span>
                </span>
            </a>
            <a href="{{ route('kontak') }}" class="py-3 px-4 hover:bg-gray-50 rounded-lg font-medium text-gray-700 hover:text-primary transition-all duration-300 flex items-center">
                <span class="relative">
                    Kontak
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary group-hover:w-full transition-all duration-300"></span>
                </span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="menu-container w-full min-h-screen bg-gradient-to-b from-white to-gray-100 py-12 px-4 sm:px-6 lg:px-8 pt-24">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 relative">
            <div class="absolute top-0 left-1/4 -translate-x-1/2 -translate-y-1/2 opacity-10">
                <i class="fas fa-utensils text-6xl text-amber-500"></i>
            </div>
            <div class="absolute top-1/4 right-1/4 translate-x-1/2 -translate-y-1/2 opacity-10">
                <i class="fas fa-mortar-pestle text-6xl text-amber-500"></i>
            </div>

            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight relative inline-block">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-amber-600 to-amber-500">
                    Explore Our Menu
                </span>
                <div class="absolute -bottom-2 left-0 w-full h-1 bg-gradient-to-r from-amber-600 to-amber-300 rounded-full"></div>
            </h1>

            <p class="text-lg text-gray-600 mt-6 max-w-2xl mx-auto leading-relaxed">
                Indulge in rich flavors and hand-crafted dishes from the heart of Indonesia
            </p>

            <div class="flex justify-center mt-4">
                <div class="h-0.5 w-16 bg-amber-300 rounded-full"></div>
            </div>
        </div>


            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 animate__animated animate__fadeInUp">
                @foreach ($galeri as $item)
                <div x-data="{ showModal: false }" class="galeri-item bg-white/80 backdrop-blur-md rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                    <!-- Image -->
                    <div class="relative h-64 overflow-hidden cursor-pointer" @click="showModal = true">
                        <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover transform hover:scale-110 transition duration-500">
                    </div>

                    <!-- Caption -->
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-900 text-center">{{ $item->judul }}</h3>
                    </div>

                    <!-- Modal for larger image view -->
                    <div x-show="showModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/80" 
                         @click.self="showModal = false"
                         x-transition:enter="ease-out duration-300"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="ease-in duration-200"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0">

                        <div class="relative bg-white p-1 rounded-lg max-w-4xl max-h-screen overflow-hidden"
                             x-transition:enter="ease-out duration-300"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100">

                            <!-- Close button -->
                            <button @click="showModal = false" class="absolute top-2 right-2 bg-gray-800 text-white rounded-full p-1 z-10 hover:bg-gray-900 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                            <!-- Lightbox image -->
                            <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->judul }}" class="max-h-[80vh] max-w-full mx-auto object-contain">
                            
                            <!-- Caption in modal -->
                            <div class="p-3 bg-white">
                                <h3 class="text-xl font-bold text-gray-900 text-center">{{ $item->judul }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="mt-12 flex justify-center">
                {{ $galeri->links() }}
            </div>
        </div>
    </div>

    @include('partials.footer')

    <script src="https://unpkg.com/alpinejs@3.13.0/dist/cdn.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" defer></script>
</body>
</html>