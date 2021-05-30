@extends('layout.master')

@section('content')
<div>
    <form action="/tags/{{$tags->id}}" method="POST">
        @csrf
        @method('PUT')
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
            <label for="body">Nama Berita</label>
            <select name="berita_id" id="berita_id">
                @foreach ($beritas as $br) 
                    <option value="{{$br->id}}">{{$br->judul}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection
