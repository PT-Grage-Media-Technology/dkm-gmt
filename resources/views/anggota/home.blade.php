@extends('anggota.index')
@section('title', 'Homepage Anggota')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a> --}}
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="#pemasukan">Pemasukan</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @if($totalPemasukan)
                                    Rp{{ number_format($totalPemasukan, 2, ',', '.') }}
                                @else
                                    Rp0
                                @endif
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-plus-square fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <a href="#akun">Akun Penabung</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @if($jumlahPenabung)
                                    {{ $jumlahPenabung }} Penabung
                                @else
                                    0 Penabung
                                @endif
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4" id="akun">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Akun Penabung</h6>
                    <div class="dropdown no-arrow">
                        <button type="button">
                            <a href="{{ route('list.penabung') }}" style="color: white; text-decoration: none;">See all</a>
                        </button>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Penabung</th>
                                    <th>Nama Hewan</th>
                                    <th>Sisa Bulan Penabungan</th>
                                    <th>Sisa Tabungan</th>
                                    <th>Status Tabungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    @php
                                        $hasTabungan = false;
                                    @endphp
                                    @forelse ($user->tabunganKur as $tabungan)
                                        @php
                                            $hasTabungan = true;
                                        @endphp
                                        <tr>
                                            <td>{{ $user->nama_lengkap }}</td>
                                            <td>{{ $tabungan->produk->name ?? 'N/A' }}</td>
                                            <td>{{ $tabungan->sisa_bulan }} bulan</td>
                                            <td>Rp{{ number_format($tabungan->sisaPembayaran(), 2) }}</td>
                                            <td>
                                                @if ($tabungan->status_tabungan === 'Proses')
                                                    <button class="btn btn-warning">Proses</button>
                                                @elseif ($tabungan->sisa_bulan === 0)
                                                    <button style="background-color:rgb(255, 128, 128);color: rgb(71, 71, 71)">Selesai</button>
                                                @else
                                                    <button style="background-color:rgb(247, 247, 166); color:rgb(71, 71, 71);">Proses</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <!-- Jika tidak ada tabungan, tetap tampilkan nama penabung -->
                                        @if (!$hasTabungan)
                                            <tr>
                                                <td>{{ $user->nama_lengkap }}</td>
                                                <td style="color: red;">Tidak ada data tabungan</td>
                                                <td style="color: red;">Tidak ada data tabungan</td>
                                                <td style="color: red;">Tidak ada data tabungan</td>
                                                <td style="color: red;">Tidak ada data tabungan</td>
                                            </tr>
                                        @endif
                                    @endforelse
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada penabung</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mb-4" id="pemasukan">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pemasukan</h6>
                    <div class="dropdown no-arrow">
                        <button type="button">
                            <a href="{{ route('historitabungan') }}" style="color: white; text-decoration: none;">See all</a>
                        </button>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Penabung</th>
                                    <th>Nama Hewan</th>
                                    <th>Metode</th>
                                    <th>Harga</th>
                                    <th>Jumlah Cicilan Per Bulan</th>
                                    <th>Total Menabung</th>
                                    <th>Tanggal Bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $hasTransaction = false;
                                @endphp
                                @foreach ($users as $user)
                                    @foreach ($user->tabunganKur as $tabungan)
                                        @php
                                            $latestInput = $tabungan->tabunganInputs->sortByDesc('created_at')->first();
                                            $totalMenabung = $latestInput->total_bayar ?? 0;
                                            $tanggalBayar = $latestInput ? \Carbon\Carbon::parse($latestInput->rincian_tanggal_bayar)->format('d M Y') : 'Belum ada transaksi';

                                            if ($totalMenabung > 0 && $tanggalBayar !== 'Belum ada transaksi') {
                                                $hasTransaction = true;
                                            }
                                        @endphp
                                        @if ($totalMenabung > 0 && $tanggalBayar !== 'Belum ada transaksi')
                                            <tr>
                                                <td>{{ $user->nama_lengkap }}</td>
                                                <td>{{ $tabungan->produk->name ?? 'N/A' }}</td>
                                                <td>{{ $tabungan->metode->jenis ?? 'N/A' }}</td>
                                                <td>Rp{{ number_format($tabungan->produk->price ?? 0, 2) }}</td>
                                                <td>Rp{{ number_format($tabungan->jumlah_cicilan_bulan, 2) }}</td>
                                                <td>Rp{{ number_format($totalMenabung, 2) }}</td>
                                                <td>{{ $tanggalBayar }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                                @if (!$hasTransaction)
                                    <tr>
                                        <td colspan="7" class="text-center">Belum ada pemasukan</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
@endsection
