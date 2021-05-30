@extends('layout.master')

@section('content')
<div>
    <form action="/comments/{{$comment->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="komentar">Komentar</label>
            <input type="text" class="form-control" name="comment" value="{{$comment->komentar}}" id="comment" placeholder="Comment here">
        </div>
        <a href="/comments" class="btn btn-secondary"> Kembali</a>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection
