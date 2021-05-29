@extends('layout.master')

@section('content')
<p>Judul  : {{$beritas->judul}}</p>
<p>Content: {{$beritas->content}}</p>
<p>Penulis: {{$beritas->penulis}}</p>
@endsection