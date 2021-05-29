@extends('layout.master')
@section('title')
    Your Profile
@endsection

@section('content')
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if ($profile != null)
        <label for="nama">Nama</label>
        <input class="form-control" id="disabledInput" type="text" placeholder="{{Auth::user()->name}}" disabled>
        <label class="mt-2" for="email">Email</label>
        <input class="form-control" id="disabledInput" type="text" placeholder="{{Auth::user()->email}}" disabled>
        <label class="mt-2" for="Umur">Umur</label>
        <input class="form-control" id="disabledInput" type="text" placeholder="{{$profile->Umur}}" disabled>
        <label class="mt-2" for="Biodata">Biodata</label>
        <input class="form-control" id="disabledInput" type="text" placeholder="{{$profile->bio}}" disabled>
        <label class="mt-2" for="Alamat">Alamat</label>
        <input class="form-control" id="disabledInput" type="text" placeholder="{{$profile->alamat}}" disabled>
        <p class="mt-2">Do you want to edit your profile ? <a href="/profile/{{$profile->id}}/edit">click here..</a></p>
    @else
        <h2>You Dont have a profile yet,  <a href="/profile/create">Create one!</a></h2>
    @endif
@endsection