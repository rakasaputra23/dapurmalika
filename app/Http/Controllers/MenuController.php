<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    // Method untuk halaman menu publik - menambahkan method baru ini
    public function menuPublik()
    {
        // Mengambil semua kategori dengan menus terkait menggunakan eager loading
        $kategoris = Kategori::with('menus')->get();
        
        // Mengirim data kategori beserta menu terkait ke view menu publik
        return view('menu', compact('kategoris'));
    }

    // Method untuk halaman admin
    public function index()
    {
        // Mengambil semua kategori dengan menus terkait menggunakan eager loading
        $kategoris = Kategori::with('menus')->get();
        
        // Mengambil semua menu untuk tampilan admin dengan pagination
        $menus = Menu::paginate(10);

        // Mengirim data kategori beserta menu terkait ke view index
        return view('admin.menus.index', compact('kategoris', 'menus'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.menus.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'deskripsi' => 'nullable|string',
            'price' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_popular' => 'nullable|boolean',
        ]);

        // Menyimpan data menu baru
        $menu = new Menu();
        $menu->nama = $validated['nama'];
        $menu->kategori_id = $validated['kategori_id'];
        $menu->deskripsi = $validated['deskripsi'] ?? null;
        $menu->price = $validated['price'];
        $menu->is_popular = $request->has('is_popular');

        // Menyimpan foto menu jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $path = $foto->store('menu_images', 'public');
            $menu->foto = $path;
        }

        $menu->save();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Mengambil data menu berdasarkan ID
        $menu = Menu::findOrFail($id);
        $kategoris = Kategori::all();
        return view('admin.menus.edit', compact('menu', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'deskripsi' => 'nullable|string',
            'price' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_popular' => 'nullable|boolean',
        ]);

        // Mengambil data menu berdasarkan ID
        $menu = Menu::findOrFail($id);
        $menu->nama = $validated['nama'];
        $menu->kategori_id = $validated['kategori_id'];
        $menu->deskripsi = $validated['deskripsi'] ?? null;
        $menu->price = $validated['price'];
        $menu->is_popular = $request->has('is_popular');

        // Jika checkbox hapus foto dicentang
        if ($request->has('hapus_foto') && $menu->foto) {
            Storage::disk('public')->delete($menu->foto);
            $menu->foto = null;
        }
        // Menghapus foto lama jika ada dan menyimpan foto baru
        elseif ($request->hasFile('foto')) {
            if ($menu->foto) {
                Storage::disk('public')->delete($menu->foto);  // Hapus foto lama dari penyimpanan
            }

            $foto = $request->file('foto');
            $path = $foto->store('menu_images', 'public');
            $menu->foto = $path;  // Menyimpan foto baru
        }

        $menu->save();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Mengambil data menu berdasarkan ID
        $menu = Menu::findOrFail($id);
        
        // Menghapus foto menu jika ada
        if ($menu->foto) {
            Storage::disk('public')->delete($menu->foto);
        }

        // Menghapus data menu
        $menu->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus!');
    }
}