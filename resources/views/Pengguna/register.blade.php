<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AdminLTE 3 | Registration Page</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/bootstrap/css/bootstrap.min.css') }}">
  <!-- AdminLTE App -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
  <style>
    /* Custom CSS for error message */
    .error-message {
      color: red;
      font-size: 0.875rem; /* 14px */
      margin-top: 0.25rem; /* 4px */
    }
  </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Portal</b>Beasiswa FIK UPNVJ</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Daftar Akun</p>

      <form action="{{ route('saveRegister') }}" method="post" id="registerForm">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" pattern="[A-Za-z\s]+" title="Hanya huruf yang diperbolehkan" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nim" placeholder="NIM" pattern="\d{10}" title="Hanya angka yang diperbolehkan" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-select" aria-label="Default select example" name="prodi" required>
            <option value="" selected disabled>Pilih Program Studi</option>
            <option value="S1 Sistem Informasi">S1 Sistem Informasi</option>
            <option value="S1 Informatika">S1 Informatika</option>
            <option value="D3 Sistem Informasi">D3 Sistem Informasi</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-select" aria-label="Default select example" name="angkatan" required>
            <option value="" selected disabled>Pilih Angkatan</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="date" class="form-control" name="ttl" placeholder="Tanggal Lahir" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required> 
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Retype password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <!-- Error message -->
        <div class="row" style="justify-content: center; align-items: center; height: 100%; text-align: center;">
          <div class="col-12">
            <span id="password-error" class="error-message" style="display: none;">Password tidak cocok.</span>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
        </div>
      </form>

      <a href="{{ route('login') }}" class="text-center">Sudah memiliki akun? Masuk</a>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
<!-- Custom Script -->
<script>
  $(document).ready(function() {
    $('#registerForm').submit(function(event) {
      var password = $('#password').val();
      var confirmPassword = $('#password_confirmation').val();

      if (password !== confirmPassword) {
        $('#password-error').css('display', 'block');
        event.preventDefault(); // Prevent form submission
      } else {
        $('#password-error').css('display', 'none');
      }
    });
  });
</script>
</body>
</html>
