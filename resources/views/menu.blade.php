<!-- resources/views/menu.blade.php -->
@extends('layouts.app')

@section('title', 'Menu - Dapur Malika')

@section('content')
    <h1>Menu</h1>

    <div class="menus">
        @foreach ($menus as $menu)
            <div class="menu-item">
                <h3>{{ $menu->nama }}</h3>
                <p>{{ $menu->deskripsi }}</p>
                <p>Harga: {{ $menu->price }}</p>
                <img src="{{ Storage::url($menu->foto) }}" alt="Menu Image" width="100">
            </div>
        @endforeach
    </div>
@endsection
