@extends('user.layouts.main')
@section('title', 'Product')

@section('content')
<section class="hero max-w-6xl md:px-8 px-4 mx-auto py-12 xl:px-0">
    <nav aria-label="breadcrumb" class="relative mt-4 max-w-2xl mx-auto">
        <ol class="inline-flex space-x-1 items-center rounded-md bg-blue-gray-50 bg-opacity-60 py-2 px-3">
            <li class="flex cursor-pointer items-center text-sm font-normal text-blue-gray-900 hover:text-pink-500">
                <a class="opacity-60" href="{{ route('produk') }}">
                    <span>Produk</span>
                </a>
                <span class="mx-1 text-blue-gray-500">/</span>
            </li>
            <li class="flex cursor-pointer items-center text-sm font-normal text-blue-gray-900 hover:text-pink-500">
                <a class="opacity-60" href="{{ route('tabungan.show', ['id' => $produk->first()->id]) }}">
                    <span>Tabungan</span>
                </a>
                <span class="mx-1 text-blue-gray-500">/</span>
            </li>
            <li class="flex cursor-pointer items-center text-sm font-normal text-blue-gray-900 hover:text-pink-500">
                <a class="opacity-60" href="{{ route('tabungan.index') }}">
                    <span>Rincian</span>
                </a>
                <span class="mx-1 text-blue-gray-500">/</span>
            </li>
            <li class="flex cursor-pointer items-center text-sm font-normal text-blue-gray-900 hover:text-pink-500">
                <a class="opacity-60" href="{{ route('imputalamat') }}">
                    <span>Data Alamat</span>
                </a>
            </li>
        </ol>
    </nav>
<div class="container mt-4 max-w-2xl mx-auto p-6 bg-white bg-opacity-50 rounded-lg shadow-md">

    <form action="{{ route('editimputalamat', $alamat->id_alamat ?? null) }}" method="POST">
        @csrf
        @if(isset($alamat))
            @method('POST')
        @endif
        <h2 class="text-2xl font-semibold text-black mb-4">Input Alamat</h2>

        <div class="mb-6">
            <label for="alamat_lengkap" class="block text-sm font-semibold text-gray-700 mb-2">Keterangan Tempat</label>
            <textarea id="alamat_lengkap" name="alamat_lengkap" rows="5" placeholder="Tambahkan Keterangan Tempat dan Nama Jalan Alamatmu" class="w-full border-gray-300 rounded-lg py-3 px-4 text-gray-600 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent">{{ auth()->user()->alamat ? auth()->user()->alamat->alamat_lengkap : '' }}</textarea>
        </div>

        <div class="mb-6 flex gap-4">
            <div class="flex-1">
                <label for="rt" class="block text-sm font-semibold text-gray-700 mb-2">RT</label>
                <input type="number" id="rt" placeholder="RT" name="rt" class="w-full border-gray-300 rounded-lg py-3 px-4 text-gray-600 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent" value="{{ auth()->user()->alamat ? auth()->user()->alamat->rt : '' }}">
            </div>
            <div class="flex-1">
                <label for="rw" class="block text-sm font-semibold text-gray-700 mb-2">RW</label>
                <input type="number" id="rw" placeholder="RW" name="rw" class="w-full border-gray-300 rounded-lg py-3 px-4 text-gray-600 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent" value="{{ auth()->user()->alamat ? auth()->user()->alamat->rw : '' }}">
            </div>
        </div>

        <div class="mb-6">
            <label for="kelurahan" class="block text-sm font-semibold text-gray-700 mb-2">Kelurahan</label>
            <input type="text" id="kelurahan" name="kelurahan" placeholder="Tambahkan Nama Desa atau Kelurahan" class="w-full border-gray-300 rounded-lg py-3 px-4 text-gray-600 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent" value="{{ auth()->user()->alamat ? auth()->user()->alamat->kelurahan : '' }}">
        </div>

        <div class="mb-6">
            <label for="kabupaten" class="block text-sm font-semibold text-gray-700 mb-2">Kabupaten/Kota</label>
            <input type="text" id="kabupaten" name="kabupaten" placeholder="Tambahkan Nama Kabupaten atau Kota" class="w-full border-gray-300 rounded-lg py-3 px-4 text-gray-600 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent" value="{{ auth()->user()->alamat ? auth()->user()->alamat->kabupaten : '' }}">
        </div>

        <div class="mb-6">
            <label for="kecamatan" class="block text-sm font-semibold text-gray-700 mb-2">Kecamatan</label>
            <input type="text" id="kecamatan" name="kecamatan" placeholder="Tambahkan Nama Kecamatan" class="w-full border-gray-300 rounded-lg py-3 px-4 text-gray-600 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent" value="{{ auth()->user()->alamat ? auth()->user()->alamat->kecamatan : '' }}">
        </div>

        <div class="mb-6">
            <label for="provinsi" class="block text-sm font-semibold text-gray-700 mb-2">Provinsi</label>
            <input type="text" id="provinsi" name="provinsi" placeholder="Tambahkan Nama Provinsi" class="w-full border-gray-300 rounded-lg py-3 px-4 text-gray-600 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent" value="{{ auth()->user()->alamat ? auth()->user()->alamat->provinsi : '' }}">
        </div>

        <button type="submit" class="bg-gradient-to-r from-orange-400 to-sky-500 rounded-lg dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white w-full py-3 hover:bg-gray-700">
            <svg class="mr-3 text-white dark:text-gray-900" width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.02301 7.18999C7.48929 6.72386 7.80685 6.12992 7.93555 5.48329C8.06425 4.83666 7.9983 4.16638 7.74604 3.55724C7.49377 2.94809 7.06653 2.42744 6.51835 2.06112C5.97016 1.6948 5.32566 1.49928 4.66634 1.49928C4.00703 1.49928 3.36252 1.6948 2.81434 2.06112C2.26615 2.42744 1.83891 2.94809 1.58665 3.55724C1.33439 4.16638 1.26843 4.83666 1.39713 5.48329C1.52583 6.12992 1.8434 6.72386 2.30968 7.18999L4.66634 9.54749L7.02301 7.18999Z" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M4.66699 4.83333V4.84166" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M13.69 13.8567C14.1563 13.3905 14.4738 12.7966 14.6025 12.15C14.7312 11.5033 14.6653 10.8331 14.413 10.2239C14.1608 9.61476 13.7335 9.09411 13.1853 8.72779C12.6372 8.36148 11.9926 8.16595 11.3333 8.16595C10.674 8.16595 10.0295 8.36148 9.48133 8.72779C8.93314 9.09411 8.5059 9.61476 8.25364 10.2239C8.00138 10.8331 7.93543 11.5033 8.06412 12.15C8.19282 12.7966 8.51039 13.3905 8.97667 13.8567L11.3333 16.2142L13.69 13.8567Z" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M11.333 11.5V11.5083" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            Simpan
        </button>
    </form>
</div>
</section>
@endsection
