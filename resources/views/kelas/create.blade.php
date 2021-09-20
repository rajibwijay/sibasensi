@extends('layout/main')

@section('title','Form Tambah Kelas')

@section('container')
    <h4><i class="fas fa-chalkboard-teacher mr-2"></i><b>Form Tambah Kelas</b></a><hr class="bg-secondary"></h4>
    <form method="POST" action="/kelas" class="col-6">
        @csrf
        <div class="form-group ">
          <label for="formGroupExampleInput">Nama Kelas</label>
          <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror"
          id="nama_kelas"placeholder="Masukan Nama Kelas" name="nama_kelas" value="{{ old('nama_kelas') }}">
          @error('nama_kelas') <div class="invalid-feedback" required="">{{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Nama Wali Kelas</label>
          <input type="text" class="form-control @error('wali_kelas')is-invalid @enderror"
           id="wali_kelas"placeholder="Masukan Nama Wali Kelas" name="wali_kelas" value="{{ old('wali_kelas') }}">
             @error('wali_kelas') <div class="invalid-feedback" >{{$message}}</div>
           @enderror
        </div>
        <button type="submit" class="btn btn-info">Tambah Data!</button>
      </form>
@endsection
