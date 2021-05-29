@extends('layout.master')

@section('content')
<p>Judul  : {{$beritas->judul}}</p>
<p>Content: {{$beritas->content}}</p>
<p>Penulis: {{$beritas->penulis}}</p>
<p>tags: 
@foreach ($tags as $item)
    <span class="badge badge-secondary">{{$item->nama}}</span>
@endforeach
</p>
<a href="/beritas" class="btn btn-primary mt-4">Kembali</a>
<a href="/pdf-detail/{{$beritas->id}}" class="btn btn-success mt-4 ml-2"><i class="fa fa-download"></i></a>
@endsection