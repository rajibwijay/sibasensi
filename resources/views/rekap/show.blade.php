@extends('layout/main')

@section('title','Rekap Absensi Perkelas')

@section('container')
    <h4><i class="far fa-calendar-check mr-2"></i><b> REKAP ABSENSI PERKELAS </b></a><hr class="bg-secondary"></h4>

    <form action="{{route('rekap.show',$kelas_id)}}" method="GET">
        <div class="row mb-2">
            <div class="col-sm-3">
                <input name="cari1" type="date" class="form-control" placeholder="Input Tanggal"
                    aria-label="Search" aria-describedby="basic-addon2"
                    @if (isset($_REQUEST['cari1']))
                        value="{{ $_REQUEST['cari1'] }}"
                    @endif required>

            </div> sampai
            <div class="col-sm-3">
                <input name="cari2" type="date" class="form-control" placeholder="Input Tanggal"
                    aria-label="Search" aria-describedby="basic-addon2"
                    @if (isset($_REQUEST['cari2']))
                        value="{{ $_REQUEST['cari2'] }}"
                    @endif>
            </div> 
            <div class="col-sm-2">
                <button type="submit" class="btn btn-secondary">Atur <i class="far fa-calendar-alt"></i></button>
            </div>
            <div class="col-sm-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong">
                    Export  <i class="fas fa-print"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Pilih Export</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <h5>Untuk Siswa</h5>
                            <div>
                                @if(!count($absen))
                                    <a href="#" class="btn btn-success">Print Excel<i class="fas fa-print"></i></a>
                                @else
                                <a href="{{route('rekap.excel',$kelas_id)}}?cari1={{ (isset($_REQUEST['cari1']) ? $_REQUEST['cari1']:"") }}&cari2={{ (isset($_REQUEST['cari2']) ? $_REQUEST['cari2']:"") }}"
                                    class="btn btn-success">Print Excel <i class="fas fa-table"></i></a>
                                @endif
                            </div>
                            <hr>
                            <h5>Untuk Wali Murid</h5>
                                <a href="{{ route('showrekap.pdf',$kelas_id)}}?cari1={{ (isset($_REQUEST['cari1']) ? $_REQUEST['cari1']:"") }}&cari2={{ (isset($_REQUEST['cari2']) ? $_REQUEST['cari2']:"") }}"
                                class="btn btn-warning">Print PDF <i class="far fa-file-pdf"></i></a>
                                
                          </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div> 
    </form>
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title left">DATA ABSENSI SISWA </h4>
    </div>
    @if(count($absen)>0)
    <div class="modal-body">
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
            <tr >
                <th scope="col">No</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">No. Induk</th>
                <th scope="col">Kelas</th>
                <th scope="col">Tanggal Input</th>
                <th scope="col">H</th>
                <th scope="col">S</th>
                <th scope="col">I</th>
                <th scope="col">A</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($absen as $abs)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$abs->siswa->nama_siswa}}</td>
                        <td>{{$abs->siswa->nis}}</td>
                        <td>{{$abs->kelas->nama_kelas}}</td>
                        <td>
                            @if (!isset($_REQUEST['cari1']) || (isset($_REQUEST['cari1']) && $_REQUEST['cari1'] ==""))
                                {{ date('d F Y',strtotime($abs->tgl))}}
                            @else
                                @if (isset($_REQUEST['cari1']))
                                    {{ date('d F Y',strtotime ($_REQUEST['cari1'])) }}
                                @endif
                                @if (isset($_REQUEST['cari2']) && $_REQUEST['cari2'] !="")
                                    - {{ date('d F Y',strtotime ($_REQUEST['cari2'])) }}
                                @endif
                            @endif
                        </td>
                        <td>{{$abs->h}}</td>
                        <td>{{$abs->s}}</td>
                        <td>{{$abs->i}}</td>
                        <td>{{$abs->a}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="alert alert-danger mr-3 ml-3" role="alert">
        <h4 class="alert-heading">Tidak ada Data Absensi pada tanggal tersebut!</h4>
        <hr>
        <p class="mb-0">Silahkan kembali ke menu Absensi lalu absen terlebih dahulu pada tanggal yang dipilh untuk melihat rekap</p>
      </div>
    @endif
@endsection
