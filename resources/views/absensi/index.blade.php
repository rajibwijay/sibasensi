@extends('layout/main')

@section('title','Absensi Siswa perKelas')

@section('container')
    <h4><i class="far fa-calendar-check mr-2"></i><b> ABSENSI </b><hr class="bg-secondary"></h4>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }}
            </div>
        @endif
    <table class="table data_table table-hover">
        <thead class="thead-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Kelas</th>
            <th scope="col">Nama Wali Kelas</th>
            <th scope="col">Absen</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data_kelas as $kls)
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
                <td>{{$kls->nama_kelas}}</td>
                <td>{{$kls->wali_kelas}}</td>
                <td>
                    <a href="{{ route ('absensi.show', $kls->id)}}" type="submit" class="btn btn-danger">Absen <i class="far fa-calendar-check mr-2"></i></a>
                    <a href="{{ route ('absensi.edit', $kls->id)}}" type="submit" class="btn btn-success">Edit Absen <i class="fas fa-edit"></i></a>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
@endsection
