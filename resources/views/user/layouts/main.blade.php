<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/settings/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('css/settings/ubahData.css') }}">
    <link rel="stylesheet" href="{{ asset('css/settings/ubahAlamat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/settings/ubahProfile.css') }}">
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>@yield('title')</title>
    <link href="{{ asset('css/fotoadmin.css') }}" rel="stylesheet">

</head>

<body class="pt-20 bg-[#F1F4F5] font-['Poppins'] w-fit">
    <nav class="navbar fixed top-0 left-0 w-full bg-white shadow-lg z-50 items-center px-8 h-20">
        @include('user.layouts.breadcrumbs')
        <div class="flex flex-row items-center h-full justify-between">

            <div class="flex-shrink-0" style="display: flex; align-items: center;">
                @php
                    $setadusrset = App\Models\Setadusrset::first()
                @endphp
                @if ($setadusrset && $setadusrset->logo)
                    <img src="{{ asset('storage/' . $setadusrset->logo) }}" style="max-height: 47px; height: auto; width: auto;" alt="Logo">
                @else
                    <img src="{{ 'assets/qurban.png' }}" style="max-height: 47px; height: auto; width: auto;" alt="Default Logo">
                @endif
                <p style="color: black; margin-left: 3px; font-size: 13px; text-align: center;">
                    <b>{{ $setadusrset && $setadusrset->nama ? $setadusrset->nama : 'Nama DKM' }}</b>
                </p>            </div>


            <ul class="flex flex-row gap-x-8 lg:flex hidden">

                <li>
                    <a href="/beranda" class="text-indigo-950 hover:text-orange-400">Beranda</a>
                </li>
                <li>
                    <a href="/produk" class="text-indigo-950 hover:text-orange-400">Produk</a>
                </li>
                <li>
                    <a href="/notifikasi" class="text-indigo-950 hover:text-orange-400">Notifikasi</a>
                </li>
                <li>
                    <a href="/tentang" class="text-indigo-950 hover:text-orange-400">Tentang Kami</a>
                </li>
            </ul>

            <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
            <div class="flex flex-row gap-x-4">
                {{-- @if(isset($tabungankur) && isset($tabungankur->id))
                    <a href="{{ route('history.index', ['id' => $tabungankur->id]) }}" class="text-black hover:text-orange-400 flex items-center space-x-4">
                        <i class="fas fa-history text-xl"></i>
                    </a>
                @endif --}}
                @if (auth()->user() == null)
                    <a href="/login"
                        class="md:block hidden py-3 bg-orange-400 text-white text-base px-5 rounded-full hover:bg-sky-500 transition duration-500">
                        Sign In
                    </a>
                @else
                    <div x-data="{ open: false }" class="relative hidden md:flex lg:flex">
                        <svg @click="open = !open" class="w-6 h-6 cursor-pointer" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path
                                d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z" />
                        </svg>

                        <div x-show="open" @click.away="open = false"
                            class="origin-top-left absolute left-[-80px] mt-2 w-auto rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 px-2">
                            <a href="{{ route('settingAkun') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Akun</a>
                            <a href="{{ route('logout') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Logout</a>
                        </div>
                    </div>
                @endif
                <div id="btn-dropdown" class="lg:hidden bg-white flex items-center p-[10px] rounded-full">
                    <a href="#">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 7H21" stroke="#080C2E" stroke-width="2" stroke-linecap="round" />
                            <path d="M3 12H21" stroke="#080C2E" stroke-width="2" stroke-linecap="round" />
                            <path d="M3 17H21" stroke="#080C2E" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </nav>
    <!-- mega menu floating dropdown -->
    <div id="dropdown-menu"
        class="megamenu w-screen md:w-fit md:right-0 absolute top-28 hidden px-5 flex justify-end lg:hidden">
        <div class="flex flex-col bg-white p-5 md:p-8 rounded-2xl gap-y-5 z-50">
            <ul class="flex flex-col gap-y-5">
                <li><a href="/beranda" class="text-indigo-950 hover:text-orange-400">Beranda</a></li>
                <li><a href="/produk" class="text-indigo-950 hover:text-orange-400">Produk</a></li>
                <li><a href="/notifikasi" class="text-indigo-950 hover:text-orange-400">Notifikasi</a></li>
                <li><a href="/tentang" class="text-indigo-950 hover:text-orange-400">Tentang Kami</a></li>

            </ul>
            @if (auth()->user() == null)
                <a href="/login"
                    class="md:hidden py-3 bg-orange-400 text-white text-base px-5 text-center w-full rounded-full hover:bg-sky-500 transition duration-500">
                    Sign In
                </a>

            @else
                <div x-data="{ open: false }" class="relative">
                    <svg @click="open = !open" class="w-6 h-6 cursor-pointer" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                            d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z" />
                    </svg>

                    <div x-show="open" @click.away="open = false"
                        class="origin-top-left absolute left-0 mt-2 w-auto rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 px-2 py-2">
                        <a href="{{ route('settingAkun') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Akun</a>
                        <a href="{{ route('logout') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Logout</a>
                    </div>
                </div>

            @endif
        </div>

    </div>
    @yield('content')


    {{-- kontak --}}

    @php
        $setting = App\Models\InfoKoAdmin::first();
    @endphp
    <section class="max-w-6xl mx-auto z-0">
        <div
            class="promotion mx-4 md:mx-8 xl:mx-0 rounded-3xl bg-gradient-to-r from-orange-400 to-sky-500 mt-20 md:relative z-20  py-12 md:px-8 px-4 xl:px-10">
            <div class="grid lg:grid-cols-2 gap-x-8 gap-y-10 items-center">
                <div class="flex flex-col gap-y-10">
                    <div class="flex py-2 flex-row small-badge items-center bg-white rounded-full gap-x-2 px-3 w-fit">
                        <p class="lg:text-base text-sm font-semibold text-indigo-950">
                            Kontak
                        </p>
                    </div>
                    <div>
                        <h3
                            class="leading-tight md:leading-lg text-[34px] lg:text-5xl text-white font-['Clash_Display'] font-bold mb-5">
                            Hubungi Kami
                        </h3>
                        <p class="text-base leading-loose text-white">
                            Fleksibilitas Penyetoran<br>Setor dana secara berkala atau sekaligus sesuai dengan kemampuan
                            Anda, tanpa batasan jumlah.
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 sm:grid-cols-2 gap-x-5 gap-y-5">
                    <div class="bg-white rounded-2xl flex py-4 md:py-10 h-fit flex-col gap-y-3 items-center max-w-xs ">
                        <a href="https://wa.me/{{ $setting->wa }}" target="_blank"
                            class="flex flex-col items-center text-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2">
                                <path
                                    d="M21.97 18.33C21.97 18.69 21.89 19.06 21.72 19.42C21.55 19.78 21.33 20.12 21.04 20.44C20.55 20.98 20.01 21.37 19.4 21.62C18.8 21.87 18.15 22 17.45 22C16.43 22 15.34 21.76 14.19 21.27C13.04 20.78 11.89 20.12 10.75 19.29C9.6 18.45 8.51 17.52 7.47 16.49C6.44 15.45 5.51 14.36 4.68 13.22C3.86 12.08 3.2 10.94 2.72 9.81C2.24 8.67 2 7.58 2 6.54C2 5.86 2.12 5.21 2.36 4.61C2.6 4 2.98 3.44 3.51 2.94C4.15 2.31 4.85 2 5.59 2C5.87 2 6.15 2.06 6.4 2.18C6.66 2.3 6.89 2.48 7.07 2.74L9.39 6.01C9.57 6.26 9.7 6.49 9.79 6.71C9.88 6.92 9.93 7.13 9.93 7.32C9.93 7.56 9.86 7.8 9.72 8.03C9.59 8.26 9.4 8.5 9.16 8.74L8.4 9.53C8.29 9.64 8.24 9.77 8.24 9.93C8.24 10.01 8.25 10.08 8.27 10.16C8.3 10.24 8.33 10.3 8.35 10.36C8.53 10.69 8.84 11.12 9.28 11.64C9.73 12.16 10.21 12.69 10.73 13.22C11.27 13.75 11.79 14.24 12.32 14.69C12.84 15.13 13.27 15.43 13.61 15.61C13.66 15.63 13.72 15.66 13.79 15.69C13.87 15.72 13.95 15.73 14.04 15.73C14.21 15.73 14.34 15.67 14.45 15.56L15.21 14.81C15.46 14.56 15.7 14.37 15.93 14.25C16.16 14.11 16.39 14.04 16.64 14.04C16.83 14.04 17.03 14.08 17.25 14.17C17.47 14.26 17.7 14.39 17.95 14.56L21.26 16.91C21.52 17.09 21.7 17.3 21.81 17.55C21.91 17.8 21.97 18.05 21.97 18.33Z"
                                    stroke="black" stroke-width="2" stroke-miterlimit="10" />
                            </svg>

                            <h3 class="text-indigo-950 font-bold text-lg">
                                WhatsApp
                            </h3>
                        </a>
                    </div>
                    <div class="bg-white rounded-2xl flex py-4 md:py-10 h-fit flex-col gap-y-3 items-center max-w-xs ">
                        <a href="mailto:email{{ $setting->email }}" class="flex flex-col items-center text-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2">
                                <path
                                    d="M17 20.5H7C4 20.5 2 19 2 15.5V8.5C2 5 4 3.5 7 3.5H17C20 3.5 22 5 22 8.5V15.5C22 19 20 20.5 17 20.5Z"
                                    stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M17 9L13.87 11.5C12.84 12.32 11.15 12.32 10.12 11.5L7 9" stroke="black"
                                    stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <h3 class="text-indigo-950 font-bold text-lg">
                                Email
                            </h3>
                        </a>
                    </div>

                    <iframe
                        src="{{$setting->maps}}"
                        height="100%" class="rounded-xl w-[255px] md:w-[200px] lg:w-[150px]" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
    </section>

   <section class="footer lg:w-screen w-full bg-[#080C2E] lg:-z-10 lg:-mt-[160px] lg:pt-[150px] h-fit">
    <div class="max-w-7xl mx-auto mt-[50px] px-5 py-3 lg:py-5 xl:px-5">
        <div class="grid lg:grid-cols-3 gap-x-8 gap-y-6 grid-cols-1 sm:grid-cols-2 lg:justify-between">
            <!-- Logo dan Deskripsi -->
            <div class="flex flex-col gap-y-4">
                <div class="flex-shrink-0" style="display: flex; align-items: center;">
                    @php
                        $setadusrset = App\Models\Setadusrset::first()
                    @endphp
                    @if ($setadusrset && $setadusrset->logo)
                        <img src="{{ asset('storage/' . $setadusrset->logo) }}" style="max-height: 47px; height: auto; width: auto;" alt="Logo">
                    @else
                        <img src="{{ asset('assets/qurban.png') }}" style="max-height: 47px; height: auto; width: auto;" alt="Default Logo">
                    @endif
                    <p style="color: white; margin-left: 3px; font-size: 13px; text-align: center;">
                        {{ $setadusrset && $setadusrset->nama ? $setadusrset->nama : 'Nama DKM' }}
                    </p>            </div>
                <p class="text-sm text-gray-400 leading-relaxed max-w-sm">
                    Simpankan dana kurban Anda dengan cara yang efisien dan dapat diandalkan,
                    dan nikmati kemudahan proses kurban yang lebih sederhana bersama kami.
                </p>
            </div>

            <!-- Fitur -->
            <div class="flex flex-col gap-y-4 lg:pl-8">
                <h3 class="text-white font-semibold text-md">
                    Fitur
                </h3>
                <ul class="gap-y-2 flex flex-col">
                    <li>
                        <a href="#" class="text-gray-400 hover:text-violet-300 text-sm">Beranda</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-violet-300 text-sm">Kontak</a>
                    </li>
                    <li>
                        <a href="/notifikasi" class="text-gray-400 hover:text-violet-300 text-sm">Notifikasi</a>
                    </li>
                    <li>
                        <a href="/tentang" class="text-gray-400 hover:text-violet-300 text-sm">Tentang Kami</a>
                    </li>
                    <li>
                        <a href="/produk" class="text-gray-400 hover:text-violet-300 text-sm">Menabung</a>
                    </li>
                </ul>
            </div>

            <!-- Syarat & Ketentuan -->
            <div class="flex flex-col gap-y-5 lg:w-[550px] lg:-ml-40">
                <h3 class="text-white font-semibold text-md">
                    Syarat & ketentuan
                </h3>
                <ul class="list-disc list-inside text-gray-400 text-sm">
                    <li>Lakukan registrasi untuk memulai proses menabung</li>
                    <li>Mengisi bio data lengkap dan Alamat</li>
                    <li>Saat proses menabung isi form sesuai dengan kebutuhan Anda, dan memastikan kembali alamat sudah sesuai</li>
                    <li>Lihat halaman notifikasi untuk melihat status pengajuan tabungan sudah disetujui atau tidak</li>
                    <li>Jika disetujui, lakukan transaksi sesuai dengan metode yang dipilih dan lihat selengkapnya untuk mengetahui data transaksi kita selama menabung</li>
                    <li>Jika jangka waktu tabungan sudah ditempuh, maka lihat halaman history lalu download rincian tabungan untuk menjadi bukti mengambil hasil tabungan</li>
                </ul>
            </div>
        </div>
    </div>
</section>




    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const btndropdown = document.getElementById('btn-dropdown');
            const dropdownmenu = document.getElementById('dropdown-menu');

            btndropdown.addEventListener("click", function () {
                dropdownmenu.classList.toggle("hidden");
            });

            document.addEventListener("click", function (event) {
                if (!btndropdown.contains(event.target) && !dropdownmenu.contains(event.target)) {
                    dropdownmenu.classList.add("hidden");
                }
            });

            const shaynakitAccordions = document.querySelectorAll('.shaynakit-accordion');

            shaynakitAccordions.forEach(function (shaynakitAccordion) {

                const btnAccordion = shaynakitAccordion.querySelector('.btn-accordion');
                const accordionContent = shaynakitAccordion.querySelector('.accordion-content');

                btnAccordion.addEventListener("click", function (event) {
                    event.preventDefault();
                    accordionContent.classList.toggle("hidden");
                });
            });
        });
    </script>

</body>

</html>
