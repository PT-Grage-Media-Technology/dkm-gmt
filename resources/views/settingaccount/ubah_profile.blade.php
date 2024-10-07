{{-- <style>
    .profile-image-default {

        border-radius: 50%; /* Membuat gambar bulat sempurna */
        object-fit: cover;  /* Memastikan gambar tetap proporsional dan memenuhi container */
        position: relative;
        top: 10px; /* Menyesuaikan posisi vertikal jika diperlukan */
    }
</style> --}}



<div class="profilImg flex flex-col items-center p-4">
    <div class="userImg">
        <div class="cImg w-32 h-32 overflow-hidden rounded-full">
            @if(Auth::user()->profile_user)
                <img id="profileImage" src="{{ asset('storage/profile_user/' . Auth::user()->profile_user . '?' . time()) }}" alt="Profile Image" class="object-cover object-center w-full h-full">
            @else
                <img id="profileImage" src="{{ asset('image/profil-icon2.png') }}" alt="Default Profile Image" class="object-cover object-center rounded-full">
            @endif
        </div>

    </div>
    <div class="chooseImg mt-4">
        <button type="button" class="chooseButton bg-blue-500 text-white py-2 px-4 rounded" onclick="document.getElementById('profileImageInput').click();">Pilih Profil</button>
        <input type="file" id="profileImageInput" name="profile_user" style="display: none;" accept=".jpg,.jpeg,.png" onchange="previewImage(event)">
    </div>
    <div class="warningChsImg mt-2">
        <p class="text-sm text-gray-600">Ekstensi file yang diperbolehkan: JPG, PNG, JPEG</p>
    </div>
    <div class="buttonGroup mt-4 flex space-x-2">
        <button id="saveButton" type="button" style="display:none;" class="bg-green-500 text-white py-2 px-4 rounded" onclick="uploadProfileImage()">Simpan</button>
        <button id="cancelButton" type="button" style="display:none;" class="bg-red-500 text-white py-2 px-4 rounded" onclick="cancelUpload()">Batal</button>
    </div>
    <div id="successMessage" class="mt-2 text-green-500" style="display:none;">Perubahan profil berhasil dilakukan.</div>
</div>

<script>
    let latestImageUrl = '';

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
        const formData = new FormData();
        formData.append('profile_user', file);

        fetch('{{ route("upload.profile.user") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Tampilkan pesan keberhasilan
                document.getElementById('successMessage').style.display = 'block';

                // Sembunyikan tombol simpan dan batal
                document.getElementById('saveButton').style.display = 'none';
                document.getElementById('cancelButton').style.display = 'none';

                // Simpan URL gambar terbaru
                latestImageUrl = '{{ asset('storage/profile_user/') }}/' + data.image_name + '?' + new Date().getTime();
                document.getElementById('profileImage').src = latestImageUrl;
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    function cancelUpload() {
        // Reset input file
        const input = document.getElementById('profileImageInput');
        input.value = ''; // Hapus file yang dipilih

        // Kembalikan gambar ke yang terbaru
        if (latestImageUrl) {
            document.getElementById('profileImage').src = latestImageUrl;
        } else {
            // Jika pengguna belum pernah mengubah profil
            @if(Auth::user()->profile_user)
                document.getElementById('profileImage').src = '{{ asset('storage/profile_user/' . Auth::user()->profile_user . '?' . time()) }}';
            @else
                document.getElementById('profileImage').src = '{{ asset('image/profil-icon2.png') }}';
            @endif
        }

        // Sembunyikan tombol simpan dan batal
        document.getElementById('saveButton').style.display = 'none';
        document.getElementById('cancelButton').style.display = 'none';

        // Sembunyikan pesan keberhasilan
        document.getElementById('successMessage').style.display = 'none';
    }
</script>

