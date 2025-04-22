@extends('layouts.app')

@section('title', 'Dashboard Admin - Dapur Malika')

@section('content')
<!-- Tambahkan script Alpine.js -->
<script src="//unpkg.com/alpinejs" defer></script>

<div x-data="editModal()" class="max-w-7xl mx-auto p-6 bg-white rounded-xl shadow-lg">
    <!-- Tombol Kembali -->
    <a href="{{ route('admin.profile') }}" class="inline-block mb-4 px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
        ← Kembali ke Profil
    </a>

    <h2 class="text-3xl font-bold text-gray-800 mb-6">Dashboard Admin - Kelola Galeri</h2>

    <!-- Notifikasi Sukses -->
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Tambah Galeri -->
    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        @csrf
        <input type="text" name="judul" placeholder="Judul Foto" class="input col-span-2" required>
        <input type="file" name="foto" class="col-span-2" required>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500 col-span-2">Tambah Foto</button>
    </form>

    <!-- Tabel Galeri -->
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Judul</th>
                    <th class="px-4 py-2">Foto</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($galeri as $item)
                <tr class="text-center border-b">
                    <td class="px-4 py-2">{{ $item->id }}</td>
                    <td class="px-4 py-2">{{ $item->judul }}</td>
                    <td class="px-4 py-2">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="h-16 mx-auto">
                        @else
                            <span>-</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 flex justify-center gap-2">
                        <button 
                            @click.prevent="open({ 
                                id: {{ $item->id }}, 
                                judul: @js($item->judul)
                            })"
                            class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-400"
                        >
                            Edit
                        </button>
                        <form action="{{ route('galeri.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')">
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

                <input type="text" name="judul" x-model="form.judul" class="input mb-2 w-full" required>
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
                judul: ''
            },
            formAction: '',
            open(item) {
                this.form.judul = item.judul;
                this.formAction = `/admin/galeri/${item.id}`;
                this.isOpen = true;
            },
            close() {
                this.isOpen = false;
            }
        }
    }
</script>
@endsection