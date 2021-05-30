@extends('layout.master')

@section('content')
<h1>{{$beritas->judul}}</h1>
<p>{{$beritas->content}}</p>
<p>Penulis: {{$beritas->penulis}}</p>
<p>tags: 
@foreach ($tags as $item)
    <span class="badge badge-secondary">{{$item->nama}}</span>
@endforeach
</p>
<p><i>Comments</i></p>
@foreach ($comment as $item)
    <div class="card">
        <h5 class="card-header">{{$item->user->name}} 
        </h5>
        <div class="card-body">
            <p class="card-text">{{$item->komentar}}</p>
        </div>
    </div>
@endforeach

<form action="/comments/{{$beritas->id}}" method="POST">
    @csrf
    <textarea name="comment" id="comment" cols="130" rows="2" placeholder="Comment here.."></textarea>
    <button type="submit" class="btn btn-sm btn-secondary mb-4">post</button>
</form>

<a href="/beritas" class="btn btn-primary mt-4">Kembali</a>
<a href="/pdf-detail/{{$beritas->id}}" class="btn btn-success mt-4 ml-2"><i class="fa fa-download"></i></a>
@endsection