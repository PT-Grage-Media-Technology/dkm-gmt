<div class="profilImg">
    <div class="userImg">
        <div class="profil-ubah">
            @if(Auth::guard('anggota')->user()->profile_anggota)
                <img id="profileImage" src="{{ asset('storage/profile_anggota/' . Auth::guard('anggota')->user()->profile_anggota . '?' . time()) }}" alt="Profile Image" class="object-cover object-center">
            @else
                <img id="current-profile-image" src="{{ asset('image/profil.png') }}" alt="Profile Picture" class="profile-picture">
            @endif
        </div>
    </div>
    <div class="chooseImg">
        <button type="button" class="chooseButton" onclick="document.getElementById('profileImageInput').click();">Pilih Profil</button>
        <input type="file" id="profileImageInput" name="profile_anggota" style="display: none;" accept=".jpg,.jpeg,.png" onchange="previewImage(event)">
    </div>
    <div class="warningChsImg">
        <p>Ekstensi file yang diperbolehkan: JPG, PNG, JPEG</p>
    </div>
    <div class="buttonGroup">
        <button id="saveButton" type="button" style="display:none;" onclick="uploadProfileImage()">Simpan</button>
        <button id="cancelButton" type="button" style="display:none;" onclick="cancelUpload()">Batal</button>
    </div>
    <div id="successMessage" style="display:none;">Perubahan profil berhasil dilakukan.</div>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('profileImage');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);

        // Tampilkan tombol simpan dan batal setelah memilih gambar
        document.getElementById('saveButton').style.display = 'block';
        document.getElementById('cancelButton').style.display = 'block';
    }

    function uploadProfileImage() {
        const input = document.getElementById('profileImageInput');
        const file = input.files[0];

        if (!file) {
            alert('Silakan pilih gambar terlebih dahulu.');
            return;
        }

        const formData = new FormData();
        formData.append('profile_anggota', file);

        fetch('{{ route("uploadProfileAnggota") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('successMessage').style.display = 'block';
                // Sembunyikan tombol simpan dan batal setelah sukses mengunggah
                document.getElementById('saveButton').style.display = 'none';
                document.getElementById('cancelButton').style.display = 'none';

                // Perbarui gambar profil yang ditampilkan
                document.getElementById('profileImage').src = '{{ asset('storage/profile_anggota') }}/' + data.image_name + '?' + new Date().getTime();
            } else {
                alert('Gagal mengunggah gambar: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengunggah gambar');
        });
    }

    function cancelUpload() {
        // Reset input file dan gambar yang ditampilkan
        const input = document.getElementById('profileImageInput');
        input.value = ''; // Hapus file yang dipilih

        // Jika pengguna belum pernah mengubah profil
        @if(Auth::guard('anggota')->user()->profile_anggota)
            document.getElementById('profileImage').src = '{{ asset('storage/profile_anggota/' . Auth::guard('anggota')->user()->profile_anggota . '?' . time()) }}';
        @else
            document.getElementById('profileImage').src = '{{ asset('image/profil.png') }}';
        @endif

        // Sembunyikan tombol simpan dan batal
        document.getElementById('saveButton').style.display = 'none';
        document.getElementById('cancelButton').style.display = 'none';
    }
</script>
