@extends('layout.master')

@section('title')
    Komentar
@endsection

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">Berita</th>
        <th scope="col">Komentar</th>
        <th class="text-center" scope="col" width="150px" >Actions</th>
    </tr>
    </thead>
    <tbody>
        @forelse ($comment as $value)
            <tr>
                <td>{{$value->berita->judul}}</td>
                <td>{{$value->komentar}}</td>
                <td>
                    <form action="/comments/{{$value->id}}" method="POST">
                    <a href="/comments/{{$value->id}}/edit" class="btn btn-primary">Edit</a>
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger my-1" value="Delete">
                    </form>
                </td>
            </tr>
        @empty
            <tr colspan="3">
                <td>No data</td>
            </tr>  
        @endforelse              
    </tbody>
</table>
@endsection


