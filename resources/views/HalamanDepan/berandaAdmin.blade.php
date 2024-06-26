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
              <h1 class="m-0 text-dark">Halaman Beasiswa</h1>
            </div><!-- /.col -->
            
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="card-group m-auto">
              @foreach ($beasiswas as $beasiswa)
                <div class="card m-3" style="width: 18rem;">
                    <div class="card-body">
                      <img class="card-img-top" src="{{ url('storage/' . $beasiswa->image) }}" alt="Card image cap">
                      <h2 class="card-text">{{ $beasiswa->namaBeasiswa }}</h2>
                      <p class="card-text">{{ $beasiswa->deskripsiBeasiswa }}</p>
                      
                      <form action="{{ route('show_beasiswa', $beasiswa) }}" method="get">
                        <button type="submit" class="btn btn-primary">Detail</button>
                      </form>
                    </div>
                </div>
              @endforeach
            </div>
          </div>
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
