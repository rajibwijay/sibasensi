@extends('layout/main')

@section('title','Form Ubah Kelas')

@section('container')
    <h4><i class="fas fa-chalkboard-teacher mr-2"></i><b>Form Ubah Kelas</b></a><hr class="bg-secondary"></h4>

    <form method="POST" action="/kelas/{{$kelas->id}}" class="col-6">
        @method('patch')
        @csrf

        <div class="form-group ">
          <label for="formGroupExampleInput">Nama Kelas</label>
          <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror"
          id="nama_kelas"placeholder="Masukan Nama Kelas" name="nama_kelas" value="{{ $kelas->nama_kelas }}">
          @error('nama_kelas') <div class="invalid-feedback">{{$massage}}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Nama Wali Kelas</label>
          <input type="text" class="form-control @error('wali_kelas')is-invalid @enderror"
           id="wali_kelas"placeholder="Masukan Nama Wali Kelas" name="wali_kelas" value="{{ $kelas->wali_kelas }}">
             @error('wali_kelas') <div class="invalid-feedback">{{$message}}</div>
           @enderror
        </div>
        <button type="submit" class="btn btn-info">Ubah Data!</button>
      </form>
@endsection
