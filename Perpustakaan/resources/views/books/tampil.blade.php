@extends('layouts.master')

@section('judul', 'Galeri Buku')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @auth
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ route('books.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Buku Baru
                </a>
            </div>
        </div>
    @endauth

    <div class="row">
        @forelse ($books as $book)
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('uploads/' . $book->image) }}" class="card-img-top" alt="{{ $book->title }}" style="height: 300px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title font-weight-bold">{{ $book->title }}</h5>
                        <div class="mt-2">
                            <span class="badge badge-info">{{ $book->category->name }}</span>
                        </div>
                        <p class="card-text text-muted mt-2">{{ Str::limit($book->summary, 80) }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary btn-block"><i class="fas fa-info-circle"></i> Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning" role="alert">
                    Belum ada data buku yang ditambahkan.
                </div>
            </div>
        @endforelse
    </div>

    {{-- Tombol Navigasi Halaman --}}
    <div class="d-flex justify-content-center">
        {{ $books->links() }}
    </div>

@endsection
