<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        // Mengambil semua data menu dan mengirimkannya ke view index
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));  // Pastikan path ini sesuai dengan struktur folder Anda
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'price' => 'nullable|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Menyimpan data menu baru
        $menu = new Menu();
        $menu->nama = $validated['nama'];
        $menu->deskripsi = $validated['deskripsi'] ?? null;
        $menu->price = $validated['price'] ?? null;

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
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'price' => 'nullable|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Mengambil data menu berdasarkan ID
        $menu = Menu::findOrFail($id);
        $menu->nama = $validated['nama'];
        $menu->deskripsi = $validated['deskripsi'] ?? null;
        $menu->price = $validated['price'] ?? null;

        // Menghapus foto lama jika ada dan menyimpan foto baru
        if ($request->hasFile('foto')) {
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
