@extends('layouts.admin')

@section('title', 'Edit Profil Admin - Dapur Malika')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Profil Admin</h1>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.profile') }}">Profil</a></li>
            <li class="breadcrumb-item active">Edit Profil</li>
        </ol>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Profil</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.updateProfile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="row">
                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <!-- Foto Profil -->
                                <div class="form-group mb-4 text-center">
                                    <label class="d-block mb-2">Foto Profil</label>
                                    @if(Auth::guard('admin')->user()->profile_picture)
                                        <img src="{{ asset('storage/' . Auth::guard('admin')->user()->profile_picture) }}" 
                                             class="img-thumbnail rounded-circle mb-3" 
                                             style="width: 150px; height: 150px; object-fit: cover;" 
                                             alt="Foto Profil">
                                    @else
                                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mb-3 mx-auto" 
                                             style="width: 150px; height: 150px;">
                                            <i class="fas fa-user-circle text-secondary" style="font-size: 100px;"></i>
                                        </div>
                                    @endif
                                    <input type="file" class="form-control @error('profile_picture') is-invalid @enderror" 
                                           id="profile_picture" name="profile_picture" accept="image/*">
                                    @error('profile_picture')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Format: JPG, PNG, WEBP. Ukuran maks: 2MB</small>
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-md-6">
                                <!-- Nama -->
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" 
                                           value="{{ old('name', Auth::guard('admin')->user()->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" 
                                           value="{{ old('email', Auth::guard('admin')->user()->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="form-group mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" 
                                      id="address" name="address" rows="2">{{ old('address', Auth::guard('admin')->user()->address) }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tempat & Tanggal Lahir -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="birth_place" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control @error('birth_place') is-invalid @enderror" 
                                           id="birth_place" name="birth_place" 
                                           value="{{ old('birth_place', Auth::guard('admin')->user()->birth_place) }}">
                                    @error('birth_place')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="birth_date" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror" 
                                           id="birth_date" name="birth_date" 
                                           value="{{ old('birth_date', Auth::guard('admin')->user()->birth_date) }}">
                                    @error('birth_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Password Baru</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                           id="password" name="password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" 
                                           id="password_confirmation" name="password_confirmation">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.profile') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional_scripts')
<script>
    // Preview image sebelum upload
    document.getElementById('profile_picture').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.querySelector('.img-thumbnail');
                if (preview) {
                    preview.src = e.target.result;
                } else {
                    const placeholder = document.querySelector('.rounded-circle.bg-light');
                    if (placeholder) {
                        placeholder.innerHTML = <img src="${e.target.result}" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">;
                    }
                }
            }
            reader.readAsDataURL(file);
        }
    });

    // Auto-close alert
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 5000);
</script>
@endsection