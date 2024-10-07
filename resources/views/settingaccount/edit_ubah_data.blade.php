<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/settings/ubahData.css') }}">
</head>
<body>

<div class="container-data">
    <span class="close-btn-data">&times;</span>
    {{-- <form action="{{ route('ubahData', $user->id) }}"> --}}
    <form action="{{ route('ubahData') }}" method="POST">
        @csrf
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Tambahkan Username" value="{{ $user->username ?? '' }}">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Tambahkan Email" value="{{ $user->email ?? '' }}">

        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="{{ $user->nama_lengkap ?? '' }}">

        <label for="telepon">No Telepon:</label>
        <input type="number" id="no_telepon" name="no_telepon" placeholder="No Telepon" value="{{ $user->no_telepon ?? '' }}">

        <button type="submit" style="margin-top: 1rem;">Simpan</button>
    </form>
</div>

<script>
    document.querySelector('.close-btn-data').addEventListener('click', function() {
        // document.querySelector('.container-data').style.display = 'none';
        window.location.href = "{{ route('settingAkun') }}";
    });
</script>
</body>
</html>

