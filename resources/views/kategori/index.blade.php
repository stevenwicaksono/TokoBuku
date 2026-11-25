@extends('adminlte.layouts.app')
@section('addCss') 
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}"> 
@endsection 
@section('addJavascript')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script> 
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
        <script>
        $(function(){
            $("#data-table").DataTable();
        })
    </script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        function confirmDelete(button) {
            var url = $(button).data('url');

            swal({
                title: 'Konfirmasi Hapus',
                text: 'Apakah kamu yakin ingin menghapus data ini?',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then(function (willDelete) {
                if (willDelete) {
                    window.location.href = url;
                }
            });
        }
    </script>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Kategori</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('createKategori') }}" class="btn btn-primary">
                            <i class="fas fa-plus mr-2"></i>Tambah Kategori
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered" id="data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoris as $kategori)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $kategori->nama_kategori }}</td>
                                <td>{{ $kategori->deskripsi }}</td>
                                <td>                                    
                                        <a href="{{ route('editKategori', ['id' => $kategori->id]) }}"class="btn btn-warning btn-sm">Edit</a>
                                        <a onclick="confirmDelete(this)" data-url="{{ route('deleteKategori', ['id' => $kategori->id]) }}" class="btn btn-danger btn-sm" role="button">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
