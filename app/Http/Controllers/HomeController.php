<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Galeri; // Tambahkan ini

class HomeController extends Controller
{
    public function index()
    {
        // Memuat semua kategori dengan menus-nya
        $kategoris = Kategori::with('menus')->get();

        // Mengambil menu dengan kategori spesifik
        $makanan = Menu::whereHas('kategori', function ($query) {
            $query->where('nama', 'Makanan');
        })->latest()->first();

        $catering = Menu::whereHas('kategori', function ($query) {
            $query->where('nama', 'Paket Catering');
        })->latest()->first();

        $jajanan = Menu::whereHas('kategori', function ($query) {
            $query->where('nama', 'Jajanan');
        })->latest()->first();

        // Ambil data galeri terbaru (8 item)
        $galeri = Galeri::with('kategori')
                    ->latest()
                    ->take(8)
                    ->get();

        // Mengirim semua data ke view
        return view('home', compact('kategoris', 'makanan', 'catering', 'jajanan', 'galeri'));
    }
}