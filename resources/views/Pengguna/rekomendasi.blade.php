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
              <h1 class="m-0 text-dark">Pengajuan Rekomendasi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('index_beasiswa') }}">Home</a></li>
                <li class="breadcrumb-item active">Pengajuan Rekomendasi</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Pengajuan Rekomendasi</h3>
          </div>
          <div class="card-body">
            @if ($rekomendasis->isEmpty())
              <p>Rekomendasi dibutuhkan untuk mendaftar beasiswa. Silahkan ajukan rekomendasi terlebih dahulu.</p>
              <form action="{{ route('submit_rekomendasi') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary">Ajukan Rekomendasi</button>
              </form>
            @else
              @foreach ($rekomendasis as $rekomendasi)
                @if ($rekomendasi->is_rekomendasi == false)
                  <div class="alert alert-secondary">
                    <h1>Rekomendasi Sedang Diproses</h1>
                  </div>
                @elseif ($rekomendasi->is_rekomendasi == true)
                  <div class="alert alert-success">
                    <h1>Rekomendasi Disetujui</h1>
                  </div>
                @endif
              @endforeach
            @endif
          </div>
          <!-- /.card-body -->
          
        <!-- /.card-footer-->
        </div>
        <!-- /.card -->
      </section>
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
