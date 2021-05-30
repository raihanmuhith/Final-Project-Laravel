@extends('layout.master')

@section('content')
<div>
    <form action="/tags/{{$tags->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" name="judul" value="{{$tags->judul}}" id="judul" placeholder="Masukkan Judul">
            @error('judul')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <input type="text" class="form-control" name="content"  value="{{$tags->content}}"  id="content" placeholder="Masukkan Content">
            @error('content')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" class="form-control" name="penulis"  value="{{$tags->penulis}}"  id="penulis" placeholder="Masukkan Penulis">
            @error('penulis')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection
