@extends('layouts.master')

@section('judul', 'Selamat Datang')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body" style="padding: 4rem;">
                    <div class="text-center">
                        <i class="fas fa-book-reader fa-4x text-primary mb-4"></i>
                        <h1 class="display-4">Selamat Datang di Perpustakaan Online</h1>
                        <p class="lead text-muted">Sistem informasi untuk mengelola dan melihat koleksi buku di perpustakaan kami.</p>
                        <hr class="my-4">
                        <p>Silakan masuk untuk memulai sesi Anda atau mendaftar jika Anda belum memiliki akun.</p>
                        <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                        <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">
                            <i class="fas fa-user-plus"></i> Register
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
