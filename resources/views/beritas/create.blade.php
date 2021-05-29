@extends('layout.master')

@section('content')
<div>
    <form action="/beritas" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul">
            @error('judul')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="body">Content</label>
            <input type="text" class="form-control" name="content" id="content" placeholder="Masukkan Content">
            @error('content')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="body">Penulis</label>
            <input type="text" class="form-control" name="penulis" id="penulis" placeholder="Masukkan Penulis">
            @error('penulis')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection
