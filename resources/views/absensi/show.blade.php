@extends('layout/main')

@section('title','Show Siswa')

@section('container')
    <h4><i class="far fa-calendar-check mr-2"></i><b> Masuk Absensi : {{ date('d F Y')}} </b></a><hr class="bg-secondary"></h4>

    <form action="{{route ('absensi.show',$data)}}" method="GET" >
        <div class="row mb-2">
            <div class="col-sm-3">
                <input name="cari1" type="date" class="form-control" placeholder="Input Tanggal"
                    aria-label="Search" aria-describedby="basic-addon2"
                    @if (isset($_REQUEST['cari1']))
                    value="{{ $_REQUEST['cari1'] }}"
                @endif>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-secondary">Atur <i class="far fa-calendar-alt"></i></button>
            </div>
        </div>
    </form>

    @if (count($absensi)>0)
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Sudah input!</h4>
        <hr>
        <p class="mb-0">Silahkan kembali ke menu Edit Absensi jika ada kesalahan input</p>
      </div>
        <table class="table data_tables">
            <thead class="thead-light">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">No. Induk Siswa</th>
                  <th scope="col">Nama Siswa</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Tgl</th>
                  <th scope="col">Input Absensi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($absensi as $item)
                <tr>
                    @php
                        $tgl = date('d F Y');
                    @endphp
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$item->siswa->nis}}</td>
                    <td>{{$item->siswa->nama_siswa}}</td>
                    <td>{{$item->kelas->nama_kelas}}</td>
                    <td>
                        @if (!isset($_REQUEST['cari1']) || (isset($_REQUEST['cari1']) && $_REQUEST['cari1'] ==""))
                                {{ date('d F Y',strtotime($tgl))}}
                        @else
                            @if(isset($_REQUEST['cari1']))
                            {{ date('d F Y',strtotime ($_REQUEST['cari1'])) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        <input type="hidden" name="siswa_id[]" value="{{ $item->id }}">
                        <select name="keterangan[]" {{ count($absensi)>0 ? "disabled":""}} class="form-control">
                            <option value="H" {{ ($item->h) ? "selected":"" }}>H</option>
                            <option value="S" {{ ($item->s) ? "selected":"" }}>S</option>
                            <option value="I" {{ ($item->i) ? "selected":"" }}>I</option>
                            <option value="A" {{ ($item->a) ? "selected":"" }}>A</option>
                        </select>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
    @else

    <form method="POST" action="{{ route('absensi.store') }}">
        @csrf
        <button type="submit" class="btn btn-danger mb-3">Absen <i class="fas fa-share-square"></i></button>
        <table class="table data_tables table-hover table-responsive-sm">
            <thead class="thead-light">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">No. Induk Siswa</th>
                  <th scope="col">Nama Siswa</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Tgl</th>
                  <th scope="col">Input Absensi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($siswa as $item)
                @php
                if (!isset($_REQUEST['cari1'])) {
                    $tgl = date('Y-m-d');
                } else {
                    $tgl = date('Y-m-d',strtotime($_REQUEST['cari1']));
                }
                @endphp
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$item->nis}}</td>
                    <td>{{$item->nama_siswa}}</td>
                    <td>{{$item->kelas->nama_kelas}}</td>
                    <td>
                        @if (!isset($_REQUEST['cari1']) || (isset($_REQUEST['cari1']) && $_REQUEST['cari1'] ==""))
                                {{ date('d F Y',strtotime($tgl))}}
                        @else
                            @if(isset($_REQUEST['cari1']))
                            {{ date('d F Y',strtotime ($_REQUEST['cari1'])) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        <input type="hidden" name="kelas_id[]" value="{{ $data }}">
                        <input type="hidden" name="siswa_id[]" value="{{ $item->id }}">
                        <input type="hidden" name="tgl[]" value="{{ $tgl}}">
                        <select name="keterangan[]" class="form-control">
                            <option value="H" >H</option>
                            <option value="S" >S</option>
                            <option value="I" >I</option>
                            <option value="A" >A</option>
                        </select>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </form>
    @endif

@endsection
