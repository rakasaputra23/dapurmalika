@extends('layouts.admin')

@section('title', 'Profil Admin - Dapur Malika')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil Admin</h1>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Profil Admin</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Foto Profil</h6>
                </div>
                <div class="card-body text-center">
                    <form action="{{ route('admin.updateProfilePicture') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            @if(Auth::guard('admin')->user()->profile_picture)
                                <img src="{{ asset('storage/' . Auth::guard('admin')->user()->profile_picture) }}" 
                                     class="img-thumbnail rounded-circle mb-3" 
                                     style="width: 200px; height: 200px; object-fit: cover;" 
                                     alt="Foto Profil">
                            @else
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mb-3" 
                                     style="width: 200px; height: 200px; margin: 0 auto;">
                                    <i class="fas fa-user-circle text-secondary" style="font-size: 150px;"></i>
                                </div>
                            @endif
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('profile_picture') is-invalid @enderror" 
                                       id="profile_picture" name="profile_picture" accept="image/*">
                                <label class="custom-file-label" for="profile_picture">Pilih foto...</label>
                                @error('profile_picture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload me-1"></i> Unggah Foto
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Profil</h6>
                    <a href="{{ route('admin.editProfile') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit me-1"></i> Edit Profil
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nama Lengkap</label>
                            <p>{{ Auth::guard('admin')->user()->name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <p>{{ Auth::guard('admin')->user()->email }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Tempat Lahir</label>
                            <p>{{ Auth::guard('admin')->user()->birth_place ?? '-' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Tanggal Lahir</label>
                            <p>
                                @if(Auth::guard('admin')->user()->birth_date)
                                    {{ \Carbon\Carbon::parse(Auth::guard('admin')->user()->birth_date)->format('d F Y') }}
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Alamat</label>
                            <p>{{ Auth::guard('admin')->user()->address ?? '-' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Bergabung Sejak</label>
                            <p>{{ Auth::guard('admin')->user()->created_at->format('d F Y') }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Terakhir Diperbarui</label>
                            <p>{{ Auth::guard('admin')->user()->updated_at->format('d F Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Aksi Cepat</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">
                            <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                        </a>
                        <a href="{{ route('menus.index') }}" class="btn btn-outline-success">
                            <i class="fas fa-utensils me-1"></i> Kelola Menu
                        </a>
                        <a href="{{ route('galeri.index') }}" class="btn btn-outline-info">
                            <i class="fas fa-images me-1"></i> Kelola Galeri
                        </a>
                        <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="fas fa-sign-out-alt me-1"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional_scripts')
<script>
    // Menampilkan nama file yang dipilih untuk upload
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("profile_picture").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });

    // Auto-close alert
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 5000);
</script>
@endsection