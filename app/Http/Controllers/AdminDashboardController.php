<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Galeri;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalMenus = Menu::count();
        $totalGaleri = Galeri::count();
        $totalKategori = Kategori::count();
        $totalVisitors = 0; // Ganti ini jika kamu sudah menyimpan data pengunjung

        $recentMenus = Menu::latest()->take(5)->get();
        $recentGaleri = Galeri::latest()->take(6)->get();

        return view('admin.dashboard', compact(
            'totalMenus',
            'totalGaleri',
            'totalKategori',
            'totalVisitors',
            'recentMenus',
            'recentGaleri'
        ));
    }
}
