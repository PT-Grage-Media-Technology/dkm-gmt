@extends('admin.layouts.main')
@section('title', 'Edit Alamat Admin')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Keterangan Tempat</h1>

            <form action="{{ route('alamatadmin.storeOrUpdate') }}" method="POST">
                @csrf
                @if(isset($alamat))
                    @method('POST')
                    <input type="hidden" name="id_alamatadmin" value="{{ $alamat->id_alamatadmin }}">
                @endif

                <div class="form-group">
                    <label for="alamat_lengkap">Alamat</label>
                    <textarea id="alamat_lengkap" name="alamat_lengkap" rows="5" placeholder="Tambahkan Keterangan Tempat dan Nama Jalan Alamatmu">{{ old('alamat_lengkap', $alamat->alamat_lengkap ?? '') }}</textarea>
                </div>

                <div class="form-group row">
                    <div class="col-md-1">
                        <label for="rt">RT</label>
                        <input type="number" id="rt" name="rt" placeholder="RT" value="{{ old('rt', $alamat->rt ?? '') }}">
                    </div>
                    <div class="col-md-1">
                        <label for="rw">RW</label>
                        <input type="number" id="rw" name="rw" placeholder="RW" value="{{ old('alamat_lengkap', $alamat->alamat_lengkap ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="kelurahan">Kelurahan</label>
                    <input type="text" id="kelurahan" name="kelurahan" placeholder="Tambahkan Nama Desa atau Kelurahan" value="{{ old('kelurahan', $alamat->kelurahan ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="kabupaten">Kabupaten/Kota</label>
                    <input type="text" id="kabupaten" name="kabupaten" placeholder="Tambahkan Nama Kabupaten atau Kota" value="{{ old('kabupaten', $alamat->kabupaten ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <input type="text" id="kecamatan" name="kecamatan" placeholder="Tambahkan Nama Kecamatan" value="{{ old('kecamatan', $alamat->kecamatan ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" id="provinsi" name="provinsi" placeholder="Tambahkan Nama Provinsi" value="{{ old('provinsi', $alamat->provinsi ?? '') }}">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/settingedit" class="btn btn-secondary">Kembali</a>
            </form>

        </div>

        @endsection
