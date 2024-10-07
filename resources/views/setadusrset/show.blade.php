@extends('admin.layouts.main')
@section('title', 'Setting pada Admin')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="form-container">
        @if ($setadusrset)
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group text-center">
                    <img src="{{ asset('storage/' . $setadusrset->logo) }}" class="img-profile" style="max-width: 200px; height: auto;" alt="Logo">
                </div>
                <div class="form-group">
                    <label for="nama">Nama DKM</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $setadusrset->nama }}" readonly>
                </div>
                <a class="btn btn-primary text-white" href="{{ route('setadusr.create') }}">Edit</a>
            </form>
        @else
            <p>Tidak ada data yang ditemukan, silakan input data terlebih dahulu.</p>
        @endif
    </div>
</div>
@endsection
