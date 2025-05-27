<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Kategori;
use Illuminate\Http\Request;

class GaleriPageController extends Controller
{
    /**
     * Display the gallery page with paginated gallery items.
     */
    public function galeriPublik()
{
    $kategoris = Kategori::with('galeri')->get();
    $galeri = Galeri::paginate(12); // or whatever number you prefer
    
    return view('galeri', compact('kategoris', 'galeri'));
}
}