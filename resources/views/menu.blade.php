@extends('layouts.main')

@section('title', 'Menu')

@section('content')
    <h2>Menu Spesial</h2>
    <ul>
        @foreach ($menus as $menu)
            <li>{{ $menu->name }} - Rp {{ number_format($menu->price, 0, ',', '.') }}</li>
        @endforeach
    </ul>
@endsection
