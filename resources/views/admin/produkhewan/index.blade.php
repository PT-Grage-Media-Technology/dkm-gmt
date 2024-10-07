@extends('admin.layouts.main')
@section('title', 'Data Tabungan')
@section('content')
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Daftar Produk Hewan</h1>
            <a href="{{ route('produkhewan.create') }}" class="btn btn-primary mb-4">Tambah Produk</a>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        {{-- <th>Berat Produk</th> --}}
                        <th>Gambar Produk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produkhewan as $produk)
                        <tr>
                            <td class="no">{{ $index + 1 }}</td>
                            <td>{{ $produk->name }}</td>
                            <td>{{ $produk->price }}</td>
                            <td>{{ $produk->berat }}</td>
                            <td>
                                @if($produk->image)
                                    <img src="{{ asset('storage/' . $produk->image) }}" alt="Produk Image" width="100">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('produkhewan.edit', $produk->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('produkhewan.destroy', $produk->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
