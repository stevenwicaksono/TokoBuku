@extends('adminlte.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1 class="m-0">Edit Artikel</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('daftarArtikel') }}">Daftar Artikel</a></li>
                        <li class="breadcrumb-item active">Edit Artikel</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container mt-5">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('updateArtikel', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="id_kategori">Nama Kategori</label>
                            <select class="form-control" name="id_kategori" id="id_kategori" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ $artikel->id_kategori == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->deskripsi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="gambar">GAMBAR</label><br>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar">
                            @error('gambar')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="judul">JUDUL</label>
                            <input type="text" 
                                   class="form-control @error('judul') is-invalid @enderror" 
                                   name="judul" 
                                   id="judul"
                                   value="{{ old('judul', $artikel->judul) }}" 
                                   placeholder="Masukkan Judul Artikel" 
                                   required>
                            @error('judul')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="deskripsi">DESKRIPSI</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
          name="deskripsi" 
          id="deskripsi"
          rows="5" 
          placeholder="Masukkan deskripsi Artikel" 
          required>{{ old('deskripsi', strip_tags($artikel->deskripsi)) }}
        </textarea>
                            @error('deskripsi')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-success">SIMPAN</button>
                        <a href="{{ route('daftarArtikel') }}" class="btn btn-md btn-secondary">BATAL</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
