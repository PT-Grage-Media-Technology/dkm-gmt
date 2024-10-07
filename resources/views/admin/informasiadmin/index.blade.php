@extends('admin.layouts.main')

@section('title', 'Informasi DKM')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Informasi DKM</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

            <div class="form-group">
                <label for="description">Deskripsi DKM</label>
                <textarea class="form-control" id="description" name="description" rows="5" disabled>{{ $ubah->description ?? 'Belum ada deskripsi.' }}</textarea>
            </div>
            <a href="{{ route('info.edit') }}" class="btn btn-primary">Edit Informasi</a>
    </div>
@endsection
