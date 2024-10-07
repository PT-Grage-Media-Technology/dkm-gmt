@extends('admin.layouts.main')
@section('title', 'Input Data')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Pembagian Admin</h2>
        <!-- Button to add assignment -->
        <a href="{{ route('admin.showAssignForm') }}" class="btn btn-primary">Tambah Penugasan</a>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Anggota</th>
                    <th>Lokasi Penugasan</th>
                    <th>Nama Penabung</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($anggotaList as $index => $anggota)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $anggota->nama_lengkap }}</td>
                    <td>
                        @if ($anggota->users->first() && $anggota->users->first()->alamat)
                            {{ $anggota->users->first()->alamat->alamat_lengkap ?? 'Tidak ada' }}<br>
                            RT.{{ $anggota->users->first()->alamat->rt ?? 'Tidak ada' }},
                            RW.{{ $anggota->users->first()->alamat->rw ?? 'Tidak ada' }},
                            Kel.{{ $anggota->users->first()->alamat->kelurahan ?? 'Tidak ada' }},
                            Kab.{{ $anggota->users->first()->alamat->kabupaten ?? 'Tidak ada' }},
                            Kec.{{ $anggota->users->first()->alamat->kecamatan ?? 'Tidak ada' }},
                            Prov.{{ $anggota->users->first()->alamat->provinsi ?? 'Tidak ada' }}
                        @else
                            Tidak ada
                        @endif
                    </td>
                    <td>
                        @foreach ($anggota->users as $user)
                            {{ $user->nama_lengkap }}<br>
                        @endforeach
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data tabungan yang ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
