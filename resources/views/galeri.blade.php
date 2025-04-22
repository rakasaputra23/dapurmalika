<!-- resources/views/galeri.blade.php -->
@extends('layouts.app')

@section('title', 'Galeri - Dapur Malika')

@section('content')
<script src="https://unpkg.com/alpinejs@3.13.0/dist/cdn.min.js" defer></script>

<div class="galeri-container bg-gradient-to-b from-white to-gray-100 py-16 px-6 sm:px-10 lg:px-20 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <h1 class="text-5xl font-extrabold text-gray-900 tracking-tight">Our Gallery</h1>
            <p class="text-lg text-gray-600 mt-4 max-w-2xl mx-auto">Explore the visual journey of our culinary creations and special moments</p>
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
@endsection

@push('styles')
<style>
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
@endpush