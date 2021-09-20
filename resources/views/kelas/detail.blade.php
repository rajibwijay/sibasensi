@extends('layout/main')

@section('title','Detail Siswa')

@section('container')

    <h4><i class="fas fa-chalkboard-teacher mr-2">
        </i><b>DETAIL SISWA</b></a><hr class="bg-secondary"></h4>
    <h6><i class="fas mr-2"></i>
        <b>NAMA KELAS : {{$kelas->nama_kelas}}</b><hr></h4>
    <h6><i class="fas mr-2"></i>
        <b>WALI KELAS : {{$kelas->wali_kelas}}</b><hr></h6>
        <thead class="thead-light">
            <a href="/kelas/siswa/create/{{$kelas->id}}" class="btn btn-info mb-3 ">
                <i class="fas fa-plus"></i> Tambah Siswa</a>
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
        <table class="data_tables table table-hover">
            <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">No. Induk Siswa</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($kelas->siswa as $siswa)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$siswa->nama_siswa}}</td>
                        <td>{{$siswa->nis}}</td>
                        <td>
                            <a href="{{ route('siswa.edit', $siswa->id) }}" type="submit" class="btn btn-sm btn-success">Edit</a>
                            <form action="{{ route('siswa.delete', $siswa->id) }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
                                    Hapus <i class='fa fa-times-circle'></i>
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Nama Siswa : {{ $siswa->nama_siswa }}</p>
                                            <p>No.induk   : {{ $siswa->nis }}</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                          <button type="submit" class="btn btn-danger">Ya</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

@endsection
