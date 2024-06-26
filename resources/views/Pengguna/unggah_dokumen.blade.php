<!DOCTYPE html>
<html lang="en">
<head>
  @include('Template.head')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />

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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Unggah Dokumen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('index_beasiswa') }}">Home</a></li>
              <li class="breadcrumb-item active">Unggah Dokumen</li>
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
                <h3 class="card-title">Unggah Dokumen</h3>
            </div>
                @if($registrasis->isEmpty())
                    <form action="{{route('upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                        <div class="form-group">
                            <label>Unggah CV</label>
                            <input type="file" name="image_cv" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Unggah Transkrip</label>
                            <input type="file" name="image_transkrip" class="form-control" required>
                        </div>
                        </div>
                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>CV</th>
                                <th>Transkrip</th>
                                <th>Tinjau CV</th>
                                <th>Tinjau Transkrip</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                              $i = 1;
                            @endphp
                            @foreach ($registrasis as $registrasi)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $registrasi->image_cv }}</td>
                                    <td>{{ $registrasi->image_transkrip }}</td>
                                    <td style="text-align: center;">
                                      <a class="tinjau" href="{{ Storage::url($registrasi->image_cv) }}" data-fancybox="gallery" data-caption="CV">Tinjau</a>                                    
                                    </td>
                                    <td style="text-align: center;">
                                      <a class="tinjau" href="{{ Storage::url($registrasi->image_transkrip) }}" data-fancybox="gallery" data-caption="Transkrip">Tinjau</a>
                                    </td>
                                </tr>
                                @php
                                  $i++;
                                @endphp 
                            @endforeach
                                       
                        </tbody>
                    </table>
                @endif
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <aside class="control-sidebar control-sidebar-dark">
    
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
 
  @include('Template.footer')
</div>


<!-- REQUIRED SCRIPTS -->
@include('Template.script')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></1
</body>
</html>
