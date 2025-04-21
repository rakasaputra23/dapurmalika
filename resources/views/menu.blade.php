<!-- resources/views/menu.blade.php -->
@extends('layouts.app')

@section('title', 'Menu - Dapur Malika')

@section('content')
<div class="menu-container bg-gradient-to-b from-white to-gray-100 py-16 px-6 sm:px-10 lg:px-20 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <h1 class="text-5xl font-extrabold text-gray-900 tracking-tight">Explore Our Menu</h1>
            <p class="text-lg text-gray-600 mt-4 max-w-2xl mx-auto">Indulge in rich flavors and hand-crafted dishes from the heart of Indonesia</p>
        </div>

        <!-- Filters -->
        <div class="flex flex-wrap justify-center gap-3 mb-12" id="category-filters">
            @php $activeCategory = request('category') ?? 'Semua'; @endphp
            @foreach (['Semua', 'Makanan', 'Paket Catering', 'Jajanan'] as $category)
            <button data-category="{{ $category }}"
                class="category-btn px-6 py-2 rounded-full font-medium transition
              {{ $activeCategory === $category ? 'bg-amber-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                {{ $category }}
            </button>
            @endforeach
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
                    <p class="text-sm text-gray-600 mb-4">{{ $menu->deskripsi }}</p>

                    <div class="flex items-center text-xs text-gray-500 space-x-4">
                        @if($menu->spicy_level > 0)
                        <span class="flex items-center">
                            🌶️ {{ $menu->spicy_level }}/5
                        </span>
                        @endif

                        @if($menu->is_vegetarian)
                        <span class="flex items-center">
                            🥬 Vegetarian
                        </span>
                        @endif
                    </div>

                    <button class="mt-6 w-full bg-amber-500 hover:bg-amber-600 text-white py-2 px-4 rounded-lg font-medium text-sm transition-all duration-300 flex items-center justify-center gap-2 shadow-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Add to Order
                    </button>
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

    /* Custom pagination styling */
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