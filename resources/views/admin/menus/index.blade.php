@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white rounded-xl shadow-lg">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Dashboard Admin - Kelola Menu</h2>

    <!-- Notifikasi Sukses -->
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Tambah Menu -->
    <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        @csrf
        <input type="text" name="nama" placeholder="Nama Menu" class="input" required>
        <input type="number" step="0.01" name="price" placeholder="Harga" class="input" required>
        <textarea name="deskripsi" rows="3" placeholder="Deskripsi" class="input col-span-2" required></textarea>
        <input type="file" name="foto" class="col-span-2">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500 col-span-2">Tambah Menu</button>
    </form>

    <!-- Tabel Menu -->
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Deskripsi</th>
                    <th class="px-4 py-2">Harga</th>
                    <th class="px-4 py-2">Foto</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                <tr class="text-center border-b">
                    <td class="px-4 py-2">{{ $menu->id }}</td>
                    <td class="px-4 py-2">{{ $menu->nama }}</td>
                    <td class="px-4 py-2">{{ $menu->deskripsi }}</td>
                    <td class="px-4 py-2">Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                    <td class="px-4 py-2">
                        @if($menu->foto)
                            <img src="{{ asset('storage/' . $menu->foto) }}" alt="foto" class="h-16 mx-auto">
                        @else
                            <span>-</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 flex justify-center gap-2">
                        <button onclick="showEdit({{ $menu->id }}, '{{ $menu->nama }}', '{{ $menu->deskripsi }}', '{{ $menu->price }}', '{{ asset('storage/' . $menu->foto) }}')" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-400">Edit</button>
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Hapus menu ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-500">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Edit -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg w-full max-w-lg">
        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="nama" id="editNama" class="input mb-2" required>
            <input type="number" step="0.01" name="price" id="editPrice" class="input mb-2" required>
            <textarea name="deskripsi" id="editDeskripsi" class="input mb-2" rows="3" required></textarea>
            <input type="file" name="foto" class="mb-2">
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeEdit()" class="px-4 py-2 bg-gray-400 text-white rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function showEdit(id, nama, deskripsi, price, foto) {
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editNama').value = nama;
        document.getElementById('editDeskripsi').value = deskripsi;
        document.getElementById('editPrice').value = price;
        
        // Set the action URL for the form
        document.getElementById('editForm').action = `/admin/menus/${id}`;
    }

    function closeEdit() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>
@endsection
