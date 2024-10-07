@extends('user.layouts.main')
@section('title', 'Rincian')

@section('content')
    <section class="space-y-8">
        @php
        $produkId = request()->query('produk_id');
        $canDownload = false;

        // Ambil item terakhir dari filteredTabunganInputs
        if($filteredTabunganInputs->isNotEmpty()) {
            $lastInput = $filteredTabunganInputs->last();
            // Cek apakah minus_pembayaran dan sisa_bulan item terakhir sudah 0
            if ($lastInput->minus_pembayaran == 0 && $lastInput->sisa_bulan == 0) {
                $canDownload = true;
            }
        }
        @endphp

        <div class="overflow-x-auto p-2 max-w-2xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-black mb-4 text-center">
                Rincian Tabungan
            </h2>
        </div>

        <div class="overflow-x-auto p-4 flex items-center justify-end space-x-4 max-w-4xl mx-auto">
            @if($canDownload)
                <a href="{{ route('download.word', ['produk_id' => $produkId]) }}" class="px-4 py-2 bg-blue-400 text-white rounded hover:bg-blue-600">
                    Unduh</a>
            @endif
        </div>

        <!-- Table Rincian Tabungan -->
        <div class="container mx-auto px-4">
            <div class="w-[280px] overflow-x-auto md:w-full mt-4">
                <table class="w-[1000px] lg:min-w-full lg:max-w-full table-auto divide-y divide-black-500 border border-black">
                    <thead class="bg-gray-50 border-b border-black">
                        <tr>
                            <th class="px-2 py-2 text-center text-[10px] lg:text-lg font-medium text-black-500 border-r border-black">No.</th>
                            <th class="px-2 py-2 text-center text-[10px] lg:text-lg font-medium text-black-500 border-r border-black">Nama</th>
                            <th class="px-2 py-2 text-center text-[10px] lg:text-lg font-medium text-black-500 border-r border-black">Tanggal</th>
                            <th class="px-2 py-2 text-center text-[10px] lg:text-lg font-medium text-black-500 border-r border-black">Nominal</th>
                            <th class="px-2 py-2 text-center text-[10px] lg:text-lg font-medium text-black-500 border-r border-black">Sisa Pembayaran</th>
                            <th class="px-2 py-2 text-center text-[10px] lg:text-lg font-medium text-black-500 border-r border-black">Sisa Bulan</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 border-t border-black">

                        @forelse($filteredTabunganInputs as $index => $input)
                        <tr>
                            <td class="px-2 py-2 border-b border-r text-[10px] lg:text-lg border-black">{{ $index + 1 }}</td>
                            <td class="px-2 py-2 border-b border-r text-[10px] lg:text-lg border-black">{{ $input->tabunganKur->produk->name }}</td>
                            <td class="px-2 py-2 border-b border-r text-[10px] lg:text-lg border-black">{{ $input->rincian_tanggal_bayar }}</td>
                            <td class="px-2 py-2 border-b border-r text-[10px] lg:text-lg border-black">Rp {{ number_format($input->total_bayar ?? 0, 2) }}</td>
                            <td class="px-2 py-2 border-b border-r text-[10px] lg:text-lg border-black">Rp {{ number_format($input->minus_pembayaran) }}</td>
                            <td class="px-2 py-2 border-b border-r text-[10px] lg:text-lg border-black">{{ $input->sisa_bulan }}</td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-3 py-2 text-center text-gray-500">Tidak ada data tabungan kur.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script>
        function clearUrlParams() {
            var url = window.location.origin + window.location.pathname;
            window.location.replace(url);
        }
    </script>

@endsection
