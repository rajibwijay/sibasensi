<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <title>@yield('title')</title>

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top ">
    <a class="navbar-brand" href="{{ url('/')}}">SELAMAT DATANG ADMIN ABSENSI |<b>  </b> </a>
    </nav>
    <div class="row no-gutters mt-5 ">
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
            <ul class="nav flex-column">
                <li class="nav-item">
                <a class="nav-link active text-white" href="{{ url('/')}}">
                      <i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('/kelas')}}" >
                      <i class="fas fa-chalkboard-teacher mr-2"></i> Kelas dan Siswa</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="{{ route('absensi.siswa') }}">
                    <i class="far fa-calendar-check mr-2"></i></i> Absensi</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="{{ url('/rekap')}}">
                    <i class="fas fa-book-reader mr-2"></i> Rekap Absen</a><hr class="bg-secondary">
                </li>
                <hr><hr><hr><hr><hr><hr><hr><hr>
              </ul>
        </div>
        <div class="col-md-10 p-5 pt-2">

            @yield('container')

        </div>
    <style>
        .nav-link:hover{
            background-color: gray;
        }
        .navbar-brand{
            font-size: 15pt;
            font-style: bold;
        }
    </style>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
        $('.data_tables').DataTable( {
        "paging":   false,
        "ordering": true,
        "info":     false
            } );
        $('.data_table').DataTable( {
            } );
            } );
    </script>

    @stack('script')
</body>
</html>
