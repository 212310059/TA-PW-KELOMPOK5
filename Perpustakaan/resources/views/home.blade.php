@extends('layouts.master')

@section('judul', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="info-box shadow-sm">
                <span class="info-box-icon bg-info"><i class="fas fa-swatchbook"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Judul Buku</span>
                    <span class="info-box-number">{{ $bookCount }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="info-box shadow-sm">
                <span class="info-box-icon bg-success"><i class="fas fa-sitemap"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Kategori</span>
                    <span class="info-box-number">{{ $categoryCount }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="info-box shadow-sm">
                <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Pengguna</span>
                    <span class="info-box-number">{{ $userCount }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Selamat Datang, {{ Auth::user()->name }}!</h3>
                </div>
                <div class="card-body">
                    <p>Anda telah login ke sistem Perpustakaan Online. Gunakan menu di sebelah kiri untuk menavigasi aplikasi.</p>
                    <hr>
                    <h4>Aksi Cepat:</h4>
                    <a href="{{ route('books.index') }}" class="btn btn-primary"><i class="fas fa-book-open"></i> Lihat Galeri Buku</a>
                    <a href="/category" class="btn btn-secondary"><i class="fas fa-tasks"></i> Kelola Kategori</a>
                </div>
            </div>
        </div>
    </div>
@endsection
