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
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('index_beasiswa') }}">Home</a></li>
                <li class="breadcrumb-item active">Detail Beasiswa</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
          <section class="content">
            <!-- Default box -->
            <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">{{ $beasiswa->namaBeasiswa }}</h3>
                    <div class="col-12">
                      <img src="{{url('storage/' . $beasiswa->image)}}" class="product-image" alt="Product Image">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{ $beasiswa->namaBeasiswa }}</h3>
                    <p>{{ $beasiswa->deskripsiBeasiswa }}</p>
                    <p class="card-text">Mulai: {{ $beasiswa->oprecStart }}</p>
                    <p class="card-text">Berakhir: {{ $beasiswa->oprecEnd }}</p>
                    <hr>
                    <div class="mt-4">
                      @php
                        $mahasiswa = Auth::guard('mahasiswa')->user();
                      @endphp 
                      @if ($mahasiswa && $mahasiswa->level == "user")
                        @if($rekomendasi)
                          @if($registrasis)
                            @if($registrasis->status == 'accepted') 
                              <button type="button" class="btn btn-success">Anda Sudah Mendaftar Beasiswa Ini</button>
                            @elseif($registrasis->status == "pending")
                              <button type="button" class="btn btn-secondary">Sedang Diproses</button>
                            @else
                              <button type="submit" class="btn btn-primary"><a href="{{ route('daftar_confirmation', $beasiswa) }}" style="color: white; text-decoration: none;">Daftar</a></button>
                            @endif
                          @else
                            <button type="submit" class="btn btn-primary"><a href="{{ route('daftar_confirmation', $beasiswa) }}" style="color: white; text-decoration: none;">Daftar</a></button>
                          @endif
                        @else
                          <button type="button" class="btn btn-danger">Anda Belum Memiliki Rekomendasi</button>
                        @endif
                      @endif
                    </div>

                    <div class="mt-4 product-share">
                    <a href="#" class="text-gray">
                        <i class="fab fa-facebook-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fab fa-twitter-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-envelope-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-rss-square fa-2x"></i>
                    </a>
                    </div>

                </div>
                </div>
                <div class="row mt-4">
            </div>
            </div>
        </section>
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
