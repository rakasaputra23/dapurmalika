<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class PublicPageController extends Controller
{
    public function menu() {
        $menus = Menu::all();  // Mengambil semua menu dari database
        return view('menu', compact('menus'));  // Mengarahkan ke view menu.blade.php
    }

    // Metode lain untuk galeri, kontak, tentang
    public function galeri() {
        return view('galeri');
    }

    public function kontak() {
        return view('kontak');
    }

    public function tentang() {
        return view('tentang');
    }
}
