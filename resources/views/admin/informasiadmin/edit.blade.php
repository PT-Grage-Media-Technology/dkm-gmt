@extends('admin.layouts.main')

@section('title', 'Edit Informasi')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Informasi DKM</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('info.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="description">Deskripsi DKM</label>
                <textarea class="form-control" id="description" name="description" rows="5" required>{{ $settingg->description ?? 'Belum ada deskripsi.' }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('info.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
