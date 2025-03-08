@extends('layouts.main')

@section('title', 'Hubungi Kami')

@section('content')
    <h2>Hubungi Kami</h2>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <form method="POST" action="{{ route('contact') }}">
        @csrf
        <input type="text" name="name" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
        <textarea name="message" placeholder="Pesan" required></textarea>
        <button type="submit">Kirim</button>
    </form>
@endsection
