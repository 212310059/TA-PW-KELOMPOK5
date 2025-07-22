@extends('layouts.master')
@section('judul', 'Edit Buku')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Formulir Edit Buku</h3>
            </div>
            <form method="POST" action="/books/{{$book->id}}" enctype="multipart/form-data">
                @method("PUT")
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
                      <input type="text" id="title" name="title" value="{{$book->title}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="summary">Ringkasan</label>
                        <textarea id="summary" name="summary" class="form-control" cols="30" rows="5">{{$book->summary}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Sampul Buku (Kosongkan jika tidak ingin diubah)</label>
                        <input type="file" id="image" name="image" class="form-control">
                        @if($book->image)
                            <img src="{{ asset('uploads/'.$book->image) }}" alt="Current Image" class="img-thumbnail mt-2" width="150">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="stock">Stok</label>
                        <input type="number" id="stock" name="stock" value="{{$book->stock}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Kategori</label>
                        <select id="category_id" name="category_id" class="form-control">
                            <option value="">--Pilih Kategori--</option>
                            @foreach ($categories as $item)
                                <option value="{{$item->id}}" {{ $item->id === $book->category_id ? 'selected' : '' }}>
                                    {{$item->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
