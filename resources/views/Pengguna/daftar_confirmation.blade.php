<!DOCTYPE html>
<html lang="en">
<head>
  @include('Template.head')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
  @include('Template.navbar')
  
  @include('Template.sidebar')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Konfirmasi Pendaftaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Konfirmasi Pendaftaran</li>
            </ol>
          </div>
        </div>
      </div>
    </div>


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Konfirmasi Pendaftaran</h3>
              </div>
                <form action="{{ route('submit_registrasi', $beasiswa) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @foreach ($mahasiswas as $mahasiswa)
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $mahasiswa->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>NIM</label>
                            <br>
                            <input type="text" name="nim" class="form-control"  value="{{ $mahasiswa->nim }}" disabled>
                        </div>
                        
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="ttl" class="form-control" value="{{ $mahasiswa->ttl }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="image" class="form-control" value="{{ $mahasiswa->email }}" disabled>
                    </div>
                  @endforeach
                  @foreach ($dokumens as $dokumen)
                    <label>CV</label>
                    <div class="form-group">
                        <a class="tinjau" href="{{ Storage::url($dokumen->image_cv) }}" data-fancybox="gallery" data-caption="CV">Tinjau CV</a> 
                    </div>
                    <label>Transkrip</label>
                    <div class="form-group">
                        <a class="tinjau" href="{{ Storage::url($dokumen->image_transkrip) }}" data-fancybox="gallery" data-caption="CV">Tinjau Transkrip</a> 
                    </div> 
                  @endforeach
                  @if ($dokumens->isEmpty() || ($dokumens->first()->image_cv == null && $dokumens->first()->image_transkrip == null))
                    <button type="button" class="btn btn-danger">Anda Belum Mengupload CV & Transkrip</button>
                  @else
                    <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
                  @endif        
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
