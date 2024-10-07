@extends('admin.layouts.main')

@section('title', 'Produk Hewan')

@section('content')


<div class="container-fluid">
    <h2>Daftar Produk Hewan</h2><br>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('produkhewan.create') }}" class="btn btn-primary" style="margin-right: 20px;">Tambah Produk</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Berat Produk</th>
                    <th>Gambar Produk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $produkhewan = \App\Models\produkhewan::get();
                @endphp
                @foreach ($produkhewan as $produk)
                    <tr>
                        <td>{{ $produk->id }}</td>
                        <td>{{ $produk->name }}</td>
                        <td>Rp {{ number_format($produk->price, 0, ',', '.') }}</td>
                        <td>{{ $produk->berat }}</td>
                        <td>
                            @if ($produk->image)
                                <img src="{{ asset('storage/' . $produk->image) }}" alt="Produk Image" width="100" class="img-fluid">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('produkhewan.edit', $produk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('produkhewan.destroy', $produk->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</div>

@endsection
