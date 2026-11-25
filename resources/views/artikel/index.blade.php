@extends('adminlte.layouts.app')

@section('addCss') 
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}"> 
@endsection 

@section('addJavascript')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script> 
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Ganti SweetAlert -->
<script>
    $(function(){
        $("#data-table").DataTable();
    });

    // SweetAlert2 untuk tombol hapus
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.dataset.id;
                Swal.fire({
                    title: 'Konfirmasi Hapus',
                    text: 'Apakah kamu yakin ingin menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            });
        });
    });
</script>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Artikel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Artikel</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container mt-1">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{ route('createArtikel') }}" class="btn btn-primary">
                        <i class="fas fa-plus mr-2"></i>Tambah Artikel
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Gambar</th>
                                <th>Nama Kategori</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artikels as $artikel)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($artikel->gambar)
                                        <img src="{{ asset('storage/artikels/' . $artikel->gambar) }}" width="100" alt="Gambar Artikel">
                                    @endif
                                </td>
                                <td>{{ $artikel->kategori->nama_kategori ?? 'No Category' }}</td>
                                <td>{{ $artikel->judul }}</td>
                                <td>{{ Str::limit($artikel->deskripsi, 50) }}</td>
                                <td>
                                    <a href="{{ route('editArtikel', $artikel->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form id="delete-form-{{ $artikel->id }}" action="{{ route('deleteArtikel', $artikel->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $artikel->id }}">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
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