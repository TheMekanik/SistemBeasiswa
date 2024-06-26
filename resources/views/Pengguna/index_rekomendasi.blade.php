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
              <h1 class="m-0 text-dark">Daftar Rekomendasi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('index_beasiswa') }}">Home</a></li>
                <li class="breadcrumb-item active">Daftar Rekomendasi</li>
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
                <h3 class="card-title">Daftar Pengajuan Rekomendasi</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                @if ($rekomendasis->isEmpty())
                  <div class="card-body">
                    <h3 style="color: red;">Belum ada pengajuan rekomendasi</h3>
                  </div>
                @else
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>NIM</th>
                        <th>Nama Lengkap</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody> 
                      @foreach ($rekomendasis as $rekomendasi)
                      <tr>
                        <td>{{ $rekomendasi->nim_mhs }}</td>
                        <td>{{ $rekomendasi->nama_mhs }}</td>
                        @if ($rekomendasi->is_rekomendasi == true)
                          <td>
                              <button type="button" class="btn btn-success">Disetujui</button>
                          </td>
                          <td>-</td>
                        @else
                          <td>
                              <button type="button" class="btn btn-danger">Belum Disetujui</button>
                          </td>
                          <td>
                            <form action="{{ route('confirm_rekomendasi', $rekomendasi->id) }}" method="post">
                              @csrf
                              <button type="submit" class="btn btn-primary">Approve</button>
                            </form>
                            
                          </td>
                        @endif
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
