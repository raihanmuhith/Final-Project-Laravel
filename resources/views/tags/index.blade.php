@extends('layout.master')

@section('title')
    Tag
@endsection

@section('content')
<a href="/tags/create" class="btn btn-primary my-3">Tambah</a>
<a href="/tags/export">
<button type="button" class="btn btn-success ml-2">
    <i class="fa fa-download"></i>
</button>
</a>
<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Id Berita</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
        @forelse ($tags as $key=>$value)
            <tr>
                <td>{{$key + 1}}</th>
                <td>{{$value->nama}}</td>
                <td>{{$value->berita_id}}</td>
                <td>
                    <form action="/tags/{{$value->id}}" method="POST">
                    <a href="/tags/{{$value->id}}" class="btn btn-info">Show</a>
                    <a href="/tags/{{$value->id}}/edit" class="btn btn-primary">Edit</a>
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


