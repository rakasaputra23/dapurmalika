@extends('layouts.app')

@section('title', 'Tentang Kami - Dapur Malika')

@section('content')
<div class="bg-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-4xl font-bold text-gray-800 mb-4">Tentang Dapur Malika</h2>
        <p class="text-lg text-gray-600 mb-6">
            Dapur Malika adalah tempat di mana cita rasa rumahan bertemu dengan kualitas restoran. Kami menyajikan aneka menu masakan khas Indonesia yang dibuat dengan cinta, bahan-bahan segar, dan resep warisan keluarga.
        </p>
        <p class="text-md text-gray-500 mb-6">
            Berdiri sejak tahun 2020, Dapur Malika hadir untuk memenuhi kebutuhan kuliner masyarakat dengan berbagai pilihan menu yang lezat, sehat, dan terjangkau. Kami juga menerima pesanan untuk acara keluarga, kantor, hingga katering harian.
        </p>
        <p class="text-md text-gray-500 mb-6">
            Komitmen kami adalah memberikan pelayanan terbaik, rasa autentik, dan pengalaman makan yang berkesan untuk setiap pelanggan. 
        </p>
    </div>

    <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto text-center">
        <div>
            <h3 class="text-xl font-semibold text-green-700 mb-2">Bahan Berkualitas</h3>
            <p class="text-gray-600">Kami hanya menggunakan bahan-bahan segar dan pilihan terbaik dalam setiap masakan kami.</p>
        </div>
        <div>
            <h3 class="text-xl font-semibold text-green-700 mb-2">Resep Otentik</h3>
            <p class="text-gray-600">Resep turun-temurun dari keluarga yang mempertahankan cita rasa khas Indonesia.</p>
        </div>
        <div>
            <h3 class="text-xl font-semibold text-green-700 mb-2">Pelayanan Terbaik</h3>
            <p class="text-gray-600">Kami percaya kepuasan pelanggan adalah prioritas utama dalam setiap pelayanan kami.</p>
        </div>
    </div>
</div>
@endsection
