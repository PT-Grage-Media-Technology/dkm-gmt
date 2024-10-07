@extends('anggota.index')
@section('title', 'Setting Alamat Anggota')
@section('content')

            <div class="form-container-alamat">
                <div>
                    <h4>Alamat Anggota</h4>
                </div>
                <div class="form-header-alamat">
                    <a href="{{ route('editAlamatAnggota') }}" class="edit-link-alamat">Ubah <img src="{{ asset('image/pencil.png') }}" alt="Edit" class="edit-icon small-icon"></a>
                </div>
                {{-- <form method="POST" action="{{ route('updateAlamatAnggota', $alamatAnggota ? $alamatAnggota->id_alamatanggota : '') }}"> --}}
                    <form>
                    @csrf
                    @method('PUT')
                    <div class="form-group-alamat">
                        <label for="alamat_lengkap">Keterangan Tempat</label>
                        <textarea id="alamat_lengkap" name="alamat_lengkap" rows="5" class="small-input-alamat" placeholder="Tambahkan Keterangan Tempat dan Nama Jalan Alamatmu"{{ $alamatAnggota ? '' : ' disabled' }} disabled>{{ $alamatAnggota ? $alamatAnggota->alamat_lengkap : '' }}</textarea>
                    </div>
                    <div class="form-group-alamat">
                        <label for="rt_rw">RT/RW</label>
                        <div class="rt-rw-inputs">
                            <input type="text" id="rt" name="rt" value="{{ $alamatAnggota ? $alamatAnggota->rt : '' }}" class="small-input-rt-rw" style=" width:20%" placeholder="RT" {{ $alamatAnggota ? '' : ' disabled' }} disabled>
                            <input type="text" id="rw" name="rw" value="{{ $alamatAnggota ? $alamatAnggota->rw : '' }}" class="small-input-rt-rw" style=" width:20%" placeholder="RW" {{ $alamatAnggota ? '' : ' disabled' }} disabled>
                        </div>
                    </div>
                    <div class="form-group-alamat">
                        <label for="kelurahan">Kelurahan</label>
                        <input type="text" id="kelurahan" name="kelurahan" value="{{ $alamatAnggota ? $alamatAnggota->kelurahan : '' }}" class="small-input-alamat" placeholder="Tambahkan Nama Desa atau Kelurahan" {{ $alamatAnggota ? '' : ' disabled' }} disabled>
                    </div>
                    <div class="form-group-alamat">
                        <label for="kabupaten">Kabupaten/Kota</label>
                        <input type="text" id="kabupaten" name="kabupaten" value="{{ $alamatAnggota ? $alamatAnggota->kabupaten : '' }}" class="small-input-alamat" placeholder="Tambahkan Nama Kabupaten atau Kota" {{ $alamatAnggota ? '' : ' disabled' }} disabled>
                    </div>
                    <div class="form-group-alamat">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" id="kecamatan" name="kecamatan" value="{{ $alamatAnggota ? $alamatAnggota->kecamatan : '' }}" class="small-input-alamat" placeholder="Tambahkan Nama Kecamatan" {{ $alamatAnggota ? '' : ' disabled' }} disabled>
                    </div>
                    <div class="form-group-alamat">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" id="provinsi" name="provinsi" value="{{ $alamatAnggota ? $alamatAnggota->provinsi : '' }}" class="small-input-alamat" placeholder="Tambahkan Nama Provinsi" {{ $alamatAnggota ? '' : ' disabled' }} disabled>
                    </div>
                </form>
            </div>
</div>
@endsection
