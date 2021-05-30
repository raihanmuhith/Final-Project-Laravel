@extends('layout.master')

@section('content')
<p>Nama Tag: {{$tags->nama}}</p>
<p>Id berita: {{$tags->berita_id}}</p>
<p>berita: {{$tags->berita->content}}</p>

<a href="/tags" class="btn btn-primary mt-4">Kembali</a>
@endsection