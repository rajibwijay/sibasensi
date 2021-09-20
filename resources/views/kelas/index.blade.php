@extends('layout/main')

@section('title','Kelas dan Siswa')

@section('container')
    <h4><i class="fas fa-chalkboard-teacher mr-2"></i><b>KELAS DAN SISWA</b></a><hr class="bg-secondary"></h4>
    <a href="/kelas/create" class="btn btn-info mb-3"><i class="fas fa-plus"></i>  Tambah Kelas</a>
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

        <table class="data_table table table-hover">
            <thead class="thead-light">
            <tr >
                <th scope="col">No</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Wali Kelas</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($kelas as $kls)

                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$kls->nama_kelas}}</td>
                    <td>{{$kls->wali_kelas}}</td>
                    <td>
                        <a href="/kelas/{{$kls->id}}" class="btn btn-info">Lihat Siswa <i class="fas fa-eye"></i></a>
                        <a href="/kelas/{{$kls->id}}/edit" type="submit" class="btn btn-success text-white">Edit <i class="fas fa-edit"></i> </a>
                        <form action="/kelas/{{ $kls->id}}" method="POST" class="d-inline" >
                            @method('delete')
                            @csrf
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
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
                                        <p>Nama Kelas : {{ $kls->nama_kelas }}</p>
                                        <p>Wali Kelas : {{ $kls->wali_kelas }}</p>
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

