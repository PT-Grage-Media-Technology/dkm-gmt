@extends('anggota.index')
@section('title', 'List Daftar Tabungan User')
@section('content')

<style>
    @media (min-width: 768px) {
        .ml-md-custom {
            margin-left: -330px;
        }
    }
    .file-icon {
        width: 35px;
        height: 35px;
        margin-right: 10px;
    }
    .file-icon.pending {
        opacity: 0.5;
        cursor: not-allowed;
    }
    .file-icon.done {
        cursor: pointer;
        opacity: 1;
    }
</style>

<div class="container-fluid">
    <h4>Daftar Penabung:</h4>
    <div class="row mt-4">
        <div class="col-12">
            <div class="info-box p-4">
                @if($filteredUsers->count() > 0)
                @foreach ($filteredUsers as $user)
                    <div class="user-section mb-4">
                        @foreach ($user->tabungankur as $tabunganKur)
                            @if($tabunganKur->sisaPembayaran() > 0)
                                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                                    <div>
                                        <h5>Nama Penabung: {{ $user->nama_lengkap }}</h5>
                                    </div>
                                    <div class="mt-2 mt-md-0 ml-md-custom">
                                        <h5>Metode: {{ $tabunganKur->metode->jenis ?? 'Tidak tersedia' }}</h5>
                                    </div>
                                    <div class="d-flex align-items-center mt-2 mt-md-0">
                                        @auth('anggota')
                                            @if ($tabunganKur->metode->jenis !== 'Bayar di Tempat')
                                                @if (isset($buktiPembayaran[$tabunganKur->id]) && $buktiPembayaran[$tabunganKur->id]->status === 'done')
                                                    {{-- <img src="{{ asset('image/file.png') }}" alt="Bukti Transaksi Done" class="file-icon done"> --}}
                                                    <a href="{{ route('input-tabungan', ['user' => $user->id, 'tabunganKurId' => $tabunganKur->id]) }}">
                                                        <img src="{{ asset('image/file.png') }}" alt="Input Tabungan" class="file-icon done">
                                                    </a>
                                                @else
                                                    <img src="{{ asset('image/file.png') }}" alt="Bukti Transaksi Belum Ada" class="file-icon pending">
                                                @endif
                                            @else
                                                <a href="{{ route('input-tabungan', ['user' => $user->id, 'tabunganKurId' => $tabunganKur->id]) }}">
                                                    <img src="{{ asset('image/file.png') }}" alt="Input Tabungan" class="file-icon done">
                                                </a>
                                            @endif
                                            <form action="{{ route('kirim-notif-wa') }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                <button type="submit" class="btn btn-link p-0" style="border: none; background: none;">
                                                    <img src="{{ asset('image/whatsapp.png') }}" alt="Kirim Notifikasi" class="file-icon">
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('anggota.login') }}">
                                                <img src="{{ asset('image/file_pending.png') }}" alt="Login Required" class="file-icon pending">
                                            </a>
                                            <a href="{{ route('anggota.login') }}">
                                                <img src="{{ asset('image/whatsapp.png') }}" alt="Login Required" class="file-icon pending">
                                            </a>
                                        @endauth
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <!-- Details Section -->
                                    <div class="col-md-4">
                                        <p><strong>Nama Produk:</strong> {{ $tabunganKur->produk->name }}</p>
                                        <p><strong>Harga:</strong> Rp{{ number_format((float) $tabunganKur->produk->price, 2) }}</p>
                                        <p><strong>Berat:</strong> {{ $tabunganKur->produk->berat }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Awal Waktu Tabungan:</strong> {{ \Carbon\Carbon::parse($tabunganKur->awal_waktu_tabungan)->format('d-m-Y') }}</p>
                                        <p><strong>Target Waktu Tabungan:</strong> {{ $tabunganKur->target_waktu_tabungan }} Bulan</p>
                                        <p><strong>Jumlah Cicilan per Bulan:</strong> {{ number_format($tabunganKur->jumlah_cicilan_bulan,2) }}</p>
                                        <p><strong>Sisa Bulan Cicilan:</strong> {{ $tabunganKur->sisa_bulan }} Bulan</p>
                                        <p><strong>Sisa Pembayaran:</strong> Rp{{ number_format($tabunganKur->sisaPembayaran(), 2) }}</p>
                                        @if ($tabunganKur->metode->jenis !== 'Bayar di Tempat')
                                            <div class="form-group">
                                                <p for="bukti_transaksi"><strong>Bukti Transaksi: </strong></p>
                                                @if (isset($buktiPembayaran[$tabunganKur->id]) && $buktiPembayaran[$tabunganKur->id]->bukti_transaksi)
                                                    <a href="#" data-toggle="modal" data-target="#buktiModal{{ $tabunganKur->id }}">
                                                        {{ $buktiPembayaran[$tabunganKur->id]->id_buktipembayaran }}<img src="{{ asset('storage/' . $buktiPembayaran[$tabunganKur->id]->bukti_transaksi) }}" alt="Bukti Transaksi" class="img-fluid mt-2" style="width: 100px; height: auto;">
                                                        {{-- <img src="{{ asset('storage/' . $buktiPembayaran[$tabunganKur->id]->bukti_transaksi) }}" alt="Bukti Transaksi" class="img-fluid mt-2" style="width: 100px; height: auto;"> --}}
                                                    </a>
                                                    <p style="color: rgb(251, 103, 103)">Klik bukti pembayaran untuk<br>menginputkan data</p>
                                                @else
                                                    <p class="mt-2" style="color: red">Belum Ada Bukti Transaksi</p>
                                                @endif
                                            </div>
                                        @else
                                            {{-- <p><strong>Bukti Transaksi:</strong> Tidak Diperlukan untuk Bayar di Tempat</p> --}}
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Alamat Penabung:</strong></p>
                                        <p>{{ optional($user->alamat)->alamat_lengkap }}, RT {{ optional($user->alamat)->rt }} RW {{ optional($user->alamat)->rw }},
                                            Kelurahan {{ optional($user->alamat)->kelurahan }}, Kecamatan {{ optional($user->alamat)->kecamatan }}, {{ optional($user->alamat)->provinsi }}
                                        </p>
                                    </div>
                                </div>
                                <hr>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            @else
                <p>Tidak ada data penabung yang tersedia.</p>
            @endif
            </div>
        </div>
    </div>
</div>

<!-- Bagian Modal -->
{{-- @foreach ($filteredUsers as $user)
    @foreach ($user->tabungankur as $tabunganKur)
        @if (isset($buktiPembayaran[$tabunganKur->id]))
            <div class="modal fade" id="buktiModal{{ $tabunganKur->id }}" tabindex="-1" role="dialog" aria-labelledby="buktiModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="buktiModalLabel">Bukti Transaksi</h5>
                            <button class="close" data-dismiss="modal" aria-label="Close" style="width: 5rem; background-color: transparent;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @php
                                $bukti = $buktiPembayaran[$tabunganKur->id];
                            @endphp
                            @if($bukti->bukti_transaksi)
                                <img src="{{ asset('storage/' . $bukti->bukti_transaksi) }}" alt="Bukti Transaksi" class="img-fluid mt-2" style="width: 800px; height: auto;">
                                @if($bukti->status === 'done')
                                    <p style="color: green;">Bukti sudah diperiksa pada {{ \Carbon\Carbon::parse($bukti->updated_at)->format('d-m-Y H:i:s') }}</p>
                                    <p style="color: gray;">Status bukti transaksi sudah diperbarui dan tidak bisa diubah lagi.</p>
                                @else
                                    <p style="color: rgb(251, 103, 103)">Klik checkbox di bawah ini untuk menandai bukti transaksi sebagai diperiksa.</p>
                                @endif
                            @else
                                <p>Tidak ada bukti transaksi.</p>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('update-status') }}" method="POST">
                                @csrf
                                @if(isset($bukti) && $bukti)
                                    <input type="hidden" name="id_buktipembayaran" value="{{ $bukti->id_buktipembayaran }}">
                                    <input type="checkbox" name="status" value="done" {{ $bukti->status === 'done' ? 'checked' : '' }}
                                        {{ $bukti->status === 'done' ? 'disabled' : '' }}>
                                    <label for="status"> Tandai sebagai diperiksa</label>
                                @else
                                    <input type="hidden" name="id_buktipembayaran" value="">
                                @endif

                                @if(!isset($bukti) || $bukti->status !== 'done')
                                    <button type="submit" class="btn btn-primary">Update Status</button>
                                @endif
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endforeach --}}

