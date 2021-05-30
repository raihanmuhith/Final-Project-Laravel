@extends('layout.master')

@section('content')
<div>
    <form action="/tags" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Nama Tag</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Tag">
            @error('nama')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="body">Id Berita</label>
            <input type="text" class="form-control" name="berita_id" id="berita_id" placeholder="Masukkan Id Berita">
            @error('berita_id')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection
