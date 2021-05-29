@extends('layout.master')

@section('title')
    Berita
@endsection

@section('content')
<a href="/beritas/create" class="btn btn-primary my-3">Tambah</a>
<a href="/beritas/export">
<button type="button" class="btn btn-success ml-2">
    <i class="fa fa-download"></i>
</button>
</a>
<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Judul</th>
        <th scope="col">Content</th>
        <th scope="col">Penulis</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
        @forelse ($beritas as $key=>$value)
            <tr>
                <td>{{$key + 1}}</th>
                <td>{{$value->judul}}</td>
                <td>{{$value->content}}</td>
                <td>{{$value->penulis}}</td>
                <td>
                    <form action="/beritas/{{$value->id}}" method="POST">
                    <a href="/beritas/{{$value->id}}" class="btn btn-info">Show</a>
                    <a href="/beritas/{{$value->id}}/edit" class="btn btn-primary">Edit</a>
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger my-1 delete-confirm" value="Delete">
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
    @push('script')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="{{ asset('js/myjs.js') }}"></script>
    @endpush
@endsection


