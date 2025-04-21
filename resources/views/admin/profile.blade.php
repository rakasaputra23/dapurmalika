@extends('layouts.app')

@section('content')
<div class="relative flex justify-center items-center w-screen h-screen">
    <!-- Background dengan efek blur -->
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" 
        style="background-image: url('/images/background.jpg'); 
               filter: blur(15px); 
               transform: scale(1.1);">
    </div>

    <!-- Overlay semi-transparan agar konten lebih terbaca -->
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>

    <div class="relative w-full max-w-3xl bg-white bg-opacity-80 shadow-xl rounded-2xl p-10 backdrop-blur-lg animate-fadeIn">
        
        <!-- Header Admin -->
        <div class="flex flex-col md:flex-row items-center md:items-start">
            <!-- Avatar -->
            <div class="flex-shrink-0">
                <i class="fas fa-user-circle text-gray-700 text-7xl md:text-8xl"></i>
            </div>

            <!-- Info Admin -->
            <div class="ml-0 md:ml-6 mt-6 md:mt-0 text-center md:text-left">
                <h2 class="text-3xl font-bold text-gray-800">{{ Auth::guard('admin')->user()->name }}</h2>
                <p class="text-gray-500 mt-1">{{ Auth::guard('admin')->user()->email }}</p>

                <div class="flex flex-wrap justify-center md:justify-start mt-4 space-x-3">
                    <!-- Tombol Edit Profile -->
                    <a href="{{ route('admin.editProfile') }}" class="px-5 py-2 bg-gradient-to-r from-[#ff6f00] via-[#ff9800] to-[#ffcc80] text-white rounded-lg hover:shadow-lg hover:scale-105 transition">
                        <i class="fas fa-edit"></i> Edit Profile
                    </a>

                    <!-- Tambahan: Tombol ke Dashboard Admin -->
                    <a href="{{ route('admin.dashboard') }}" class="px-5 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-500 hover:scale-105 transition">
                        <i class="fas fa-tachometer-alt"></i> Dashboard Admin
                    </a>

                    <!-- Tombol Logout -->
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="px-5 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-600 hover:scale-105 transition">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Admin Details -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-100 p-6 rounded-lg shadow-md flex items-center space-x-3">
                <i class="fas fa-user-tie text-3xl text-[#ff6f00]"></i>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Jabatan</h3>
                    <p class="text-gray-600">Administrator</p>
                </div>
            </div>

            <div class="bg-gray-100 p-6 rounded-lg shadow-md flex items-center space-x-3">
                <i class="fas fa-calendar-alt text-3xl text-[#ff6f00]"></i>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Bergabung Sejak</h3>
                    <p class="text-gray-600">
                        {{ Auth::guard('admin')->user()->created_at->format('d M Y') }}
                    </p>
                </div>
            </div>

            <div class="bg-gray-100 p-6 rounded-lg shadow-md flex items-center space-x-3">
                <i class="fas fa-map-marker-alt text-3xl text-[#ff6f00]"></i>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Alamat</h3>
                    <p class="text-gray-600">{{ Auth::guard('admin')->user()->address ?? '-' }}</p>
                </div>
            </div>

            <div class="bg-gray-100 p-6 rounded-lg shadow-md flex items-center space-x-3">
                <i class="fas fa-city text-3xl text-[#ff6f00]"></i>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Tempat Lahir</h3>
                    <p class="text-gray-600">{{ Auth::guard('admin')->user()->birth_place ?? '-' }}</p>
                </div>
            </div>

            <div class="bg-gray-100 p-6 rounded-lg shadow-md flex items-center space-x-3">
                <i class="fas fa-birthday-cake text-3xl text-[#ff6f00]"></i>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Tanggal Lahir</h3>
                    <p class="text-gray-600">
                        {{ Auth::guard('admin')->user()->birth_date ? \Carbon\Carbon::parse(Auth::guard('admin')->user()->birth_date)->format('d M Y') : '-' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-10 text-center text-gray-500 text-sm">
            <p>&copy; 2025 Dapur Malika - All Rights Reserved</p>
        </div>
    </div>
</div>
@endsection
