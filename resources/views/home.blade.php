@extends('adminlte.layouts.app')

@section('content')
<style>
  .opacity-75 {
    opacity: 0.75;
  }
  
  .card {
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
    transition: transform 0.2s ease-in-out;
  }
  
  .card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
  }
  
  .progress {
    height: 10px;
    border-radius: 5px;
  }
  
  .progress-bar {
    border-radius: 5px;
  }
  
  .btn {
    border-radius: 8px;
    font-weight: 500;
  }
  
  .card-header {
    border-radius: 15px 15px 0 0 !important;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Blog : Steven Andrian Pranata Wicaksono</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      
      <!-- Stats Cards Row -->
      <div class="row mb-4">
        <!-- Kategori Card -->
        <div class="col-lg-3 col-6">
          <div class="card" style="background: linear-gradient(135deg, #4ECDC4 0%, #44A08D 100%); color: white; border: none;">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h2 class="font-weight-bold mb-0">10</h2>
                  <p class="mb-0">Kategori</p>
                </div>
                <div>
                  <i class="fas fa-tags fa-2x opacity-75"></i>
                </div>
              </div>
              <div class="mt-3">
                <a href="#" class="text-white text-decoration-none">
                  <small>More info <i class="fas fa-arrow-circle-right"></i></small>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Artikel Card -->
        <div class="col-lg-3 col-6">
          <div class="card" style="background: linear-gradient(135deg, #66BB6A 0%, #43A047 100%); color: white; border: none;">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h2 class="font-weight-bold mb-0">10</h2>
                  <p class="mb-0">Artikel</p>
                </div>
                <div>
                  <i class="fas fa-newspaper fa-2x opacity-75"></i>
                </div>
              </div>
              <div class="mt-3">
                <a href="#" class="text-white text-decoration-none">
                  <small>More info <i class="fas fa-arrow-circle-right"></i></small>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- User Registrations Card -->
        <div class="col-lg-3 col-6">
          <div class="card" style="background: linear-gradient(135deg, #FFB74D 0%, #FF9800 100%); color: white; border: none;">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h2 class="font-weight-bold mb-0">5</h2>
                  <p class="mb-0">User Registrations</p>
                </div>
                <div>
                  <i class="fas fa-user-plus fa-2x opacity-75"></i>
                </div>
              </div>
              <div class="mt-3">
                <a href="#" class="text-white text-decoration-none">
                  <small>More info <i class="fas fa-arrow-circle-right"></i></small>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Unique Visitors Card -->
        <div class="col-lg-3 col-6">
          <div class="card" style="background: linear-gradient(135deg, #EF5350 0%, #D32F2F 100%); color: white; border: none;">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h2 class="font-weight-bold mb-0">12</h2>
                  <p class="mb-0">Unique Visitors</p>
                </div>
                <div>
                  <i class="fas fa-eye fa-2x opacity-75"></i>
                </div>
              </div>
              <div class="mt-3">
                <a href="#" class="text-white text-decoration-none">
                  <small>More info <i class="fas fa-arrow-circle-right"></i></small>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Content Cards Row -->
      <div class="row">
        <!-- Daftar Kategori -->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header" style="background: linear-gradient(135deg, #4ECDC4 0%, #44A08D 100%); color: white; border: none;">
              <h3 class="card-title font-weight-bold">
                <i class="fas fa-list mr-2"></i>
                Daftar Kategori
              </h3>
            </div>
            <div class="card-body">
              <h5 class="font-weight-bold mb-3">Menampilkan daftar kategori blog Gamelab</h5>
              <p class="text-muted mb-4">
                Berisi semua kategori untuk memudahkan mengisi konten artikel pada blog gamelab
              </p>
              <a href="{{ route('daftarKategori') }}" class="btn btn-primary">
                <i class="fas fa-arrow-right mr-1"></i>
                Ke Kategori
              </a>
            </div>
          </div>
        </div>

        <!-- Daftar Artikel -->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header" style="background: linear-gradient(135deg, #42A5F5 0%, #1976D2 100%); color: white; border: none;">
              <h3 class="card-title font-weight-bold">
                <i class="fas fa-newspaper mr-2"></i>
                Daftar Artikel
              </h3>
            </div>
            <div class="card-body">
              <h5 class="font-weight-bold mb-3">Menampilkan daftar artikel blog Gamelab</h5>
              <p class="text-muted mb-4">
                Berisi semua artikel yang memiliki detail konten artikel pada blog gamelab
              </p>
              <a href="{{ route('daftarArtikel') }}" class="btn btn-primary">
                <i class="fas fa-arrow-right mr-1"></i>
                Ke Artikel
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection