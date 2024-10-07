<div class="profile" id="data-peserta">
    <div class="profile-and-form flex flex-col lg:flex-row">
        <!-- Profile Info -->
        <div class="profile-info w-full lg:w-1/2 p-4">
            @include('settingaccount.ubah_profile')
        </div>
        <!-- Form Container -->
        <div class="form-container w-full lg:w-1/2 p-4">
            <div class="form-header flex justify-between items-center">
                <h2>Ubah Data Peserta</h2>
                <a href="#" id="edit-data-link" class="edit-link flex items-center">Ubah <img src="{{ asset('image/pencil.png') }}" alt="Edit" class="edit-icon ml-2"></a>
            </div>
            <form>
                <label for="username">Username:</label>
                <input type="text" name="username" placeholder="Tambahkan Username" value="{{ $user->username ?? '' }}" disabled class="w-full p-2 mt-2 border rounded">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Tambahkan Email" value="{{ $user->email ?? '' }}" disabled class="w-full p-2 mt-2 border rounded">

                <label for="fullname">Nama Lengkap:</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Tambahkan Nama Lengkap" value="{{ $user->nama_lengkap ?? '' }}" disabled class="w-full p-2 mt-2 border rounded">

                <label for="phone">No Telepon:</label>
                <input type="text" id="no_telepon" name="no_telepon" placeholder="Tambahkan No Telepon" value="{{ $user->no_telepon ?? '' }}" disabled class="w-full p-2 mt-2 border rounded">
            </form>
        </div>
    </div>
</div>
