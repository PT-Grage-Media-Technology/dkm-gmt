<div class="profile" id="alamat">
    <div class="profile-and-form-alamat">
        <!-- Form Container -->
        <div class="form-container-alamat">
            <div class="form-header-alamat">
                <h2>Alamat</h2>
                <a href="#" id="edit-alamat-link" class="edit-link" data-id="{{ optional(auth()->user()->alamat)->id_alamat ?? '' }}">Ubah <img src="{{ asset('image/pencil.png') }}" alt="Edit" class="edit-icon"></a>
            </div>
            <form>
                <label for="alamat_lengkap">Keterangan Tempat</label>
                <textarea id="alamat_lengkap" name="alamat_lengkap" rows="5" placeholder="Tambahkan Keterangan Tempat dan Nama Jalan Alamatmu" disabled>{{ auth()->user()->alamat ? auth()->user()->alamat->alamat_lengkap : '' }}</textarea>

                <label for="rt">RT/RW</label>
                <input type="number" id="rt" name="rt" placeholder="RT" value="{{ auth()->user()->alamat ? auth()->user()->alamat->rt : '' }}" disabled>
                <input type="number" id="rw" name="rw" placeholder="RW" value="{{ auth()->user()->alamat ? auth()->user()->alamat->rw : '' }}" disabled>

                <label for="kelurahan">Kelurahan</label>
                <input type="text" id="kelurahan" name="kelurahan" placeholder="Tambahkan Nama Desa atau Kelurahan" value="{{ auth()->user()->alamat ? auth()->user()->alamat->kelurahan : '' }}" disabled>

                <label for="kabupaten">Kabupaten/Kota</label>
                <input type="text" id="kabupaten" name="kabupaten" placeholder="Tambahkan Nama Kabupaten atau Kota" value="{{ auth()->user()->alamat ? auth()->user()->alamat->kabupaten : '' }}" disabled>

                <label for="kecamatan">Kecamatan</label>
                <input type="text" id="kecamatan" name="kecamatan" placeholder="Tambahkan Nama Kecamatan" value="{{ auth()->user()->alamat ? auth()->user()->alamat->kecamatan : '' }}" disabled>

                <label for="provinsi">Provinsi</label>
                <input type="text" id="provinsi" name="provinsi" placeholder="Tambahkan Nama Provinsi" value="{{ auth()->user()->alamat ? auth()->user()->alamat->provinsi : '' }}" disabled>
            </form>
        </div>
    </div>
</div>
