<!-- resources/views/admin/menus/index.blade.php -->
@extends('layouts.admin')

@section('title', 'Dashboard Admin - Kelola Menu')

@section('additional_css')
<style>
    .menu-image {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 6px;
    }
    .menu-card {
        transition: all 0.3s ease;
    }
    .menu-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Menu</h1>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Kelola Menu</li>
        </ol>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Menu Baru</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="nama" class="form-label">Nama Menu</label>
                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama menu" value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="kategori_id" class="form-label">Kategori</label>
                    <select name="kategori_id" id="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="price" class="form-label">Harga (Rp)</label>
                    <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Masukkan harga" value="{{ old('price') }}" required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-12 mt-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan deskripsi menu" required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-12 mt-3">
                    <label for="foto" class="form-label">Foto Menu</label>
                    <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Format: JPG, PNG, WEBP. Ukuran maks: 2MB</small>
                </div>
                
                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus-circle me-1"></i> Tambah Menu
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Menu</h6>
            <div>
                <form action="{{ route('menus.index') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Cari menu..." value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" width="50">ID</th>
                            <th scope="col" width="100">Foto</th>
                            <th scope="col">Nama Menu</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Harga</th>
                            <th scope="col" width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($menus as $menu)
                        <tr>
                            <td>{{ $menu->id }}</td>
                            <td>
                                @if($menu->foto)
                                    <img src="{{ asset('storage/' . $menu->foto) }}" alt="{{ $menu->nama }}" class="menu-image">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border-radius: 6px;">
                                        <i class="fas fa-image fa-2x text-secondary"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $menu->nama }}</td>
                            <td>{{ $menu->kategori->nama ?? 'Tidak ada kategori' }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($menu->deskripsi, 100) }}</td>
                            <td>Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editModal{{ $menu->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $menu->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal{{ $menu->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $menu->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $menu->id }}">Edit Menu</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="edit_nama_{{ $menu->id }}" class="form-label">Nama Menu</label>
                                                    <input type="text" name="nama" id="edit_nama_{{ $menu->id }}" class="form-control" value="{{ $menu->nama }}" required>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label for="edit_kategori_{{ $menu->id }}" class="form-label">Kategori</label>
                                                    <select name="kategori_id" id="edit_kategori_{{ $menu->id }}" class="form-control" required>
                                                        <option value="">Pilih Kategori</option>
                                                        @foreach($kategoris as $kategori)
                                                            <option value="{{ $kategori->id }}" {{ $menu->kategori_id == $kategori->id ? 'selected' : '' }}>
                                                                {{ $kategori->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label for="edit_price_{{ $menu->id }}" class="form-label">Harga (Rp)</label>
                                                    <input type="number" name="price" id="edit_price_{{ $menu->id }}" class="form-control" value="{{ $menu->price }}" required>
                                                </div>
                                                
                                                <div class="col-12 mt-3">
                                                    <label for="edit_deskripsi_{{ $menu->id }}" class="form-label">Deskripsi</label>
                                                    <textarea name="deskripsi" id="edit_deskripsi_{{ $menu->id }}" rows="3" class="form-control" required>{{ $menu->deskripsi }}</textarea>
                                                </div>
                                                
                                                <div class="col-12 mt-3">
                                                    <label for="edit_foto_{{ $menu->id }}" class="form-label">Foto Menu</label>
                                                    @if($menu->foto)
                                                        <div class="mb-2">
                                                            <img src="{{ asset('storage/' . $menu->foto) }}" alt="{{ $menu->nama }}" class="menu-image">
                                                        </div>
                                                    @endif
                                                    <input type="file" name="foto" id="edit_foto_{{ $menu->id }}" class="form-control" accept="image/*">
                                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Delete -->
                        <div class="modal fade" id="deleteModal{{ $menu->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $menu->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $menu->id }}">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus menu <strong>{{ $menu->nama }}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <div class="d-flex flex-column align-items-center">
                                    <i class="fas fa-utensils fa-3x text-secondary mb-3"></i>
                                    <h5 class="text-secondary">Belum ada menu</h5>
                                    <p class="text-muted">Tambahkan menu baru menggunakan form di atas</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4">
                {{ $menus->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional_scripts')
<script>
    // Auto-close alert after 5 seconds
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 5000);
</script>
@endsection