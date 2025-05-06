@extends('layouts.admin')

@section('title', 'Dashboard Admin - Kelola Galeri')

@section('additional_css')
<style>
    .gallery-image {
        height: 80px;
        width: auto;
        object-fit: cover;
    }
    
    .modal-backdrop {
        z-index: 1040;
    }
    
    .modal {
        z-index: 1050;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Kelola Galeri</h5>
                <a href="{{ route('admin.profile') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali ke Profil
                </a>
            </div>
            <div class="card-body">
                <!-- Form Tambah Galeri -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">Tambah Foto Baru</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="col-md-8">
                                <label for="judul" class="form-label">Judul Foto</label>
                                <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul foto" required>
                            </div>
                            <div class="col-md-4">
                                <label for="foto" class="form-label">Pilih Foto</label>
                                <input type="file" name="foto" id="foto" class="form-control" required>
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Tambah Foto
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tabel Galeri -->
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">ID</th>
                                <th width="30%">Judul</th>
                                <th width="40%">Foto</th>
                                <th width="25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galeri as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->judul }}</td>
                                <td class="text-center">
                                    @if($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="gallery-image">
                                    @else
                                        <span class="badge bg-secondary">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-warning btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <form action="{{ route('galeri.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm ms-1">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Modal Edit untuk setiap item -->
                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Foto Galeri</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('galeri.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="editJudul{{ $item->id }}" class="form-label">Judul Foto</label>
                                                    <input type="text" class="form-control" id="editJudul{{ $item->id }}" name="judul" value="{{ $item->judul }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editFoto{{ $item->id }}" class="form-label">Ganti Foto (Opsional)</label>
                                                    <input type="file" class="form-control" id="editFoto{{ $item->id }}" name="foto">
                                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto.</small>
                                                </div>
                                                @if($item->foto)
                                                <div class="mb-3 text-center">
                                                    <p class="mb-1">Foto Saat Ini:</p>
                                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="img-thumbnail" style="max-height: 150px">
                                                </div>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            @if(count($galeri) == 0)
                            <tr>
                                <td colspan="4" class="text-center py-3">Belum ada foto di galeri</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection