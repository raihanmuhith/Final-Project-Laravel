@extends('layout.master')

@section('title')
    Create Profile
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title"></h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="/profile" method="POST">
      @csrf
      <div class="box-body">
        <div class="form-group">
          <label for="InputUmur">Umur</label>
          <input type="text" class="form-control" id="InputUmur" value="{{ old('Umur','') }}" placeholder="Masukkan Umur" name="Umur">
          @error('Umur')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
            <label for="InputBio">Biodata</label>
            <textarea class="form-control" rows="3" placeholder="Enter ..." name="bio"></textarea>
            @error('bio')
               <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="InputAlamat">Alamat</label>
            <input type="text" class="form-control" id="InputAlamat" value="{{ old('alamat','') }}" placeholder="Masukkan alamat" name="alamat">
            @error('alamt')
              <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </form>
  </div>
@endsection