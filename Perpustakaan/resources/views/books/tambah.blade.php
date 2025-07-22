@extends('layouts.master')
@section('judul', 'Tambah Buku Baru')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Formulir Tambah Buku</h3>
            </div>
            <form method="POST" action="/books" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ( $errors->all() as $error )
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                      <label for="title">Judul Buku</label>
                      <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="summary">Ringkasan</label>
                        <textarea id="summary" name="summary" class="form-control" cols="30" rows="5">{{ old('summary') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Sampul Buku</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stok</label>
                        <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock') }}">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Kategori</label>
                        <select id="category_id" name="category_id" class="form-control">
                            <option value="">--Pilih Kategori--</option>
                            @forelse ($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @empty
                                <option value="">Belum Ada Kategori</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
