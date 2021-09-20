@extends('layout/main')

@section('title','Edit Tambah Siswa')

@section('container')
    <h4><i class="far fa-address-card"></i><b> Form Edit Siswa</b></a><hr class="bg-secondary"></h4>
    <form method="POST" action="{{ route('siswa.update', $siswa->id) }}" class="col-7">
        <input type="hidden" name="kelas_id" value="{{ $siswa->kelas_id }}">
        @method('patch')
        @csrf
        <div class="form-row">
            <div class="col-md-8 mb-3">
              <label for="validationDefault01">Nama Lengkap</label>
              <input type="text" class="form-control"
              id="nama_siswa"placeholder="Masukan nama siswa" name="nama_siswa" required value="{{$siswa->nama_siswa}}">
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationDefault02">NIS</label>
              <input type="text" class="form-control"
              id="nis"placeholder="Masukan NIS" name="nis" required value="{{$siswa->nis}}">
            </div>
        </div>
        <button type="submit" class="btn btn-info ">Ubah Data Siswa</button>
      </form>
@endsection
 