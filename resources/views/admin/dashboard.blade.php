<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.admin')

@section('title', 'Dashboard Admin - Dapur Malika')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>       
    </div>

    <!-- Stats Cards Row -->
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Menu</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMenus ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-utensils fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Galeri</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalGaleri ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-images fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Kategori</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalKategori ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Expanded Recent Menu Card -->
        <div class="col-lg-7 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Menu Terbaru</h6>
                    <a href="{{ route('menus.index') }}" class="btn btn-sm btn-primary">
                        Lihat Semua
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama Menu</th>
                                    <th>Harga</th>
                                    <th>Kategori</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($recentMenus) && count($recentMenus) > 0)
                                    @foreach($recentMenus as $menu)
                                    <tr>
                                        <td>
                                            @if($menu->foto)
                                                <img src="{{ asset('storage/' . $menu->foto) }}" alt="{{ $menu->nama }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <div class="bg-light d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                                    <i class="fas fa-utensils text-secondary"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $menu->nama }}</td>
                                        <td>Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                                        <td>
                                            <span class="badge badge-primary text-dark">
    {{ $menu->kategori->nama ?? '-' }}
</span>



                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center py-4">Belum ada data menu</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Expanded Recent Gallery Card -->
        <div class="col-lg-5 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Galeri Terbaru</h6>
                    <a href="{{ route('galeri.index') }}" class="btn btn-sm btn-primary">
                        Lihat Semua
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if(isset($recentGaleri) && count($recentGaleri) > 0)
                            @foreach($recentGaleri as $item)
                            <div class="col-md-6 mb-3">
                                <div class="card h-100 border-0 shadow-sm">
                                    @if($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 150px; object-fit: cover;">
                                    @else
                                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 150px;">
                                            <i class="fas fa-image fa-3x text-secondary"></i>
                                        </div>
                                    @endif
                                    <div class="card-body">
                                        <h6 class="card-title mb-1">{{ Str::limit($item->judul, 20) }}</h6>
                                        <p class="card-text small text-muted mb-2">
                                            {{ Str::limit($item->deskripsi, 50) }}
                                        </p>
                                        <small class="text-muted">
                                            {{ $item->created_at->diffForHumans() }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center py-4">
                                <p>Belum ada data galeri</p>
                                <a href="{{ route('galeri.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i> Tambah Galeri
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection