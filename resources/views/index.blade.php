@extends('layout/main')

@section('title','Dashboard')

@section('container')
<h4><i class="fas fa-tachometer-alt mr-2"></i> <b>DASHBOARD</b></a><hr class="bg-secondary"></h4>

<div class="row text-white">
    <div class="card bg-info ml-2" style="width: 18rem;">
        <div class="card-body">
        <div class="card-body-icon">
            <i class="fas fa-chalkboard-teacher mr-2"></i>
        </div>
          <h5 class="card-title ">KELAS DAN SISWA</h5>
          <h6 class="card-subtitle mb-2 text-white">Keterangan</h6>
          <p class="card-text ">Menu untuk menambah,mengedit, dan menghapus Data Kelas dan Siswa</p>
          <a href="/kelas" class="btn btn-warning ">Detail</a>
        </div>
      </div>
    <div class="card bg-success ml-4" style="width: 18rem;">
        <div class="card-body">
        <div class="card-body-icon">
            <i class="far fa-calendar-check mr-2"></i>
        </div>
          <h5 class="card-title ">ABSENSI</h5>
          <h6 class="card-subtitle mb-2 text-white">Keterangan</h6>
          <p class="card-text">Menu untuk menginput Absensi Siswa berdasarkan Kelas dan Tgl saat ini</p>
          <a href="/absensi" class="btn btn-warning">Detail</a>
        </div>
      </div>

    <div class="card bg-danger ml-4" style="width: 18rem;">
        <div class="card-body">
        <div class="card-body-icon">
            <i class="fas fa-book-reader mr-2"></i>
        </div>
          <h5 class="card-title ">REKAP ABSENSI</h5>
          <h6 class="card-subtitle mb-2 text-white">Keterangan</h6>
          <p class="card-text">Menu untuk melihat laporan Absensi Siswa pertanggal yang ditentukan</p>
          <a href="/rekap" class="btn btn-warning">Detail</a>
        </div>
      </div>
</div>

<style>

.card-body-icon{
    position: top;
    z-index: 0;
    top: 25px;
    right: 4px;
    opacity: 0.4;
    font-size: 90px;
}

</style>
@endsection

