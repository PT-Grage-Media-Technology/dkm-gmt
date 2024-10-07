@extends('user.layouts.main')
@section('title', 'Transaksi')

@section('content')
    <section class="space-y-8 p-4">
        <div class="flex justify-center mb-6">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative max-w-sm w-full text-center">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative max-w-sm w-full text-center">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 text-center">
                Detail Transaksi
            </h2><br>
            <div class="mb-6 p-4 border border-orange-300 rounded-md flex items-center">
                <i class="fas fa-credit-card text-blue-600 text-2xl mr-3"></i>
                <div>
                    <p class="text-lg font-semibold text-gray-800">Nomor Rekening:</p>
                    <p class="text-gray-600">1234-5678-9000</p>
                </div>
            </div>

            <div class="mb-6 p-4 border border-orange-300 rounded-md flex items-center">
                <i class="fas fa-phone-alt text-green-600 text-2xl mr-3"></i>
                <div>
                    <p class="text-lg font-semibold text-gray-800">Nomor HP:</p>
                    <p class="text-gray-600">+62 812-3456-7890</p>
                </div>
            </div>

            <div class="mb-4 p-4 border border-orange-300 rounded-md">
                <form action="{{ url('/upload-bukti/' . $tabunganKur->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="bukti_transaksi" class="block text-gray-700 text-sm font-medium mb-2">
                            Upload Bukti proses
                        </label>
                        <input type="file" id="bukti_transaksi" name="bukti_transaksi" accept="image/*" class="block w-full text-gray-600 py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <button type="submit" class="bg-blue-400 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Upload
                    </button>
                </form>

            </div>
        </div>
        <br><br><br>

        {{-- @dd($buktiPembayaran && $buktiPembayaran->status === 'invalid') --}}
        @if($buktiPembayaran && $buktiPembayaran->status === 'invalid')
        <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 text-center">
                validasi Pembayaran
            </h2><br>
        <div class="flex justify-center gap-3 ">
            <!-- Bukti Transaksi -->
            <div class="mb-6 p-2 border border-orange-300 rounded-md flex items-center">
            <div class="flex flex-col items-center w-full max-w-xs">
            <h3 class="text-lg font-medium mb-2">Bukti Transaksi:</h3>
            @if($buktiPembayaran && $buktiPembayaran->bukti_transaksi)
                <img src="{{ asset('storage/' . $buktiPembayaran->bukti_transaksi) }}" alt="Bukti Transaksi" class="max-w-xs w-full h-auto object-cover rounded shadow-md">
            @else
                <p class="text-red-500">Bukti Transaksi tidak tersedia atau statusnya bukan "invalid".</p>
            @endif
        </div>
        </div>

        <!-- Bukti Validasi -->
        <div class="mb-6 p-2 border border-orange-300 rounded-md flex">
        <div class="flex flex-col items-center w-full max-w-xs">
            <h3 class="text-lg font-medium mb-2">Bukti Validasi:</h3>
            @if($buktiPembayaran && $buktiPembayaran->bukti_validasi)
                <img src="{{ asset('storage/' . $buktiPembayaran->bukti_validasi) }}" alt="Bukti Validasi" class="max-w-xs w-full h-auto object-cover rounded shadow-md">
            @else
                <p class="text-red-500">Bukti Validasi tidak tersedia atau statusnya bukan "invalid".</p>
            @endif
        </div>
        </div>
        </div>
        <div class="p-3 border border-red-500 bg-red-100 rounded mt-3">
            <p class="text-sm text-red-500 font-semibold">NOTE!</p>
            <p class="text-xs text-red-500 italic">
                Bukti Transaksi yang Anda kirim tidak sesuai dengan Nominal Transaksi yang kami terima.
                Mohon upload ulang bukti transaksi yang sesuai.
            </p>
            <p class="text-xs text-red-500 italic">
                untuk lebih lanjut hubungi admin. Terima Kasih
            </p>
        </div>
        @else
        <!-- Jika status sudah valid atau berbeda dari "invalid" -->
        <p class="text-green-500 text-center">Pembayaran Anda telah divalidasi. Terima kasih!</p>
    @endif
    </section>
@endsection
