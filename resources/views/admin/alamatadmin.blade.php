@extends('admin.layouts.main')
@section('title', 'Alamat Admin')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Keterangan Tempat</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a class="btn btn-primary  text-white" href="{{ route('alamatubah') }}"></i>Edit</a>
            <a href="/settingedit" class="btn btn-secondary">Kembali</a>


            <form>
                <div class="form-group">
                    <label for="alamat_lengkap">Alamat</label>
                    <textarea id="alamat_lengkap" name="alamat_lengkap" rows="5" placeholder="Tambahkan Keterangan Tempat dan Nama Jalan Alamatmu" disabled>{{ $alamat->alamat_lengkap ?? '' }}</textarea>
                </div>

                <div class="form-group row">
                    <div class="col-md-1">
                        <label for="rt">RT</label>
                        <input type="number" id="rt" name="rt" placeholder="RT" value="{{ auth()->guard('lomin')->user()->rt }}" disabled>
                    </div>
                    <div class="col-md-1">
                        <label for="rw">RW</label>
                        <input type="number" id="rw" name="rw" placeholder="RW" value="{{ $alamat->rw ?? '' }}" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="kelurahan">Kelurahan</label>
                    <input type="text" id="kelurahan" name="kelurahan" value="{{ $alamat->kelurahan ?? '' }}" disabled>
                </div>

                <div class="form-group">
                    <label for="kabupaten">Kabupaten/Kota</label>
                    <input type="text" id="kabupaten" name="kabupaten" value="{{ $alamat->kabupaten ?? '' }}" disabled>
                </div>

                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <input type="text" id="kecamatan" name="kecamatan" value="{{ $alamat->kecamatan ?? '' }}" disabled>
                </div>

                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" id="provinsi" name="provinsi" value="{{ $alamat->provinsi ?? '' }}" disabled>
                </div>
            </form>
        </div>

        @endsection
