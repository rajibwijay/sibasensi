@extends('layout/main')

@section('title','Form Tambah Siswa')

@section('container')
    <h4><i class="far fa-address-card"></i><b> Form Tambah Siswa</b></a><hr class="bg-secondary"></h4>
    <form method="POST" action="{{ route('siswa.store') }}" class="col-7">
        <input type="hidden" name="kelas_id" value="{{ $kelas_id }}">
        @csrf 
        <div class="form-row">
            <div class="col-md-8 mb-3">
              <label for="validationDefault01">Nama Lengkap</label>
              <input type="text" class="form-control @error('nama_siswa')is-invalid @enderror"
              id="nama_siswa"placeholder="Masukan Nama Siswa" name="nama_siswa" value="{{ old('nama_siswa') }}">
                @error('nama_siswa') <div class="invalid-feedback">{{$message}}</div>
              @enderror
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationDefault02">NIS</label>
              <input type="number" class="form-control @error('nis')is-invalid @enderror"
              id="nis"placeholder="Masukan No. Induk" name="nis" value="{{ old('nis') }}">
                @error('nsi') <div class="invalid-feedback">{{$message}}</div>
              @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-info ">Tambah Data Siswa</button>
      </form>
@endsection
