<!DOCTYPE html>
<html lang="en">
  <head>
    @include('Template.head')
    <style>
    .tinjau {
      text-decoration: none;
      padding-block: 5px; 
      padding-inline: 10px;
      border-radius: 8px;
      background-color: #087cfc;
      color: white;
    }

    .tinjau:hover {
      color: #087cfc;
      background-color: white;
      border: 1px solid black;
    }   
  </style>
  </head>
  <body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    @include('Template.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('Template.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Data Mahasiswa</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('index_beasiswa') }}">Home</a></li>
                <li class="breadcrumb-item active">Data Mahasiswa</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Mahasiswa</h3>
              </div>
              <div class="card-body table-responsive p-0">
                @if ($mahasiswas->isEmpty())
                  <div class="card-body">
                    <h3 style="color: red;">Data Mahasiswa Kosong</h3>
                  </div>
                @else
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Nama Lengkap</th>
                        <th>NIM</th>
                        <th>Prodi</th>
                        <th>Angkatan</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tbody> 
                      @foreach ($mahasiswas as $mahasiswa)
                      <tr>
                        <td>{{ $mahasiswa->name }}</td>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>
                            {{ $mahasiswa->prodi }}
                        </td>
                        <td>
                            {{ $mahasiswa->angkatan }}
                        </td>
                        <td>
                            {{ $mahasiswa->email }}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    @include('Template.footer')
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  @include('Template.script')

  </body>
</html>
