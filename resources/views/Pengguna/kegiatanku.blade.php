<!DOCTYPE html>
<html lang="en">
  <head>
    @include('Template.head')
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
              <h1 class="m-0 text-dark">Kegiatanku</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('index_beasiswa') }}">Home</a></li>
                <li class="breadcrumb-item active">Kegiatanku</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Beasiswaku</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="card-body table-responsive p-0">
                @if ($registrasis->isEmpty())
                <div class="centered-message" style="display: flex; justify-content: center; align-items: center; height: 100%; text-align: center;">
                  <h3 style="color: red;">Kamu belum mendaftar beasiswa</h3>
                </div>
                @else
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Nama Beasiswa</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody> 
                      @foreach ($registrasis as $registrasi)
                      <tr>
                        <td>{{ $registrasi->nama_beasiswa }}</td>
                        <td>{{ $registrasi->created_at }}</td>
                        <td>
                          @if($registrasi->status == 'accepted')
                            <button type="button" class="btn btn-success">Diterima</button>
                          @else
                            <button type="button" class="btn btn-secondary">Dalam Proses</button>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                @endif
              </div>
            </div>
          </div>
        </div>
    </div>

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
