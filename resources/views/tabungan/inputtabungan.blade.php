@extends('user.layouts.main')
@section('title', 'Input Tabungan')

@section('content')
<div class="md:flex items-start justify-center py-8 2xl:px-16 md:px-4 px-2">
    <div class="xl:w-2/6 lg:w-2/5 w-80 md:block">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="inline-flex space-x-1 items-center rounded-md bg-blue-gray-50 bg-opacity-60 py-2 px-3">
                <li class="flex cursor-pointer items-center text-sm font-normal text-blue-gray-900 hover:text-pink-500">
                    <a class="opacity-60" href="{{ route('produk') }}">
                        <span>Produk</span>
                    </a>
                    <span class="mx-1 text-blue-gray-500">/</span>
                </li>
                <li class="flex cursor-pointer items-center text-sm font-normal text-blue-gray-900 hover:text-pink-500">
                    <a class="opacity-60" href="{{ route('tabungan.show', ['id' => $produk->id]) }}">
                        <span>Tabungan</span>
                    </a>
                    <span class="mx-1 text-blue-gray-500">/</span>
                </li>

            </ol>
        </nav>
        <p class="w-full rounded-lg hover:shadow-2xl hover:scale-105 transition duration-300 hidden">
            {{ $produk->id }}
        </p>
            <div class="md">
                <img class="w-full rounded-lg hover:shadow-2xl hover:scale-105 transition duration-300"
                    alt="{{ $produk->id }}" src="{{ asset('storage/' . $produk->image) }}" />
            </div>
    </div>

    <div class="xl:w-2/5 md:w-1/2 lg:ml-6 md:ml-4 md:mt-0 mt-4">
        <div class="border-b border-gray-200 pb-4">
            <h1 class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 text-gray-800 dark:text-black mt-3">
                {{ $produk->name }}
            </h1>
        </div>
        <div class="py-3 border-b border-gray-200 flex items-center justify-between">
            <p class="text-base leading-4 text-black-800 dark:text-black-300">Harga : </p>
            <div class="flex items-center justify-center">
                <p class="text-sm leading-none text-gray-600 dark:black-gray-300">{{ number_format($produk->price, 0, ',', '.') }}/Ekor</p>
            </div>
        </div>
        <div class="py-3 border-b border-gray-200 flex items-center justify-between">
            <p class="text-base leading-4 text-gray-800 dark:text-black-300">Berat :</p>
            <div class="flex items-center justify-center">
                <p class="text-sm leading-none text-gray-600 dark:text-black-300 mr-3">{{ $produk->berat }}</p>
            </div>
        </div>
        <form action="{{ route('tabungan.store') }}" method="POST">
            @csrf
            <input type="hidden" name="produk_id" value="{{ $produk->id }}">
            <div class="form">
                <label for="awal_waktu_tabungan">Awal Waktu Tabungan:</label>
                <input type="date" id="awal_waktu_tabungan" name="awal_waktu_tabungan"
                    class="w-full text-sm text-gray-600 placeholder-gray-300 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent mt-1 mb-3"
                    placeholder="Awal Waktu Tabungan" required>
            </div>
            <div class="form">
                <label for="target_waktu_tabungan">Target Waktu Tabungan:</label>
                <select id="target_waktu_tabungan" name="target_waktu_tabungan"
                    class="w-full text-sm text-gray-600 placeholder-gray-300 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent mt-1 mb-3" required>
                    <option value="">Pilih Target Waktu</option>
                    <option value="6">6 Bulan</option>
                    <option value="12">12 Bulan</option>
                    <option value="36">36 Bulan</option>
                </select>
            </div>
            <div class="form">
                <label for="jumlah_cicilan_bulan">Jumlah Cicilan/Bulan:</label>
                <div class="relative">
                    <div class="flex items-center">
                        <!-- Span to display formatted value inside the input -->
                        <span id="cicilan_display"
                        class="flex items-center px-3 py-2 text-gray-600 pointer-events-none w-full text-sm placeholder-gray-300 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent mt-1 mb-3 bg-white h-10"></span>

                        <!-- Input field -->
                        <input type="number" id="jumlah_cicilan_bulan" name="jumlah_cicilan_bulan"
                            class="w-full text-sm text-gray-600 placeholder-gray-300 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent mt-1 mb-3 hidden"
                            readonly>
                    </div>
                </div>

            </div>
            <div class="form">
                <label for="metode">Metode</label>
                <select name="metode_id" id="metode_id" class="w-full text-sm text-gray-600 placeholder-gray-300 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent-mt-1-mb-3" required>
                    <option value="">Pilih Metode Tabungan</option>
                    @foreach($metode as $m)
                        <option value="{{ $m->id }}">{{ $m->jenis }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button
                class="bg-gradient-to-r from-orange-400 to-sky-500 rounded-lg dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white w-full py-3 hover:bg-gray-700 focus:outline-none">
                <svg class="mr-3 text-white dark:text-gray-900" width="16" height="17" viewBox="0 0 16 17" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.02301 7.18999C7.48929 6.72386 7.80685 6.12992 7.93555 5.48329C8.06425 4.83666 7.9983 4.16638 7.74604 3.55724C7.49377 2.94809 7.06653 2.42744 6.51835 2.06112C5.97016 1.6948 5.32566 1.49928 4.66634 1.49928C4.00703 1.49928 3.36252 1.6948 2.81434 2.06112C2.26615 2.42744 1.83891 2.94809 1.58665 3.55724C1.33439 4.16638 1.26843 4.83666 1.39713 5.48329C1.52583 6.12992 1.8434 6.72386 2.30968 7.18999L4.66634 9.54749L7.02301 7.18999Z"
                        stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M4.66699 4.83333V4.84166" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path
                        d="M13.69 13.8567C14.1563 13.3905 14.4738 12.7966 14.6025 12.15C14.7312 11.5033 14.6653 10.8331 14.413 10.2239C14.1608 9.61476 13.7335 9.09411 13.1853 8.72779C12.6372 8.36148 11.9926 8.16595 11.3333 8.16595C10.674 8.16595 10.0295 8.36148 9.48133 8.72779C8.93314 9.09411 8.5059 9.61476 8.25364 10.2239C8.00138 10.8331 7.93543 11.5033 8.06412 12.15C8.19282 12.7966 8.51039 13.3905 8.97667 13.8567L11.3333 16.2142L13.69 13.8567Z"
                        stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M11.333 11.5V11.5083" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                Simpan
            </button>
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const targetWaktuTabungan = document.getElementById('target_waktu_tabungan');
        const jumlahCicilanBulan = document.getElementById('jumlah_cicilan_bulan');
        const cicilanDisplay = document.getElementById('cicilan_display');

        // Harga produk
        const hargaProduk = {{ $produk->price }};

        // Fungsi untuk memformat angka ke format Rupiah
        function formatRupiah(angka) {
            const numberString = angka.toString();
            const sisa = numberString.length % 3;
            let rupiah = numberString.substr(0, sisa);
            const ribuan = numberString.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                const separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            return 'Rp' + rupiah;
        }

        function calculateCicilan() {
            const targetWaktu = parseInt(targetWaktuTabungan.value);
            if (!isNaN(targetWaktu) && targetWaktu > 0) {
                const cicilan = hargaProduk / targetWaktu;
                jumlahCicilanBulan.value = cicilan.toFixed(2); // Simpan nilai numerik tanpa format Rupiah
                document.getElementById('cicilan_display').innerText = formatRupiah(cicilan.toFixed(0)); // Tampilkan nilai dalam format Rupiah
            } else {
                jumlahCicilanBulan.value = '';
                document.getElementById('cicilan_display').innerText = '';
            }
        }

        targetWaktuTabungan.addEventListener('change', calculateCicilan);
    });
    </script>
@endsection
