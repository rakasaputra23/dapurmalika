<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; // Sesuaikan dengan model yang digunakan

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Mencari data berdasarkan nama menu (sesuaikan dengan model yang digunakan)
        $results = Menu::where('name', 'LIKE', "%{$query}%")->get();

        // Kembalikan hasil pencarian ke halaman hasil pencarian
        return view('search_results', compact('results', 'query'));
    }
}
