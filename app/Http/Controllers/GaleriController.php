<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // Method untuk halaman galeri publik
    public function galeriPublik()
{
    $kategoris = Kategori::with('galeri')->get();
    $galeri = Galeri::paginate(12); // or whatever number you prefer
    
    return view('galeri', compact('kategoris', 'galeri'));
}

    // Method untuk halaman admin
    public function index()
    {
        // Mengambil semua kategori
        $kategoris = Kategori::all();
        
        // Mengambil semua item galeri dengan pagination
        $galeri = Galeri::paginate(10);

        return view('admin.galeri.index', compact('kategoris', 'galeri'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.galeri.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'foto' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Menyimpan data galeri baru
        $galeri = new Galeri();
        $galeri->nama = $validated['nama'];
        $galeri->kategori_id = $validated['kategori_id'];

        // Menyimpan foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $path = $foto->store('galeri_images', 'public');
            $galeri->foto = $path;
        }

        $galeri->save();

        return redirect()->route('galeri.index')->with('success', 'Item galeri berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        $kategoris = Kategori::all();
        return view('admin.galeri.edit', compact('galeri', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Mengambil data galeri
        $galeri = Galeri::findOrFail($id);
        $galeri->nama = $validated['nama'];
        $galeri->kategori_id = $validated['kategori_id'];

        // Jika checkbox hapus foto dicentang
        if ($request->has('hapus_foto') && $galeri->foto) {
            Storage::disk('public')->delete($galeri->foto);
            $galeri->foto = null;
        }
        // Menghapus foto lama jika ada dan menyimpan foto baru
        elseif ($request->hasFile('foto')) {
            if ($galeri->foto) {
                Storage::disk('public')->delete($galeri->foto);
            }

            $foto = $request->file('foto');
            $path = $foto->store('galeri_images', 'public');
            $galeri->foto = $path;
        }

        $galeri->save();

        return redirect()->route('galeri.index')->with('success', 'Item galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        
        // Menghapus foto jika ada
        if ($galeri->foto) {
            Storage::disk('public')->delete($galeri->foto);
        }

        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Item galeri berhasil dihapus!');
    }
}