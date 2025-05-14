<!-- resources/views/menu.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Dapur Malika</title>
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

        /* Additional styles for menu page */
        .menu-item {
            transition: all 0.3s ease;
        }
        .menu-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        [x-cloak] {
            display: none !important;
        }
        .category-section {
            animation: fadeIn 0.5s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body class="font-sans bg-gray-50 text-gray-800">
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
                    <a href="{{ route('menu') }}" class="px-4 py-2 font-medium text-gray-700 hover:text-primary transition-all duration-300">Menu Catering</a>
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

        <div class="ml-auto md:flex items-center space-x-4">
            <!-- Admin section removed -->
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden flex items-center">
            <button onclick="toggleMenu()" class="text-gray-700 p-2">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </nav>

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

    <script src="https://unpkg.com/alpinejs@3.13.0/dist/cdn.min.js" defer></script>

    <!-- Main Content -->
    <div class="menu-container w-full min-h-screen bg-gradient-to-b from-white to-gray-100 py-12 px-4 sm:px-6 lg:px-8 pt-24">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight">Explore Our Menu</h1>
            <p class="text-lg text-gray-600 mt-4 max-w-2xl mx-auto">Indulge in rich flavors and hand-crafted dishes from the heart of Indonesia</p>
        </div>

        <!-- Menu Grid with Alpine.js -->
        <div x-data="menuData()" class="container mx-auto">
            <!-- Category Tabs (for mobile) -->
            <div class="lg:hidden mb-8">
                <div class="flex overflow-x-auto pb-2 space-x-2">
                    @foreach ($kategoris as $kategori)
                        <button @click="activeCategory = '{{ $kategori->id }}'" 
                                :class="activeCategory === '{{ $kategori->id }}' ? 'bg-amber-500 text-white' : 'bg-white text-gray-700'"
                                class="px-4 py-2 rounded-full font-medium text-sm whitespace-nowrap shadow-sm transition-colors">
                            {{ $kategori->nama }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Desktop Category Layout -->
            <div class="hidden lg:grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($kategoris as $kategori)
                    <div class="category-section">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 pb-2 border-b border-amber-200">{{ $kategori->nama }}</h2>
                        <div class="grid grid-cols-1 gap-6">
                            @foreach ($kategori->menus as $menu)
                                <div class="menu-item bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300">
                                    <!-- Image -->
                                    <div class="relative h-48 overflow-hidden">
                                        <img src="{{ Storage::url($menu->foto) }}" alt="{{ $menu->nama }}" 
                                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                                        @if($menu->is_popular)
                                            <span class="absolute top-3 right-3 bg-amber-600 text-white text-xs font-bold px-2 py-1 rounded-full shadow">
                                                POPULAR
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Content -->
                                    <div class="p-5">
                                        <div class="flex justify-between items-start mb-2">
                                            <h3 class="text-lg font-bold text-gray-900">{{ $menu->nama }}</h3>
                                            <span class="text-amber-600 font-semibold">Rp{{ number_format($menu->price, 0, ',', '.') }}</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-4">{{ $menu->deskripsi }}</p>

                                        <button @click="openOrderModal(@js($menu))"
                                                class="w-full bg-amber-500 hover:bg-amber-600 text-white py-2 px-4 rounded-lg font-medium text-sm transition-all flex items-center justify-center gap-2 shadow">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            Order via WhatsApp
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Mobile Category Layout -->
            <div class="lg:hidden space-y-8">
                @foreach ($kategoris as $kategori)
                    <div x-show="activeCategory === '{{ $kategori->id }}'" class="category-section">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">{{ $kategori->nama }}</h2>
                        <div class="grid grid-cols-1 gap-4">
                            @foreach ($kategori->menus as $menu)
                                <div class="menu-item bg-white rounded-lg shadow overflow-hidden">
                                    <div class="flex">
                                        <div class="relative w-1/3">
                                            <img src="{{ Storage::url($menu->foto) }}" alt="{{ $menu->nama }}"
                                                class="w-full h-full object-cover">
                                            @if($menu->is_popular)
                                                <span class="absolute top-1 right-1 bg-amber-600 text-white text-xxs font-bold px-1 py-0.5 rounded">
                                                    POPULAR
                                                </span>
                                            @endif
                                        </div>
                                        <div class="w-2/3 p-3">
                                            <div class="flex justify-between items-start">
                                                <h3 class="text-md font-bold text-gray-900">{{ $menu->nama }}</h3>
                                                <span class="text-amber-600 font-semibold text-sm">Rp{{ number_format($menu->price, 0, ',', '.') }}</span>
                                            </div>
                                            <p class="text-xs text-gray-600 mb-2 line-clamp-2">{{ $menu->deskripsi }}</p>
                                            <button @click="openOrderModal(@js($menu))"
                                                    class="w-full bg-amber-500 hover:bg-amber-600 text-white py-1 px-2 rounded text-xs flex items-center justify-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                                Order
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Order Modal -->
            <div x-show="orderModalOpen" x-cloak class="fixed inset-0 z-50 overflow-y-auto">
                <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <!-- Background overlay -->
                    <div x-show="orderModalOpen" 
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                    <!-- Modal content -->
                    <div x-show="orderModalOpen"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                                Order <span x-text="currentMenu.nama"></span>
                            </h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Your Name</label>
                                    <input x-model="customerName" type="text" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                                    <div class="flex items-center">
                                        <button @click="quantity > 1 ? quantity-- : quantity"
                                                class="px-3 py-1 bg-gray-100 border border-gray-300 rounded-l-md">
                                            -
                                        </button>
                                        <input x-model="quantity" type="number" min="1" readonly
                                            class="w-16 px-3 py-1 text-center border-t border-b border-gray-300">
                                        <button @click="quantity++"
                                                class="px-3 py-1 bg-gray-100 border border-gray-300 rounded-r-md">
                                            +
                                        </button>
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Special Notes</label>
                                    <textarea x-model="specialNotes" rows="3"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500"></textarea>
                                </div>
                                
                                <div class="bg-gray-50 p-3 rounded-md">
                                    <div class="flex justify-between text-sm mb-1">
                                        <span class="text-gray-500">Price:</span>
                                        <span class="text-gray-900">Rp<span x-text="formatPrice(currentMenu.price)"></span></span>
                                    </div>
                                    <div class="flex justify-between text-sm mb-1">
                                        <span class="text-gray-500">Quantity:</span>
                                        <span class="text-gray-900" x-text="quantity"></span>
                                    </div>
                                    <div class="border-t border-gray-200 mt-2 pt-2 flex justify-between">
                                        <span class="font-medium text-gray-900">Total:</span>
                                        <span class="font-medium text-amber-600">Rp<span x-text="formatPrice(quantity * currentMenu.price)"></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <a :href="generateWhatsAppLink()" target="_blank"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-amber-600 text-base font-medium text-white hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 sm:ml-3 sm:w-auto sm:text-sm">
                                Order via WhatsApp
                            </a>
                            <button @click="orderModalOpen = false" type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-gray-900 text-white text-center py-6">
        <p>&copy; 2025 Dapur Malika - All Rights Reserved</p>
        <p>Jl. Contoh No. 123, Kota Kuliner, Indonesia</p>
        <p>Email: support@dapurmalika.com | Telp: +62 812 3456 7890</p>
    </footer>

    <script>
        function menuData() {
            return {
                activeCategory: '{{ $kategoris->first()->id }}',
                orderModalOpen: false,
                currentMenu: null,
                quantity: 1,
                customerName: '',
                specialNotes: '',
                
                openOrderModal(menu) {
                    this.currentMenu = menu;
                    this.quantity = 1;
                    this.customerName = '';
                    this.specialNotes = '';
                    this.orderModalOpen = true;
                },
                
                generateWhatsAppLink() {
                    const menu = this.currentMenu;
                    const total = this.quantity * menu.price;
                    
                    const message = `Halo Dapur Malika, saya ${this.customerName || 'Pelanggan'} ingin memesan:
                    
    📋 *Detail Pesanan:*
    • Menu: ${menu.nama}
    • Jumlah: ${this.quantity} porsi
    • Harga per porsi: Rp${this.formatPrice(menu.price)}
    • *Total: Rp${this.formatPrice(total)}*

    📝 *Catatan:*
    ${this.specialNotes || '-'}

    Terima kasih!`;
                    
                    return `https://wa.me/6285781192748?text=${encodeURIComponent(message)}`;
                },
                
                formatPrice(price) {
                    return new Intl.NumberFormat('id-ID').format(price);
                }
            }
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" defer></script>
</body>
</html>