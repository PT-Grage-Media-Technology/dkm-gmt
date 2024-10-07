@extends('admin.layouts.main')
@section('title', 'Alamat Admin')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Keterangan Tempat</h1>

            <form action="" method="POST">
                @csrf
                {{-- @if(isset($alamat))
                    @method('POST') --}}
                    {{-- @method('POST')  --}}
                    <input type="hidden" name="id_alamatadmin" value="">
                {{-- @endif --}}

                <div class="form-group">
                    <label for="alamat_lengkap">Alamat</label>
                    <textarea id="alamat_lengkap" name="alamat_lengkap" rows="5" placeholder="Tambahkan Keterangan Tempat dan Nama Jalan Alamatmu"></textarea>
                </div>

                <div class="form-group row">
                    <div class="col-md-1">
                        <label for="rt">RT</label>
                        <input type="number" id="rt" name="rt" placeholder="RT" value="">
                    </div>
                    <div class="col-md-1">
                        <label for="rw">RW</label>
                        <input type="number" id="rw" name="rw" placeholder="RW" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="kelurahan">Kelurahan</label>
                    <input type="text" id="kelurahan" name="kelurahan" placeholder="Tambahkan Nama Desa atau Kelurahan" value="">
                </div>

                <div class="form-group">
                    <label for="kabupaten">Kabupaten/Kota</label>
                    <input type="text" id="kabupaten" name="kabupaten" placeholder="Tambahkan Nama Kabupaten atau Kota" value="">
                </div>

                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <input type="text" id="kecamatan" name="kecamatan" placeholder="Tambahkan Nama Kecamatan" value="">
                </div>

                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" id="provinsi" name="provinsi" placeholder="Tambahkan Nama Provinsi" value="">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

        </div>

        @endsection
