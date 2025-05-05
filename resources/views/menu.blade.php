<!-- resources/views/menu.blade.php -->
@extends('layouts.app')

@section('title', 'Menu - Dapur Malika')

@section('content')
<script src="https://unpkg.com/alpinejs@3.13.0/dist/cdn.min.js" defer></script>

<div class="menu-container w-screen h-screen bg-gradient-to-b from-white to-gray-100 p-0 overflow-auto">
    <div class="w-full px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <h1 class="text-5xl font-extrabold text-gray-900 tracking-tight">Explore Our Menu</h1>
            <p class="text-lg text-gray-600 mt-4 max-w-2xl mx-auto">Indulge in rich flavors and hand-crafted dishes from the heart of Indonesia</p>
        </div>


        <!-- Menu Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate__animated animate__fadeInUp">
            @foreach ($menus as $menu)
            <div class="menu-item bg-white/80 backdrop-blur-md rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                <!-- Image -->
                <div class="relative h-52 overflow-hidden">
                    <img src="{{ Storage::url($menu->foto) }}" alt="{{ $menu->nama }}" class="w-full h-full object-cover transform hover:scale-110 transition duration-500">
                    @if($menu->is_popular)
                    <span class="absolute top-4 right-4 bg-amber-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md">Popular</span>
                    @endif
                </div>

                <!-- Content -->
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-lg font-bold text-gray-900">{{ $menu->nama }}</h3>
                        <span class="text-amber-600 font-semibold text-base">Rp{{ number_format($menu->price, 0, ',', '.') }}</span>
                    </div>
                    <h2 class="text-sm text-gray-600 mb-4">Kategori : </h2>
                    <p class="text-sm text-gray-600 mb-4">{{ $menu->deskripsi }}</p>

                    <div x-data="orderModal()" class="relative">

                        <!-- Tombol Order -->
                        <a href="#" @click.prevent="openOrderModal('{{ $menu->nama }}', {{ $menu->price }})"
                            class="mt-6 w-full bg-amber-500 hover:bg-amber-600 text-white py-2 px-4 rounded-lg font-medium text-sm transition-all duration-300 flex items-center justify-center gap-2 shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Order via WhatsApp
                        </a>

                        <!-- Modal -->
                        <div x-show="showModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/70">
                            <div class="bg-white w-full max-w-md rounded-xl p-5 shadow-xl transform transition-all duration-300 ease-in-out"
                                @click.outside="showModal = false"
                                x-transition:enter="ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100">

                                <!-- Header dengan Icon dan Close Button -->
                                <div class="flex items-center justify-between mb-3 border-b pb-2">
                                    <div class="flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        <h2 class="text-lg font-semibold text-gray-800">Detail Pemesanan</h2>
                                    </div>
                                    <button @click="showModal = false" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Content Section -->
                                <div class="bg-amber-50 rounded-lg p-3 mb-3">
                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="flex items-center space-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                            <p class="text-sm text-gray-700">Menu:</p>
                                        </div>
                                        <p class="text-sm font-medium text-gray-900" x-text="menuName"></p>

                                        <div class="flex items-center space-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <p class="text-sm text-gray-700">Harga:</p>
                                        </div>
                                        <p class="text-sm font-medium text-amber-600">Rp<span x-text="formatPrice(price)"></span></p>
                                    </div>
                                </div>

                                <!-- Compact Form Section -->
                                <div class="space-y-2">
                                    <!-- Nama Pemesan -->
                                    <div>
                                        <label class="flex items-center text-xs font-medium text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Nama Pemesan
                                        </label>
                                        <input type="text" x-model="name" placeholder="Contoh: Budi" required
                                            class="w-full border border-gray-300 rounded px-2.5 py-1.5 text-xs focus:outline-none focus:ring-1 focus:ring-amber-400 placeholder-gray-400 mt-0.5">
                                    </div>

                                    <!-- Jumlah Porsi -->
                                    <div>
                                        <label class="flex items-center text-xs font-medium text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                            </svg>
                                            Jumlah Porsi
                                        </label>
                                        <div class="flex rounded-md shadow-sm mt-0.5">
                                            <button @click="qty > 1 ? qty-- : qty = 1" class="px-2 bg-gray-100 border border-r-0 border-gray-300 rounded-l text-gray-600 hover:bg-gray-200 focus:outline-none text-xs">-</button>
                                            <input type="number" x-model="qty" min="1" class="w-full border border-gray-300 px-2 py-1 text-center text-xs focus:outline-none focus:ring-1 focus:ring-amber-400" />
                                            <button @click="qty++" class="px-2 bg-gray-100 border border-l-0 border-gray-300 rounded-r text-gray-600 hover:bg-gray-200 focus:outline-none text-xs">+</button>
                                        </div>
                                    </div>

                                    <!-- Catatan -->
                                    <div>
                                        <label class="flex items-center text-xs font-medium text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Catatan (opsional)
                                        </label>
                                        <textarea x-model="note" rows="1" placeholder="Misal: tanpa cabai, pedas level 2, dll."
                                            class="w-full border border-gray-300 rounded px-2.5 py-1.5 text-xs focus:outline-none focus:ring-1 focus:ring-amber-400 placeholder-gray-400 mt-0.5"></textarea>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex justify-center mt-4 gap-2 mt-4 pt-2 border-t">
                                    <a :href="whatsappLink()" target="_blank"
                                        class="px-4 py-1.5 rounded-lg bg-amber-500 text-white text-sm hover:bg-amber-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-amber-400 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                        </svg>
                                        Kirim ke WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .menu-item {
        transition: all 0.3s ease;
    }

    .menu-item:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
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
@endpush

@push('scripts')
<script>
    function orderModal() {
        return {
            showModal: false,
            menuName: '',
            price: 0,
            qty: 1,
            note: '',
            name: '',

            openOrderModal(name, price) {
                this.menuName = name;
                this.price = price;
                this.qty = 1;
                this.note = '';
                this.showModal = true;
            },

            formatPrice(value) {
                return new Intl.NumberFormat('id-ID').format(value);
            },

            whatsappLink() {
                const total = this.qty * this.price;
                const text = `Halo, saya ${this.name} ingin memesan:%0A%0A📋 *Detail Pesanan*:%0A• Menu: ${this.menuName}%0A• Jumlah: ${this.qty} porsi%0A• Harga: Rp${this.formatPrice(this.price)}%0A• Total: Rp${this.formatPrice(total)}%0A%0A📝 Catatan: ${this.note || '-'}`;
                return `https://wa.me/6285781192748?text=${text}`;
            }
        }
    }
</script>
@endpush