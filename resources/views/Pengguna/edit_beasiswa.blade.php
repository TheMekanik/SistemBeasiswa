<!DOCTYPE html>
<html lang="en">
<head>
  @include('Template.head')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('Template.navbar')
  
  @include('Template.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Input Beasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('index_beasiswa') }}">Home</a></li>
              <li class="breadcrumb-item active">Edit Beasiswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Beasiswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update_beasiswa', $beasiswa) }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Beasiswa</label>
                    <input type="text" name="namaBeasiswa" class="form-control" placeholder="Nama Beasiswa" value="{{ $beasiswa->namaBeasiswa }}">
                  </div>
                  <div class="form-group">
                    <label>Deskripsi Beasiswa</label>
                    <br>
                    <textarea name="deskripsiBeasiswa" placeholder="Deskripsi Beasiswa" style="width: 500px;" value="{{ $beasiswa->deskripsiBeasiswa }}"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Link Pendaftaran</label>
                    <input type="text" name="linkPendaftaran" class="form-control" placeholder="Link Pendaftaran" value="{{ $beasiswa->linkPendaftaran }}">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Dibuka</label>
                    <input type="date" name="oprecStart" class="form-control" value="{{ $beasiswa->oprecStart }}">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Ditutup</label>
                    <input type="date" name="oprecEnd" class="form-control" value="{{ $beasiswa->oprecEnd }}">
                  </div>
                  <div class="form-group">
                    <label>Input Gambar</label>
                    <input type="file" name="image" class="form-control">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
