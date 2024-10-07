@extends('admin.layouts.main')
@section('title', 'Data Tabungan')
@section('content')
    {{-- <div class="container">
        <div class="row mt-4"> --}}
            <div class="container-fluid">
                <h2>Data Input Tabungan</h2>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Penabung</th>
                                <th>Hewan Kurban</th>
                                <th>Metode</th>
                                <th>Awal Waktu Tabungan</th>
                                <th>Target Waktu Tabungan</th>
                                <th>Jumlah Cicilan/Bulan</th>
                                <th>Alamat</th>
                                <th>Persetujuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tabungankur as $data)
                            <tr >
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($data->user)
                                        <p>{{ $data->user->username }}</p> <!-- Display user name -->
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if($data->produk)
                                        <p><b>{{ $data->produk->name }}</b></p>
                                        <p>{{ $data->produk->berat }}</p>
                                        <p>{{ number_format($data->produk->price, 2, ',', '.') }}/Ekor</p>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ $data->metode ? $data->metode->jenis : 'Metode tidak ditemukan' }}</td>
                                <td>{{ $data->awal_waktu_tabungan }}</td>
                                <td>{{ $data->target_waktu_tabungan }}</td>
                                <td>{{ $data->jumlah_cicilan_bulan }}</td>
                                <td>
                                    @if($data->user && $data->user->alamat)
                                        <p>{{ $data->user->alamat->alamat_lengkap }}</p>
                                        <p>RT: {{ $data->user->alamat->rt }} / RW: {{ $data->user->alamat->rw }}</p>
                                        <p>Kelurahan: {{ $data->user->alamat->kelurahan }}</p>
                                        <p>Kecamatan: {{ $data->user->alamat->kecamatan }}</p>
                                        <p>Kabupaten: {{ $data->user->alamat->kabupaten }}</p>
                                        <p>Provinsi: {{ $data->user->alamat->provinsi }}</p>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td id="status-{{ $data->id }}">
                                    @if(is_null($data->status_persetujuan) || $data->status_persetujuan == 'pending')
                                        <a href="/tabungan/approve/{{ $data->id }}" class="btn btn-success btn-sm" >Setuju</a>
                                        <a href="/tabungan/reject/{{ $data->id }}" class="btn btn-danger btn-sm">Tidak Setuju</>
                                    @else
                                        <span class="text-{{ $data->status_persetujuan == 'Disetujui' ? 'success' : 'danger' }}">{{ $data->status_persetujuan }}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @if ($tabungankur->isEmpty())
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data tabungan yang ditemukan.</td>
                            </tr>
                            
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        {{-- </div>
    </div> --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function approve(id) {
    $.ajax({
        url: `/tabungan/approve/${id}`,
        type: 'PATCH',
        data: {
            _token: "{{ csrf_token() }}",
        },
        success: function(response) {
            $('#status-' + id).html('<span class="text-success">Setuju</span>');
        },
        error: function(xhr) {
            alert('Terjadi kesalahan saat memproses permintaan.');
        }
    });
}

function disapprove(id) {
    $.ajax({
        url: `/tabungan/reject/${id}`,
        type: 'PATCH',
        data: {
            _token: "{{ csrf_token() }}",
        },
        success: function(response) {
            $('#status-' + id).html('<span class="text-danger">Tidak Setuju</span>');
        },
        error: function(xhr) {
            alert('Terjadi kesalahan saat memproses permintaan.');
        }
    });
}
</script>
@endsection