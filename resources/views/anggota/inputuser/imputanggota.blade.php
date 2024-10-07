@extends('anggota.index')
@section('title', 'Input Anggota Anggota')
@section('content')

    <form action="{{ route('admin.assignUserToAnggota') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="anggota_id">Pilih Anggota</label>
            <select name="anggota_id" id="anggota_id" class="form-control" onchange="updateUsers(this.value)">
                <option value="">-- Pilih Anggota --</option>
                @foreach($anggotas as $anggota)
                    <option value="{{ $anggota->id_anggota }}" {{ $selectedAnggota && $selectedAnggota->id_anggota == $anggota->id_anggota ? 'selected' : '' }}>
                        {{ $anggota->username }} - RT {{ optional($anggota->alamatAnggota)->rt ?? 'N/A' }} RW {{ optional($anggota->alamatAnggota)->rw ?? 'N/A' }} Kelurahan {{ optional($anggota->alamatAnggota)->kelurahan ?? 'N/A' }}
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
                Anggota ini saat ini memiliki {{ $assignedUsersCount }} pengguna yang ditetapkan. Anda dapat menambahkan hingga {{ 5 - $assignedUsersCount }} pengguna lagi.
            </div>
        @endif

        <!-- Pilihan Pengguna -->
        <div class="form-group">
            <label for="user_id">Pilih Pengguna</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->username }} - RT {{ optional($user->alamat)->rt ?? 'N/A' }} RW {{ optional($user->alamat)->rw ?? 'N/A' }} Kelurahan {{ optional($user->alamat)->kelurahan ?? 'N/A' }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary" {{ $selectedAnggota && $assignedUsersCount >= 5 ? 'disabled' : '' }}>Assign</button>
    </form>
</div>

<script>
    function updateUsers(anggotaId) {
        window.location.href = `{{ route('admin.showAssignForm') }}?anggota_id=${anggotaId}`;
    }
</script>

@endsection
