@extends('anggota.index')
@section('title', 'Edit Setting Alamat Anggota')
@section('content')

    <div class="profile" id="alamat">
        <div class="profile-and-form-alamat">
            <div class="form-container-alamat">
                <div>
                    <h2>Edit Alamat Anggota</h2>
                </div>
                <form method="POST" action="{{ $alamatAnggota ? route('updateAlamatAnggota', $alamatAnggota->id_alamatanggota) : route('createAlamatAnggota') }}">
                    @csrf
                    @if($alamatAnggota)
                        @method('PUT')
                    @endif
                    <div class="form-group-alamat">
                        <label for="alamat_lengkap">Keterangan Tempat</label>
                        <textarea id="alamat_lengkap" name="alamat_lengkap" rows="5" class="small-input-alamat" placeholder="Tambahkan Keterangan Tempat dan Nama Jalan Alamatmu">{{ $alamatAnggota ? $alamatAnggota->alamat_lengkap : '' }}</textarea>
                    </div>
                    <div class="form-group-alamat">
                        <label for="rt_rw">RT/RW</label>
                        <div class="rt-rw-inputs">
                            <input type="text" id="rt" name="rt" value="{{ $alamatAnggota ? $alamatAnggota->rt : '' }}" class="small-input-rt-rw" style="width:20%" placeholder="RT">
                            <input type="text" id="rw" name="rw" value="{{ $alamatAnggota ? $alamatAnggota->rw : '' }}" class="small-input-rt-rw" style="width:20%" placeholder="RW">
                        </div>
                    </div>
                    <div class="form-group-alamat">
                        <label for="kelurahan">Kelurahan</label>
                        <input type="text" id="kelurahan" name="kelurahan" value="{{ $alamatAnggota ? $alamatAnggota->kelurahan : '' }}" class="small-input-alamat" placeholder="Tambahkan Nama Desa atau Kelurahan">
                    </div>
                    <div class="form-group-alamat">
                        <label for="kabupaten">Kabupaten/Kota</label>
                        <input type="text" id="kabupaten" name="kabupaten" value="{{ $alamatAnggota ? $alamatAnggota->kabupaten : '' }}" class="small-input-alamat" placeholder="Tambahkan Nama Kabupaten atau Kota">
                    </div>
                    <div class="form-group-alamat">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" id="kecamatan" name="kecamatan" value="{{ $alamatAnggota ? $alamatAnggota->kecamatan : '' }}" class="small-input-alamat" placeholder="Tambahkan Nama Kecamatan">
                    </div>
                    <div class="form-group-alamat">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" id="provinsi" name="provinsi" value="{{ $alamatAnggota ? $alamatAnggota->provinsi : '' }}" class="small-input-alamat" placeholder="Tambahkan Nama Provinsi">
                    </div>
                    <div class="form-buttons">
                        <button type="submit" class="btn btn-primary" style="font-size: 14px;">Simpan</button>
                        <a href="{{ route('settingAlamatAnggota') }}" class="btn btn-secondary" style="font-size: 14px;">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
