@extends('layouts.master')
@section('judul')
    Buku dalam Kategori: {{ $category->name }}
@endsection

@section('content')
<div class="row">
    @forelse ($category->books as $book)
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('uploads/' . $book->image) }}" class="card-img-top" alt="{{ $book->title }}" style="height: 300px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title font-weight-bold">{{ $book->title }}</h5>
                    <p class="card-text text-muted mt-2">{{ Str::limit($book->summary, 80) }}</p>
                    <div class="mt-auto">
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary btn-block"><i class="fas fa-eye"></i> Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info" role="alert">
                Belum ada buku di dalam kategori ini.
            </div>
        </div>
    @endforelse
</div>

<a href="/category" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i> Kembali ke Daftar Kategori</a>
@endsection
