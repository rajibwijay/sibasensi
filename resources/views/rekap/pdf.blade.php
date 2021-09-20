<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>RekapPDF {{($absen[0]->kelas->nama_kelas)}} Tanggal {{date('d F Y')}}</title>

</head>
<body onload="window.print();">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title left">DATA ABSENSI SISWA {{$absen[0]->kelas->nama_kelas}}</h4>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">No. Induk</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Tanggal</th>
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
        </div>
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html> 