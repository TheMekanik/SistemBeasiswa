<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('Gambar/Logo_upnvj.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Portal Beasiswa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('Gambar/logo_laravel.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @if (Auth::guard('mahasiswa')->check())
          <a href="#" class="d-block">{{ Auth::guard('mahasiswa')->user()->name }}</a>
          @elseif (Auth::guard('user')->check())
          <a href="#" class="d-block">{{ Auth::guard('user')->user()->name }}</a>
          @elseif (Auth::guard('mitra')->check())
          <a href="#" class="d-block">{{ Auth::guard('mitra')->user()->name }}</a>
          @endif
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            

            @php
              $user = Auth::guard('user')->user();
              $mahasiswa = Auth::guard('mahasiswa')->user();
              $mitra = Auth::guard('mitra')->user();
            @endphp     

            @if ($user && $user->level == "admin")
              <li class="nav-item">
                  <a href="{{ route('admin_beasiswa') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Beasiswa</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('index_rekomendasi') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Rekomendasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('show_user') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Mahasiswa</p>
                </a>
              </li>
            @endif
              

            @if ($mahasiswa && $mahasiswa->level == "user")
              <li class="nav-item">
                  <a href="{{ route('index_beasiswa') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Beasiswa</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('show_profileMHS') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('show_rekomendasi') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan Rekomendasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('unggah_dokumen') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unggah Dokumen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('show_kegiatanku') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kegiatanku</p>
                </a>
              </li>
            @endif
            
            @if ($mitra && $mitra->level == "mitra")
              <li class="nav-item">
                  <a href="{{ route('mitra_beasiswa') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Beasiswa</p>
                  </a>
              </li>
              @php
                $beasiswa = \App\Models\Beasiswa::where('mitra_id', $mitra->id)->first();
              @endphp 
              @if(!$beasiswa)
                <li class="nav-item">
                  <a href="{{ route('createBeasiswa') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Input Beasiswa</p>
                  </a>
                </li>
              @else
                <li class="nav-item">
                  <a href="{{ route('my_beasiswa') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Edit Beasiswa</p>
                  </a>
                </li>
              @endif  
              
              <li class="nav-item">
                <a href="{{ route('acc_beasiswa') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Pelamar</p>
                </a>
              </li>
            @endif
          </li>
        

          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>