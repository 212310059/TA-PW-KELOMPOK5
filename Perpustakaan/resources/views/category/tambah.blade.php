@extends('layouts.master')
@section('judul', 'Tambah Kategori')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Formulir Tambah Kategori Baru</h3>
    </div>
    <form method="POST" action="/category">
        @csrf
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="name">Nama Kategori</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Masukkan nama kategori">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/category" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
