@extends('layout/main')

@section('title','Edit Absensi Siswa')

@section('container')
    <h4><i class="far fa-calendar-check mr-2"></i><b> EDIT ABSENSI</b></a><hr class="bg-secondary"></h4>
    <form action="{{route('absensi.edit', $kelas_id)}}" method="GET" >
        <div class="row mb-2">
            <div class="col-sm-3">
                <input name="cari1" type="date" class="form-control" placeholder="Input Tanggal"
                    aria-label="Search" aria-describedby="basic-addon2"
                    @if (isset($_REQUEST['cari1']))
                    value="{{ $_REQUEST['cari1'] }}"
                @endif required>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-secondary">Atur <i class="far fa-calendar-alt"></i></button>
            </div>
        </div>
    </form>

    @if(count($absensi)>0)
    <form method="POST" action="{{ route('absensi.update') }}">
            @csrf
            @method('patch')
            <table class="table data_tables table-hover">
                <thead class="thead-light">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">No. Induk Siswa</th>
                      <th scope="col">Nama Siswa</th>
                      <th scope="col">Nama Kelas</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Edit Absensi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($absensi as $item)
                    <tr>
                        @php
                        if (!isset($_REQUEST['cari1'])) {
                            $tgl = date('Y-m-d');
                        } else {
                            $tgl = date('Y-m-d',strtotime($_REQUEST['cari1']));
                        }
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
                            <input type="hidden" name="id[]" value="{{ $item->id}}">
                            <select name="keterangan[]"class="form-control" >
                            <option value="H" {{ ($item->h) ? "selected":"" }}>H</option>
                            <option value="S" {{ ($item->s) ? "selected":"" }}>S</option>
                            <option value="I" {{ ($item->i) ? "selected":"" }}>I</option>
                            <option value="A" {{ ($item->a) ? "selected":"" }}>A</option>
                            </select>
                        </td>
                    </tr>
                    @endforeach
                <button type="submit" class="btn btn-success mb-3">Simpan <i class="fas fa-share-square"></i></button>
                </tbody>
            </table>
        </form>
    @else
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Anda belum input Absen pada tanggal yang dipilih!</h4>
        <hr>
        <p class="mb-0">Silahkan kembali ke menu Absensi lalu absen terlebih dahulu pada tanggal yang dipilh</p>
      </div>
    @endif
        </tbody>
    </table>
@endsection