@foreach ($filteredUsers as $user)
    @foreach ($user->tabungankur as $tabunganKur)
        @if (isset($buktiPembayaran[$tabunganKur->id]))
            <div class="modal fade" id="buktiModal{{ $tabunganKur->id }}" tabindex="-1" role="dialog" aria-labelledby="buktiModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="buktiModalLabel">Bukti Transaksi</h5>
                            <button class="close" data-dismiss="modal" aria-label="Close" style="width: 5rem; background-color: transparent;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @php
                                $bukti = $buktiPembayaran[$tabunganKur->id];
                            @endphp
                            @if($bukti->bukti_transaksi)
                                <img src="{{ asset('storage/' . $bukti->bukti_transaksi) }}" alt="Bukti Transaksi" class="img-fluid mt-2" style="width: 800px; height: auto;">
                                @if($bukti->status === 'done' || $bukti->status === 'invalid')
                                    <p style="color: {{ $bukti->status === 'done' ? 'green' : 'red' }};">
                                        Bukti sudah diperiksa dan dinyatakan {{ $bukti->status === 'done' ? 'valid' : 'tidak valid' }} pada {{ \Carbon\Carbon::parse($bukti->updated_at)->format('d-m-Y H:i:s') }}.
                                    </p>
                                    <p style="color: gray;">Status bukti transaksi sudah diperbarui dan tidak bisa diubah lagi.<br>Silahkan langsung inputkan bukti transaksi.</p>
                                @else
                                    <p style="color: rgb(251, 103, 103)">Gunakan checkbox di bawah ini untuk menandai bukti transaksi valid atau tidak valid.</p>
                                @endif
                            @else
                                <p>Tidak ada bukti transaksi.</p>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('update-status') }}" method="POST">
                                @csrf
                                @if(isset($bukti) && $bukti)
                                    <input type="hidden" name="id_buktipembayaran" value="{{ $bukti->id_buktipembayaran }}">

                                    <input type="radio" id='status_done' name="status_done" value="done"
                                            {{ $bukti->status === 'done' ? 'checked' : '' }}
                                            {{ $bukti->status === 'done' || $bukti->status === 'invalid' ? 'disabled' : '' }}>
                                    <label for="status_done"> Tandai sebagai valid</label><br>

                                    <input type="radio" id='status_invalid' name="status_invalid" value="invalid"
                                            {{ $bukti->status === 'invalid' ? 'checked' : '' }}
                                            {{ $bukti->status === 'done' || $bukti->status === 'invalid' ? 'disabled' : '' }}>
                                    <label for="status_invalid"> Tandai sebagai tidak valid</label><br>
                                @else
                                    <input type="hidden" name="id_buktipembayaran" value="">
                                @endif

                                @if(!isset($bukti) || ($bukti->status !== 'done' && $bukti->status !== 'invalid'))
                                    <button type="submit">Update Status</button>
                                @endif
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endforeach


@endsection

@section('scripts')
<script>
    $('#buktiModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var imageSrc = button.data('image');
        var modal = $(this);
        modal.find('.modal-body img').attr('src', imageSrc);
    });

    document.querySelector('input[name="status_done"]').addEventListener('change', function() {
        if (this.checked) {
            document.querySelector('input[name="status_invalid"]').disabled = true;
        } else {
            document.querySelector('input[name="status_invalid"]').disabled = false;
        }
    });

    document.querySelector('input[name="status_invalid"]').addEventListener('change', function() {
        if (this.checked) {
            document.querySelector('input[name="status_done"]').disabled = true;
        } else {
            document.querySelector('input[name="status_done"]').disabled = false;
        }
    });

    document.querySelectorAll('input[type="radio"]').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        // Get all checkboxes
        const checkboxes = document.querySelectorAll('input[type="radio"]');

        // If this checkbox is checked, uncheck all other checkboxes
        if (this.checked) {
            checkboxes.forEach(box => {
                if (box !== this) {
                    box.checked = false;
                }
            });
        }
    });
});
</script>

@endsection
