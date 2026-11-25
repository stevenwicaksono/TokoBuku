@extends('adminlte.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Artikel</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Artikel</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
<div class="content">
  <div class="container mt-5">
    <div class="card border-0 shadow-sm rounded">
      <div class="card-body">
        <form action="{{ route('storeArtikel') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <!-- Kategori -->
<div class="content">
    <div class="container mt-5">
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
                <form action="{{ route('storeArtikel') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Kategori -->
                    <div class="form-group">
                        <label for="id_kategori">Nama Kategori</label>
                        <select class="form-control" name="id_kategori" id="id_kategori" required>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Gambar -->
                    <div class="form-group">
                        <label class="font-weight-bold">GAMBAR</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                        @error('gambar')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Judul -->
                    <div class="form-group">
                        <label class="font-weight-bold">JUDUL</label>
                        <input type="text" 
                               class="form-control @error('judul') is-invalid @enderror" 
                               name="judul" 
                               value="{{ old('judul') }}" 
                               placeholder="Masukkan Judul Artikel">
                        @error('judul')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Konten -->
                    <div class="form-group">
                        <label class="font-weight-bold">KONTEN</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                  name="deskripsi" 
                                  rows="5" 
                                  placeholder="Masukkan deskripsi Artikel">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol -->
                    <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
 <script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/classic/ckeditor.js"></script>
 <script> CKEDITOR.replace( 'deskripsi' );
 </script>
@endsection