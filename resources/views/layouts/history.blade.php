@extends('user.layouts.main')
@section('title', 'Notifikasi')

@section('content')
<section class="space-y-8">
    <br><br>
    @php
    $produkId = request()->query('produk_id');
    @endphp
    <div class="overflow-x-auto p-2 max-w-2xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold text-black mb-4 text-center">
            Rincian Tabungan
        </h2>
<<<<<<< HEAD
    </div>

    <div class="overflow-x-auto p-4 flex items-center justify-end space-x-4 max-w-4xl mx-auto text-right">
        <form action="{{ route('notifikasi.rincian.history') }}" method="GET" class="flex items-center space-x-2 w-auto max-w-md ml-5">
            <div class="overflow-x-auto relative flex-grow">
                <select id="produk_id" name="produk_id" class="block bg-gray-100 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Semua Produk</option>
                    @foreach($produkList as $produk)
                        <option value="{{ $produk->id }}" {{ $produkId == $produk->id ? 'selected' : '' }}>{{ $produk->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="px-2 py-2 bg-blue-400 text-white rounded-md hover:bg-blue-600 w-auto">
                Filter
            </button>
        </form>
    </div>


    @php
    $tabungankur = \App\Models\Tabungankur::where('user_id', auth()->id())
        ->with(['produk', 'metode']) // Make sure the 'metode' relation is loaded
        ->get()
        ->map(function ($item) {
        $item->bukti_pembayaran_invalid = $item->checkIfPaymentInvalid(); // Custom method
        return $item;
        });
    @endphp

<div class="container mx-auto px-4">
    <div class="flex flex-wrap justify-center gap-y-8 gap-x-7">
        @forelse($filteredTabunganInputs as $item)
        <!-- Each card -->
        <div class="p-4 bg-white shadow-md rounded-[10px] min-h-[350px] w-[350px]">
            <div class="w-full rounded-[5px] overflow-hidden relative">
                <div class="w-full h-[220px]">
                    <img src="{{ asset('storage/' . $item->produk->image) }}" alt="" class="w-full h-full object-cover mb-2 rounded">
                </div>

                @if($item->status_persetujuan == 'Tidak Disetujui')
                    <!-- Nama Produk dan Status Persetujuan -->
                    <div class="flex items-center justify-between mb-2">
                        <h2 class="text-lg font-semibold">{{ $item->produk->name }}</h2>
                        <p class="text-base text-red-600 font-medium">Tidak Disetujui</p>
                    </div>

                    <!-- Note Jika Tidak Disetujui -->
                    <div class="mt-2 p-3 border border-red-500 bg-red-100 rounded">
                        <p class="text-sm text-red-500 font-semibold">NOTE!</p>
                        <p class="text-xs text-red-500 italic">
                            Pengajuan tabungan anda tidak disetujui karena tidak memenuhi syarat & ketentuan.
                        </p>
                    </div>

                @elseif($item->status_persetujuan == 'Disetujui')
                    <!-- Jika status persetujuan disetujui -->
                    <div class="mb-4">
                        <div class="flex items-center justify-between mb-2">
                            <h2 class="text-lg font-semibold">{{ $item->produk->name }}</h2>
                            <p class="text-base text-green-600 font-medium">Disetujui</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-700"><strong>Tanggal Mulai:</strong> {{ $item->awal_waktu_tabungan }}</p>
                            <p class="text-sm text-gray-700"><strong>Target Selesai:</strong> {{ $item->target_waktu_tabungan }}</p>
                            <p class="text-sm text-gray-700"><strong>Jumlah Cicilan per Bulan:</strong> {{ number_format($item->jumlah_cicilan_bulan, 2) }}</p>
                            <p class="text-sm text-gray-700"><strong>Metode:</strong> {{ $item->metode->jenis }}</p>
                        </div>
                    </div>
                    <div class="mt-4 flex space-x-2">
                        @if($item->bukti_pembayaran_invalid)
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                        </a>
                        @endif

                        @if($item->sisa_bulan > 0)
                        <!-- Show Upload button only if not "Bayar di Tempat" -->
                        {{-- @if($item->metode->jenis != 'Bayar di Tempat') --}}
                            <a href="{{ route('transaksi.layouts', ['id' => $item->id]) }}" class="flex-1 py-2 px-2 w-auto bg-blue-500 text-white rounded text-center relative">Upload</a>
                        {{-- @endif --}}
                        @endif
                        <a href="{{ route('rincian.show', ['id' => $item->id]) }}" class="flex-1 py-2 px-2 w-auto bg-gray-200 text-blue-500 text-center rounded hover:bg-gray-300">Selengkapnya</a>
                    </div>

                @else
                    <!-- Jika status persetujuan adalah Pending -->
                    <div class="mb-4">
                    <div class="flex items-center justify-between mb-2">
                        <h2 class="text-lg font-semibold">{{ $item->produk->name }}</h2>
                        <p class="text-base text-yellow-600 font-medium">Pending</p>
                    </div>
                    </div>

                    <!-- Optional: Note or message for Pending status -->
                    <div class="mt-1 p-3 border border-yellow-500 bg-yellow-100 rounded">
                        <p class="text-sm text-yellow-600 font-semibold">NOTE!</p>
                        <p class="text-xs text-yellow-600 italic">
                            Pengajuan tabungan anda sedang dalam proses verifikasi. Harap tunggu konfirmasi lebih lanjut.
                        </p>
                    </div>
                @endif
            </div>
        </div>
        @empty
            <p class="flex items-center justify-center text-center text-gray-500">Tidak ada data tabungan yang tersedia.</p>
        @endforelse
=======
>>>>>>> 35ce871132669105c9fd8f577060d9538233fa3d
    </div>

<<<<<<< HEAD
=======
    <div class="overflow-x-auto p-4 flex items-center justify-end space-x-4 max-w-4xl mx-auto text-right">
        <form action="{{ route('notifikasi.rincian.history') }}" method="GET" class="flex items-center space-x-2 w-auto max-w-md ml-5">
            <div class="overflow-x-auto relative flex-grow">
                <select id="produk_id" name="produk_id" class="block bg-gray-100 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Semua Produk</option>
                    @foreach($produkList as $produk)
                        <option value="{{ $produk->id }}" {{ $produkId == $produk->id ? 'selected' : '' }}>{{ $produk->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="px-2 py-2 bg-blue-400 text-white rounded-md hover:bg-blue-600 w-auto">
                Filter
            </button>
        </form>
    </div>


    @php
    $tabungankur = \App\Models\Tabungankur::where('user_id', auth()->id())
        ->with(['produk', 'metode']) // Make sure the 'metode' relation is loaded
        ->get()
        ->map(function ($item) {
        $item->bukti_pembayaran_invalid = $item->checkIfPaymentInvalid(); // Custom method
        return $item;
        });
    @endphp

    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center gap-y-8 gap-x-7">
            @forelse($filteredTabunganInputs as $item)
            <!-- Each card -->
            <div class="p-4 bg-white shadow-md rounded-[10px] min-h-[350px] w-[350px]">
                <div class="w-full rounded-[5px] overflow-hidden relative">
                    <div class="w-full h-[220px]">
                        <img src="{{ asset('storage/' . $item->produk->image) }}" alt="" class="w-full h-full object-cover mb-2 rounded">
                    </div>

                    @if($item->status_persetujuan == 'Tidak Disetujui')
                        <!-- Nama Produk dan Status Persetujuan -->
                        <div class="flex items-center justify-between mb-2">
                            <h2 class="text-lg font-semibold">{{ $item->produk->name }}</h2>
                            <p class="text-base text-red-600 font-medium">Tidak Disetujui</p>
                        </div>

                        <!-- Note Jika Tidak Disetujui -->
                        <div class="mt-2 p-3 border border-red-500 bg-red-100 rounded">
                            <p class="text-sm text-red-500 font-semibold">NOTE!</p>
                            <p class="text-xs text-red-500 italic">
                                Pengajuan tabungan anda tidak disetujui karena tidak memenuhi syarat & ketentuan.
                            </p>
                        </div>

                    @elseif($item->status_persetujuan == 'Disetujui')
                        <!-- Jika status persetujuan disetujui -->
                        <div class="mb-4">
                            <div class="flex items-center justify-between mb-2">
                                <h2 class="text-lg font-semibold">{{ $item->produk->name }}</h2>
                                <p class="text-base text-green-600 font-medium">Disetujui</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-700"><strong>Tanggal Mulai:</strong> {{ $item->awal_waktu_tabungan }}</p>
                                <p class="text-sm text-gray-700"><strong>Target Selesai:</strong> {{ $item->target_waktu_tabungan }}</p>
                                <p class="text-sm text-gray-700"><strong>Jumlah Cicilan per Bulan:</strong> {{ number_format($item->jumlah_cicilan_bulan, 2) }}</p>
                                <p class="text-sm text-gray-700"><strong>Metode:</strong> {{ $item->metode->jenis }}</p>
                            </div>
                        </div>
                        <div class="mt-4 flex space-x-2">
                            @if($item->bukti_pembayaran_invalid)
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                            </a>
                            @endif

                            @if($item->sisa_bulan > 0)
                            <!-- Show Upload button only if not "Bayar di Tempat" -->
                            {{-- @if($item->metode->jenis != 'Bayar di Tempat') --}}
                                <a href="{{ route('transaksi.layouts', ['id' => $item->id]) }}" class="flex-1 py-2 px-2 w-auto bg-blue-500 text-white rounded text-center relative">Upload</a>
                            {{-- @endif --}}
                            @endif
                            <a href="{{ route('rincian.show', ['id' => $item->id]) }}" class="flex-1 py-2 px-2 w-auto bg-gray-200 text-blue-500 text-center rounded hover:bg-gray-300">Selengkapnya</a>
                        </div>

                    @else
                        <!-- Jika status persetujuan adalah Pending -->
                        <div class="mb-4">
                        <div class="flex items-center justify-between mb-2">
                            <h2 class="text-lg font-semibold">{{ $item->produk->name }}</h2>
                            <p class="text-base text-yellow-600 font-medium">Pending</p>
                        </div>
                        </div>

                        <!-- Optional: Note or message for Pending status -->
                        <div class="mt-1 p-3 border border-yellow-500 bg-yellow-100 rounded">
                            <p class="text-sm text-yellow-600 font-semibold">NOTE!</p>
                            <p class="text-xs text-yellow-600 italic">
                                Pengajuan tabungan anda sedang dalam proses verifikasi. Harap tunggu konfirmasi lebih lanjut.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
            @empty
                <p class="flex items-center justify-center text-center text-gray-500">Tidak ada data tabungan yang tersedia.</p>
            @endforelse
        </div>
    </div>

>>>>>>> 35ce871132669105c9fd8f577060d9538233fa3d
</section>

<script>
    function clearUrlParams() {
        // Ambil URL saat ini tanpa query string
        var url = window.location.origin + window.location.pathname;
        // Gunakan window.location.replace agar URL dimuat ulang tanpa parameter GET
        window.location.replace(url);
    }
</script>
@endsection
