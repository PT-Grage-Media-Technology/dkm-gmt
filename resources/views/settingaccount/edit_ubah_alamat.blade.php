<div class="container-alamat">
    <span class="close-btn" style="right: 10px; position: absolute; font-size: 24px;">&times;</span>
    <form action="{{ route('storeOrUpdateAlamat', $alamat->id_alamat ?? null) }}" method="POST">
        @csrf
        @if(isset($alamat))
            @method('PUT')
        @endif

        <label for="alamat_lengkap">Keterangan Tempat</label>
        <textarea id="alamat_lengkap" name="alamat_lengkap" rows="5" placeholder="Tambahkan Keterangan Tempat dan Nama Jalan Alamatmu">{{ auth()->user()->alamat ? auth()->user()->alamat->alamat_lengkap : '' }}</textarea>

        <label for="rt">RT/RW</label><br>
        <input type="number" id="rt" placeholder="RT" name="rt" value="{{ auth()->user()->alamat ? auth()->user()->alamat->rt : '' }}" >
        <input type="number" id="rw" placeholder="RW" name="rw" value="{{ auth()->user()->alamat ? auth()->user()->alamat->rw : '' }}" ><br>

        <label for="kelurahan">Kelurahan</label>
        <input type="text" id="kelurahan" name="kelurahan" placeholder="Tambahkan Nama Desa atau Kelurahan" value="{{ auth()->user()->alamat ? auth()->user()->alamat->kelurahan : '' }}">

        <label for="kabupaten">Kabupaten/Kota</label>
        <input type="text" id="kabupaten" name="kabupaten" placeholder="Tambahkan Nama Kabupaten atau Kota" value="{{ auth()->user()->alamat ? auth()->user()->alamat->kabupaten : '' }}">

        <label for="kecamatan">Kecamatan</label>
        <input type="text" id="kecamatan" name="kecamatan" placeholder="Tambahkan Nama Kecamatan" value="{{ auth()->user()->alamat ? auth()->user()->alamat->kecamatan : '' }}">

        <label for="provinsi">Provinsi</label>
        <input type="text" id="provinsi" name="provinsi" placeholder="Tambahkan Nama Provinsi" value="{{ auth()->user()->alamat ? auth()->user()->alamat->provinsi : '' }}">

        <button type="submit">Simpan</button>
    </form>
</div>
