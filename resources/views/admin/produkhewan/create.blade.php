@extends('admin.layouts.main')
@section('title', 'Data Tabungan')
@section('content')
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Tambah Produk Hewan</h1>
            <div class="row justify-content">
            <div class="col-md-6">
            <form action="{{ route('produkhewan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    <div class="form-group">
        <label for="name">Nama Produk</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="price">Harga Produk</label>
        <input type="number" name="price" id="price" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="berat">Berat</label>
        <input type="text" name="berat" id="berat" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="image">Gambar Produk</label>
        <input type="file" name="image" id="image" class="form-control-file">
        <small class="form-text text-danger">Wajib Di Isi</small>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('produkhewan') }}" class="btn btn-secondary">Kembali</a>
</form>
    </div>
    </div>
@endsection