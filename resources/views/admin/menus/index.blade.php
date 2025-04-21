@extends('layouts.app')

@section('title', 'Dashboard Admin - Dapur Malika')

@section('content')
<!-- Tambahkan script Alpine.js -->
<script src="//unpkg.com/alpinejs" defer></script>

<div x-data="editModal()" class="max-w-7xl mx-auto p-6 bg-white rounded-xl shadow-lg">
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
                        <button 
                            @click.prevent="open({ 
                                id: {{ $menu->id }}, 
                                nama: @js($menu->nama), 
                                deskripsi: @js($menu->deskripsi), 
                                price: @js($menu->price) 
                            })"
                            class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-400"
                        >
                            Edit
                        </button>
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

    <!-- Modal Edit dengan Alpine.js -->
    <div 
        x-show="isOpen" 
        x-cloak 
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
        <div class="bg-white p-6 rounded-lg w-full max-w-lg">
            <form :action="formAction" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <input type="text" name="nama" x-model="form.nama" class="input mb-2 w-full" required>
                <input type="number" step="0.01" name="price" x-model="form.price" class="input mb-2 w-full" required>
                <textarea name="deskripsi" x-model="form.deskripsi" class="input mb-2 w-full" rows="3" required></textarea>
                <input type="file" name="foto" class="mb-2 w-full">
                <small class="text-gray-500 block mb-4">Biarkan kosong jika tidak ingin mengganti foto.</small>

                <div class="flex justify-end space-x-2">
                    <button type="button" @click="close" class="px-4 py-2 bg-gray-400 text-white rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Alpine Component Script -->
<script>
    function editModal() {
        return {
            isOpen: false,
            form: {
                nama: '',
                deskripsi: '',
                price: ''
            },
            formAction: '',
            open(menu) {
                this.form.nama = menu.nama;
                this.form.deskripsi = menu.deskripsi;
                this.form.price = menu.price;
                this.formAction = `/admin/menus/${menu.id}`;
                this.isOpen = true;
            },
            close() {
                this.isOpen = false;
            }
        }
    }
</script>
@endsection
