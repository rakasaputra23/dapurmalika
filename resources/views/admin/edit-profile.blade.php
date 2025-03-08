@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-3xl bg-white shadow-xl rounded-2xl p-10">
        
        <!-- Header -->
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Edit Profil</h2>

        <!-- Form Edit Profil -->
        <form action="{{ route('admin.updateProfile') }}" method="POST">
            @csrf
            @method('POST')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama -->
                <div>
                    <label for="name" class="block text-gray-700 font-semibold mb-1">Nama</label>
                    <input type="text" id="name" name="name" value="{{ old('name', Auth::guard('admin')->user()->name) }}" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-[#ff9800]">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', Auth::guard('admin')->user()->email) }}" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-[#ff9800]">
                </div>
            </div>

            <!-- Alamat -->
            <div class="mt-4">
                <label for="address" class="block text-gray-700 font-semibold mb-1">Alamat</label>
                <input type="text" id="address" name="address" value="{{ old('address', Auth::guard('admin')->user()->address) }}" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-[#ff9800]">
            </div>

            <!-- Tempat & Tanggal Lahir -->
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="birth_place" class="block text-gray-700 font-semibold mb-1">Tempat Lahir</label>
                    <input type="text" id="birth_place" name="birth_place" value="{{ old('birth_place', Auth::guard('admin')->user()->birth_place) }}" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-[#ff9800]">
                </div>
                
                <div>
                    <label for="birth_date" class="block text-gray-700 font-semibold mb-1">Tanggal Lahir</label>
                    <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', Auth::guard('admin')->user()->birth_date) }}" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-[#ff9800]">
                </div>
            </div>

            <!-- Ubah Password -->
            <div class="mt-4">
                <label for="password" class="block text-gray-700 font-semibold mb-1">Password Baru</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-[#ff9800]" placeholder="Masukkan password baru">
            </div>

            <!-- Konfirmasi Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="block text-gray-700 font-semibold mb-1">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-[#ff9800]" placeholder="Konfirmasi password baru">
            </div>

            <!-- Tombol Simpan -->
            <div class="mt-6 flex justify-center">
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-[#ff6f00] via-[#ff9800] to-[#ffcc80] text-white rounded-lg hover:shadow-lg hover:scale-105 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>

        <!-- Kembali -->
        <div class="mt-6 text-center">
            <a href="{{ route('admin.profile') }}" class="text-gray-600 hover:text-[#ff9800]">Kembali ke Profil</a>
        </div>

    </div>
</div>
@endsection
