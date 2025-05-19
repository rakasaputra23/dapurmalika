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
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="font-sans bg-gray-50 text-gray-800">
    @include('partials.navbar')

    <script src="https://unpkg.com/alpinejs@3.13.0/dist/cdn.min.js" defer></script>

    <!-- Main Content -->
    <div class="menu-container w-full min-h-screen bg-gradient-to-b from-white to-gray-100 py-12 px-4 sm:px-6 lg:px-8 pt-24">
        <!-- Header Section -->
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

        <!-- Menu Grid with Alpine.js -->
        <div x-data="menuData()" class="container mx-auto">
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

            <!-- Desktop Category Layout -->
            <div class="hidden lg:block">
                @foreach ($kategoris as $kategori)
                <div id="kategori-{{ $kategori->id }}" class="category-section kategori-content {{ $loop->first ? '' : 'hidden' }}">
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-amber-800 mb-2 flex items-center">
                            <span class="mr-2">{{ $kategori->nama }}</span>
                            <div class="h-px flex-grow bg-gradient-to-r from-amber-300 to-transparent ml-4"></div>
                        </h2>
                        <p class="text-gray-600 mb-6">{{ $kategori->deskripsi ?? 'Discover our delicious selection of ' . strtolower($kategori->nama) }}</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                        @foreach ($kategori->menus as $menu)
                        <div class="menu-item bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg">
                            <!-- Image -->
                            <div class="relative h-56 overflow-hidden">
                                <img src="{{ Storage::url($menu->foto) }}" alt="{{ $menu->nama }}"
                                    class="w-full h-full object-cover menu-image">
                                @if($menu->is_popular)
                                <div class="popular-badge flex items-center">
                                    <i class="fas fa-star mr-1"></i>
                                    <span>POPULAR</span>
                                </div>
                                @endif
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="text-xl font-bold text-gray-900">{{ $menu->nama }}</h3>
                                    <div class="price-tag text-sm animate-float">
                                        Rp{{ number_format($menu->price, 0, ',', '.') }}
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600 mb-5 line-clamp-2">{{ $menu->deskripsi }}</p>

                                <button @click="openOrderModal(@js($menu))"
                                    class="w-full bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white py-3 px-4 rounded-lg font-medium transition-all flex items-center justify-center gap-2 shadow group">

                                    <!-- WhatsApp SVG Icon -->
                                    <svg class="w-5 h-5 transform group-hover:rotate-12 transition-transform" fill="currentColor" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.003 2.933c-7.286 0-13.07 5.785-13.07 12.93 0 2.282.624 4.507 1.807 6.462L2 30l7.846-2.733a13.014 13.014 0 006.157 1.563h.003c7.285 0 13.07-5.784 13.07-12.93s-5.785-12.93-13.07-12.93zm0 23.793h-.003a11.027 11.027 0 01-5.626-1.536l-.403-.238-4.653 1.623 1.59-4.51-.263-.416a10.863 10.863 0 01-1.714-5.898c0-6.016 4.905-10.918 10.931-10.918 2.922 0 5.667 1.137 7.735 3.203a10.823 10.823 0 013.2 7.727c0 6.015-4.904 10.919-10.928 10.919zm6.016-8.206c-.328-.164-1.94-.957-2.241-1.066-.301-.111-.52-.164-.738.164s-.85 1.066-1.043 1.285c-.194.219-.388.246-.716.082-.328-.165-1.38-.508-2.63-1.617-.972-.866-1.63-1.937-1.822-2.265-.194-.328-.021-.506.145-.67.149-.148.328-.388.492-.582.165-.194.219-.328.328-.547.109-.219.055-.41-.027-.582-.082-.164-.738-1.78-1.01-2.437-.266-.637-.535-.55-.738-.56l-.63-.012c-.22 0-.574.082-.875.41-.301.328-1.148 1.121-1.148 2.734s1.176 3.169 1.339 3.387c.164.219 2.314 3.538 5.61 4.96.785.339 1.397.542 1.875.692.787.25 1.502.214 2.068.13.63-.094 1.94-.793 2.214-1.561.273-.769.273-1.43.191-1.561-.082-.13-.301-.21-.63-.374z" />
                                    </svg>

                                    <span>Order via WhatsApp</span>
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

            @include('partials.modal')
        </div>
    </div>

    @include('partials.footer')

    <script>
        function showKategori(kategoriId) {
            // Sembunyikan semua kategori content
            document.querySelectorAll('.kategori-content').forEach(content => {
                content.classList.add('hidden');
            });

            // Tampilkan kategori yang dipilih
            const target = document.getElementById('kategori-' + kategoriId);
            if (target) {
                target.classList.remove('hidden');
            }

            // Update tampilan tab aktif
            document.querySelectorAll('.kategori-tab').forEach(tab => {
                tab.classList.remove('active', 'bg-amber-500', 'text-white');
                tab.classList.add('bg-gray-100', 'text-gray-700');
            });

            const activeTab = document.getElementById('tab-' + kategoriId);
            if (activeTab) {
                activeTab.classList.add('active', 'bg-amber-500', 'text-white');
                activeTab.classList.remove('bg-gray-100', 'text-gray-700');
            }
        }

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