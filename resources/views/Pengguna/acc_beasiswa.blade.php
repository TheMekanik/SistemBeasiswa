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
              <h1 class="m-0 text-dark">Daftar Pendaftar Beasiswa</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('index_beasiswa') }}">Home</a></li>
                <li class="breadcrumb-item active">Daftar Pendaftar Beasiswa</li>
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
                <h3 class="card-title">Daftar Pendaftar Beasiswa</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                @if ($pelamars->isEmpty())
                  <div class="card-body">
                    <h3 style="color: red;">Belum ada pendaftar beasiswa</h3>
                  </div>
                @else
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>NIM</th>        
                        <th>Nama Lengkap</th>
                        <th>CV</th>
                        <th>Transkrip</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody> 
                      @foreach ($pelamars as $pelamar)
                      <tr>
                        <td>{{ $pelamar->nim_mhs }}</td>
                        <td>{{ $pelamar->nama_mhs }}</td>
                        <td>
                            <a class="tinjau" href="{{ Storage::url($pelamar->image_cv) }}" data-fancybox="gallery" data-caption="CV">Tinjau CV</a> 
                        </td>
                        <td>
                            <a class="tinjau" href="{{ Storage::url($pelamar->image_transkrip) }}" data-fancybox="gallery" data-caption="CV">Tinjau Transkrip</a> 
                        </td>
                        <td>{{ $pelamar->status }}</td>
                        @if ($pelamar->status == 'accepted')
                          <td>
                              <button type="button" class="btn btn-success">Disetujui</button>
                          </td>
                          <td>-</td>
                        @else
                          <td>
                              <button type="button" class="btn btn-danger">Belum Disetujui</button>
                          </td>
                          <td>
                            <form action="{{ route('confirm_beasiswa', $pelamar->id) }}" method="post">
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
