@extends('admin.layouts.main')
@section('title', 'Histori Tabungan')
@section('content')

<div class="container-fluid">
    <div class="row mt-4">
        <div class="col">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center">
                <h4 class="mb-3 mb-sm-0">History Tabungan</h4>
                <div class="d-flex flex-column flex-sm-row">
                    <select id="anggotaSelect" class="form-control mb-2 mb-sm-0 mr-sm-2" onchange="filterTable()">
                        <option value="">Pilih Anggota</option>
                        @foreach ($anggotas as $anggota)
                            <option value="{{ $anggota->id }}">{{ $anggota->nama_lengkap }}</option>
                        @endforeach
                    </select>
                    <select id="userSelect" class="form-control mb-2 mb-sm-0 mr-sm-2" onchange="filterTable()">
                        <option value="">Pilih Pengguna</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                        @endforeach
                    </select>
                    <select id="produkSelect" class="form-control mb-2 mb-sm-0 mr-sm-2" onchange="filterTable()" style="width: 250px;">
                        <option value="">Pilih Kategori Hewan</option>
                        @foreach ($uniqueProduk as $produk)
                            <option value="{{ $produk->id }}">{{ $produk->name }}</option>
                        @endforeach
                    </select>
                    <select id="metodeSelect" class="form-control" onchange="filterTable()">
                        <option value="">Pilih Metode</option>
                        @foreach ($metodeList as $metode)
                            <option value="{{ $metode->id }}">{{ $metode->jenis }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="table-responsive mt-3">
                <div id="noHistoriMessage" class="text-center text-danger" style="{{ $historiTabungan->isEmpty() ? '' : 'display: none;' }}">
                    Belum ada histori tabungan yang masuk.
                </div>
                <div id="noDataMessage" class="text-center text-danger" style="display: none;">
                    Tidak ada data tabungan untuk filter yang dipilih.
                </div>

                @if (!$historiTabungan->isEmpty())
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="white-space: nowrap;">No.</th>
                                <th style="white-space: nowrap;">Nama Anggota</th>
                                <th style="white-space: nowrap;">Nama Penabung</th>
                                <th style="white-space: nowrap;">Metode</th>
                                <th style="white-space: nowrap;">Tabungan</th>
                                <th style="white-space: nowrap;">Sisa Pembayaran</th>
                                <th style="white-space: nowrap;">Sisa Bulan</th>
                                <th style="white-space: nowrap;">Rincian Tanggal Bayar</th>
                                <th style="white-space: nowrap;">Total Bayar</th>
                                <th style="white-space: nowrap;">Bukti Proses Penyetoran</th>
                                <th style="white-space: nowrap;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="historyTableBody">
                            @foreach ($historiTabungan as $index => $tabungan)
                                @php
                                    $sisaPembayaran = $tabungan->tabunganKur->sisaPembayaran();
                                    $isFulfilled = $sisaPembayaran == 0;
                                @endphp
                                <tr data-user-id="{{ $tabungan->user_id }}" data-produk-id="{{ $tabungan->tabunganKur->produk_id }}" data-metode="{{ $tabungan->tabunganKur->metode_id }}" class="{{ $isFulfilled ? 'fulfilled-tabungan' : '' }}">
                                    <td class="no">{{ $index + 1 }}</td>
                                    <td>{{ $tabungan->user->anggota->nama_lengkap }}</td>
                                    <td>{{ $tabungan->user->nama_lengkap }}</td>
                                    <td>{{ $tabungan->tabunganKur->metode->jenis }}</td>
                                    <td>{{ $tabungan->tabunganKur->produk->name }} <br> Rp{{ number_format($tabungan->tabunganKur->produk->price, 2) }}</td>
                                    <td>Rp{{ number_format($sisaPembayaran, 2) }}</td>
                                    <td>{{ $tabungan->sisa_bulan }} bulan</td>
                                    <td>{{ $tabungan->rincian_tanggal_bayar }}</td>
                                    <td>Rp{{ number_format($tabungan->total_bayar, 2) }}</td>
                                    <td>
                                        @if($tabungan->bukti_proses)
                                            <a href="{{ asset('storage/' . $tabungan->bukti_proses) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $tabungan->bukti_proses) }}" alt="Bukti Proses" style="width: 50px; height: 50px;">
                                            </a>
                                        @else
                                            Tidak ada bukti
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" 
                                                @if (!$isFulfilled) disabled @endif
                                                onclick="unduhData('{{ $tabungan->id_tabunganinputs }}')">
                                            Unduh Data
                                        </button>
                                    </td>
                                </tr>
                                @if ($isFulfilled)
                                    <tr data-user-id="{{ $tabungan->user_id }}" data-produk-id="{{ $tabungan->tabunganKur->produk_id }}" class="fulfilled-tabungan-message">
                                        <td colspan="11" class="text-center text-success">
                                            Tabungan untuk {{ $tabungan->user->nama_lengkap }} sudah terpenuhi!
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        filterTable();
    });

    function filterTable() {
        var selectedUser = document.getElementById('userSelect').value;
        var selectedProduk = document.getElementById('produkSelect').value;
        var selectedMetode = document.getElementById('metodeSelect').value;

        var rows = document.querySelectorAll('#historyTableBody tr');
        var no = 1;
        var hasData = false;
        var dataFound = false;

        rows.forEach(function(row) {
            var userId = row.getAttribute('data-user-id');
            var produkId = row.getAttribute('data-produk-id');
            var metode = row.getAttribute('data-metode');

            if ((userId === selectedUser || selectedUser === "") &&
                (produkId === selectedProduk || selectedProduk === "") &&
                (metode === selectedMetode || selectedMetode === "")) {
                row.style.display = '';
                if (!row.classList.contains('fulfilled-tabungan-message')) {
                    row.querySelector('.no').textContent = no++;
                }
                hasData = true;
                if (userId === selectedUser || produkId === selectedProduk || metode === selectedMetode) {
                    dataFound = true;
                }
            } else {
                row.style.display = 'none';
            }
        });

        var filterApplied = selectedUser !== "" || selectedProduk !== "" || selectedMetode !== "";

        document.getElementById('noHistoriMessage').style.display = (filterApplied && !hasData) ? '' : 'none';
        document.getElementById('noDataMessage').style.display = (filterApplied && hasData && !dataFound) ? '' : 'none';
    }

    function unduhData(tabunganId) {
        // console.log(tabunganId);
        var url = '/admin/historitabungan/download/' + tabunganId; // Adjust the route as necessary
        window.location.href = url;
    }
</script>

@endsection
