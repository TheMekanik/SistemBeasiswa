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

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('index_beasiswa') }}">Home</a></li>
              <li class="breadcrumb-item active">Edit Profile</li>
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
                <h3 class="card-title">Edit Profile</h3>
              </div>
                <form action="{{ route('edit_profileMHS', $mahasiswa) }}" method="POST" id="editProfileForm">
                  @method('patch')
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" pattern="[A-Za-z\s]+" title="Hanya huruf yang diperbolehkan" value="{{ $mahasiswa->name }}">
                    </div>
                    <div class="form-group">
                      <label>NIM</label>
                      <br>
                      <input type="text" name="nim" class="form-control" placeholder="NIM" pattern="\d{10}" title="Hanya angka 10 digit yang diperbolehkan" value="{{ $mahasiswa->nim }}">
                    </div>
                    <div class="form-group">
                      <label>Program Studi</label>
                      <select class="form-select" aria-label="Default select example" name="prodi" required value="{{ $mahasiswa->prodi }}">
                        <option value="S1 Sistem Informasi">S1 Sistem Informasi</option>
                        <option value="S1 Informatika">S1 Informatika</option>
                        <option value="D3 Sistem Informasi">D3 Sistem Informasi</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Angkatan</label>
                      <select class="form-select" aria-label="Default select example" name="angkatan" required value="{{ $mahasiswa->angkatan }}">
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="date" name="ttl" class="form-control" value="{{ $mahasiswa->ttl }}">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="image" class="form-control" value="{{ $mahasiswa->email }}" disabled>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Confirm Password</label>
                      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                      <span id="password-error" style="color: red; display: none;">Password tidak sesuai.</span>
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

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('editProfileForm');

    form.addEventListener('submit', function(event) {
      const password = document.querySelector('input[name="password"]').value;
      const passwordConfirmation = document.querySelector('input[name="password_confirmation"]').value;
      const passwordError = document.getElementById('password-error');

      if (password !== passwordConfirmation) {
        passwordError.style.display = 'block';
        event.preventDefault(); // Mencegah pengiriman form
      } else {
        passwordError.style.display = 'none';
      }
    });
  });
</script>
</body>
</html>
