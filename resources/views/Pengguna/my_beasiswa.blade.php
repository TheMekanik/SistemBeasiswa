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
              <h1 class="m-0 text-dark">Edit Beasiswa</h1>
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
      <div class="content">
        <div class="container-fluid">
          <div class="row">
          <section class="content">
            <!-- Default box -->
            <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    @foreach ($my_beasiswas as $my_beasiswa)
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none">{{ $my_beasiswa->namaBeasiswa }}</h3>
                            <div class="col-12">
                            <img src="{{url('storage/' . $my_beasiswa->image)}}" class="product-image" alt="Product Image">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h3 class="my-3">{{ $my_beasiswa->namaBeasiswa }}</h3>
                            <p>{{ $my_beasiswa->deskripsiBeasiswa }}</p>

                            <hr>
                            <div class="mt-4">
                                <div class="button-container" style="display: flex; flex-direction: row;">
                                    <form action="{{ route('edit_beasiswa', $my_beasiswa->id) }}" method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-primary" style="margin-right: 5px;">Edit</button>
                                    </form>
                                    <form action="{{ route('delete_beasiswa', $my_beasiswa->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
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
                    @endforeach
                </div>
  
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
