@extends('layouts.app')

@section('title', 'Kontak - Dapur Malika')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-16">
    <h2 class="text-4xl font-bold text-center text-orange-600 mb-10">Hubungi Kami</h2>
    <form class="bg-white shadow-md rounded-lg p-6 space-y-4">
        <input type="text" placeholder="Nama Anda" class="w-full border px-4 py-2 rounded-lg focus:ring-orange-500 focus:outline-none">
        <input type="email" placeholder="Email Anda" class="w-full border px-4 py-2 rounded-lg focus:ring-orange-500 focus:outline-none">
        <textarea placeholder="Pesan Anda" class="w-full border px-4 py-2 rounded-lg focus:ring-orange-500 focus:outline-none" rows="5"></textarea>
        <button type="submit" class="w-full bg-orange-600 text-white font-bold py-2 rounded-lg hover:bg-orange-500">Kirim</button>
    </form>
</div>
@endsection
