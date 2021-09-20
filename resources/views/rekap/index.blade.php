@extends('layout/main')

@section('title','Rekap Absensi')

@section('container')
    <h4><i class="fas fa-book-reader mr-2"></i><b> REKAP ABSENSI </b></a><hr class="bg-secondary"></h4>
        <table class="data_table table table-hover">
            <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Wali Kelas</th>
                <th scope="col">Rekap</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($kelas as $kls)
                <tr>
                <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$kls->nama_kelas}}</td>
                    <td>{{$kls->wali_kelas}}</td>
                    <td>
                    <a href="{{route('rekap.show',$kls->id)}}" class="btn btn-info">Lihat & Export <i class="fas fa-clipboard-list"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection
