@extends('layout.master')

@section('content')
<p>Nama Tag: {{$tags->nama}}</p>
<p>Id berita: {{$tags->beritas_id}}</p>
<p>berita: {{$tags->berita->nama}}</p>

<a href="/tags" class="btn btn-primary mt-4">Kembali</a>
<a href="/pdf-detail/{{$tags->id}}" class="btn btn-success mt-4 ml-2"><i class="fa fa-download"></i></a>
@endsection