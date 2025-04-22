<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = Galeri::all();
        return view('admin.galeri.index', compact('galeri'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['judul']);
        
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('galeri', 'public');
        }

        Galeri::create($data);

        return redirect()->route('galeri.index')->with('success', 'Foto berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['judul']);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
                Storage::disk('public')->delete($galeri->foto);
            }
            
            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()->route('galeri.index')->with('success', 'Foto berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
        // Hapus foto dari storage
        if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
            Storage::disk('public')->delete($galeri->foto);
        }

        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Foto berhasil dihapus!');
    }
}