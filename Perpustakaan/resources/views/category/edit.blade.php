@extends('layouts.master')
@section('judul', 'Edit Kategori')
@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Formulir Edit Kategori</h3>
    </div>
    <form method="POST" action="/category/{{$category->id}}">
        @method("PUT")
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
                <input type="text" id="name" name="name" class="form-control" value="{{$category->name}}">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="/category" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
