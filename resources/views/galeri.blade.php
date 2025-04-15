@extends('layouts.app')

@section('title', 'Galeri - Dapur Malika')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-4xl font-bold text-center text-orange-600 mb-10">Galeri Kami</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @for($i = 1; $i <= 6; $i++)
        <div class="overflow-hidden rounded-xl shadow-md hover:shadow-xl transition">
            <img src="https://source.unsplash.com/500x300/?food,restaurant&sig={{ $i }}" alt="Galeri {{ $i }}" class="w-full h-64 object-cover">
        </div>
        @endfor
    </div>
</div>
@endsection
