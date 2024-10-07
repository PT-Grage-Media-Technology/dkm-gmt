@extends('admin.layouts.main')
@section('title', 'Input Data')
@section('content')

<!-- Form untuk menetapkan pengguna ke anggota -->
<form action="{{ route('admin.assignUserToAnggota') }}" method="POST">
    @csrf

    <!-- Pilihan Anggota -->
    <div class="container-fluid">
        <h2>Data Input Tabungan</h2>
        <br>
        <div class="col-md-10">
            <div class="form-group">
                <label for="anggota_id">Pilih Anggota</label>
                <select name="anggota_id" id="anggota_id" class="form-control" onchange="updateUsers(this.value)">
                    <option value="">-- Pilih Anggota --</option>
                    @foreach($anggotas as $anggota)
                        <option value="{{ $anggota->id_anggota }}" {{ $selectedAnggota && $selectedAnggota->id_anggota == $anggota->id_anggota ? 'selected' : '' }}>
                            {{ $anggota->username }} - RT {{ optional($anggota->alamatAnggota)->rt ?? 'N/A' }}, RW {{ optional($anggota->alamatAnggota)->rw ?? 'N/A' }}, Kelurahan {{ optional($anggota->alamatAnggota)->kelurahan ?? 'N/A' }}
                        </option>
                    @endforeach
                </select>
            </div>

            @if($selectedAnggota && $assignedUsersCount >= 5)
                <div class="alert alert-warning">
                    Anggota ini sudah memiliki {{ $assignedUsersCount }} pengguna yang ditetapkan. Maksimal 5 pengguna dapat ditetapkan ke setiap anggota.
                </div>
            @elseif($selectedAnggota)
                <div class="alert alert-info">
                    Anggota saat ini memiliki {{ $assignedUsersCount }} pengguna yang ditetapkan. Anda dapat menambahkan hingga {{ 5 - $assignedUsersCount }} pengguna lagi.
                </div>
            @endif

            <!-- Pilihan Pengguna -->
            <div class="form-group">
                <label for="user_id">Pilih Pengguna</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->username }} - RT: {{ optional($user->alamat)->rt ?? 'N/A' }}, RW {{ optional($user->alamat)->rw ?? 'N/A' }}, Kelurahan {{ optional($user->alamat)->kelurahan ?? 'N/A' }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" {{ $selectedAnggota && $assignedUsersCount >= 5 ? 'disabled' : '' }}>Simpan</button>
                <a href="{{ route('pembin') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</form>

<script>
    function updateUsers(anggotaId) {
        window.location.href = `{{ route('admin.showAssignForm') }}?anggota_id=${anggotaId}`;
    }
</script>

@endsection
