@extends('layouts.master')

@section('judul')
    Detail Buku: {{ $book->title }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <img src="{{asset('uploads/'.$book->image)}}" class="card-img-top" alt="{{ $book->title }}">
            <div class="card-body">
                @auth
                <div class="d-flex justify-content-between">
                    <a href="/books/{{$book->id}}/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                    <form action="/books/{{$book->id}}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <h3 class="profile-username text-center">{{ $book->title }}</h3>
                <p class="text-muted text-center">{{$book->category->name}}</p>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Stok Tersedia</b> <a class="float-right">{{$book->stock}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Total Peminjam</b> <a class="float-right">{{ count($book->borrows) }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Kolom Kanan: Ringkasan, Form Pinjam, dan Riwayat Peminjaman --}}
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ringkasan</h3>
            </div>
            <div class="card-body">
                <p>{{$book->summary}}</p>
            </div>
        </div>

        @auth
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Formulir Peminjaman</h3>
            </div>
            <form action="/borrows/{{$book->id}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Tanggal Peminjaman</label>
                        <input type="date" name="tanggal_peminjaman" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="tanggal_kembali" class="form-control" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-block">Pinjam Buku Ini</button>
                </div>
            </form>
        </div>
        @endauth

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Riwayat Peminjaman</h3>
            </div>
            <div class="card-body">
                @forelse ($book->borrows as $item)
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" alt="user image">
                        <span class="username">
                          <a href="#">{{$item->user->name}}</a>
                        </span>
                        <span class="description">Meminjam pada: {{$item->tanggal_peminjaman}} | Kembali: {{$item->tanggal_kembali}}</span>
                      </div>
                    </div>
                @empty
                    <p>Belum ada yang pernah meminjam buku ini.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
<a href="/books" class="btn btn-secondary btn-sm mt-2"><i class="fas fa-arrow-left"></i> Kembali ke Galeri</a>
@endsection
