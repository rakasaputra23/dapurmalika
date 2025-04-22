<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriPageController extends Controller
{
    /**
     * Display the gallery page with paginated gallery items.
     */
    public function index()
    {
        // Use pagination instead of getting all items
        $galeri = Galeri::paginate(9); // Show 9 items per page
        
        return view('galeri', compact('galeri'));
    }
}