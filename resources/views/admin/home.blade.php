@extends('admin.layouts.main')
@section('title', 'Home')
@section('content')

<style>
/* Gaya Umum untuk Tombol */
.scroll-to-top {
    display: none; /* Sembunyikan tombol secara default */
    background-color: #224abe;
    border: none;
    border-radius: 50%;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    bottom: 20px;
    right: 20px;
    transition: all 0.3s ease;
}

.scroll-to-top:hover {
    background-color: #1a3b8b;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    transform: scale(1.15);
}

.scroll-to-top i {
    color: #ffffff;
    font-size: 20px;
    transition: color 0.3s ease;
}

.scroll-to-top:hover i {
    color: #aebcff;
}




    /* Aturan responsif untuk tablet dan ponsel */
    @media (max-width: 1024px) {
        .table th,
        .table td {
            font-size: 0.875rem; /* Mengurangi ukuran font untuk tampilan lebih baik pada layar kecil */
        }

        #pemasukan,
        #produk,
        #daftaranggota,
        #daftarpenabung{
            width: 625px;
        }
    }

    /* Aturan responsif untuk tablet dan ponsel */
    @media (max-width: 768px) {
        .table th,
        .table td {
            font-size: 0.875rem; /* Mengurangi ukuran font untuk tampilan lebih baik pada layar kecil */
        }

        #pemasukan,
        #produk,
        #daftaranggota,
        #daftarpenabung{
            width: 425px;
        }
    }

    /* Aturan responsif untuk tablet dan ponsel */
    @media (max-width: 425px) {
        .table th,
        .table td {
            font-size: 0.875rem; /* Mengurangi ukuran font untuk tampilan lebih baik pada layar kecil */
        }

        #pemasukan,
        #produk,
        #daftaranggota,
        #daftarpenabung{
            width: 375px;
        }
    }

    /* Resolusi untuk ponsel dengan lebar kecil */
    @media (max-width: 375px) {
        .table th,
        .table td {
            font-size: 0.75rem; /* Ukuran font lebih kecil untuk ponsel kecil */
        }

        #pemasukan,
        #produk,
        #daftaranggota,
        #daftarpenabung {
            width: 320px; /* Lebar elemen menjadi 100% dari kontainer induk */
        }
    }


</style>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="#pemasukan">Pemasukan</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 ">
                                Rp.{{ number_format($totalPaymentsOverall, 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-plus-square fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                <a href="#produk">Produk</a>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        {{ $produkHewanCount }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dolly fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <a href="#daftaranggota">Daftar Anggota</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $anggotaCount }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 ">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <a href="#daftarpenabung">Daftar Penabung</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $userCount }} <!-- Menampilkan jumlah pengguna -->
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- Content Row -->
    <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 mb-4" id="pemasukan">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        <div class="col-xl-12 mb-4" id="pemasukan">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pemasukan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Penabung</th>
                                    <th>Hewan yang Ditabung</th>
                                    <th>Pembayaran Bulan Ini</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $displayedUsersAndAnimals = [];
                                @endphp

                                @foreach($tabungan_inputs as $t)
                                    @php
                                        $userName = $t->user ? $t->user->nama_lengkap : 'Tidak Diketahui';
                                        $animalName = $t->tabunganKur && $t->tabunganKur->produk ? $t->tabunganKur->produk->name : 'Tidak Diketahui';
                                        $uniqueKey = $userName . '-' . $animalName; // Kombinasi unik nama pengguna dan nama hewan

                                        // Ambil total pembayaran bulan ini dari array yang dikirim dari controller
                                        $totalPaymentsThisMonth = $payments[$uniqueKey] ?? 0;

                                        // Cek apakah kombinasi ini sudah ditampilkan sebelumnya
                                        if (in_array($uniqueKey, $displayedUsersAndAnimals)) {
                                            continue; // Lewati iterasi jika kombinasi sudah ditampilkan
                                        }

                                        // Tambahkan kombinasi ini ke array yang melacak kombinasi yang sudah ditampilkan
                                        $displayedUsersAndAnimals[] = $uniqueKey;
                                    @endphp

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $userName }}</td>
                                        <td>{{ $animalName }}</td>
                                        <td>{{ $totalPaymentsThisMonth }}</td> <!-- Menampilkan total pembayaran bulan ini -->
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" style="text-align: right;"><strong>Total Keseluruhan Pembayaran Bulan Ini:</strong></td>
                                    <td><strong>{{ $totalPaymentsOverall }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 mb-4" id="produk">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Produk</h6>
                    <div class="dropdown no-arrow">
                        <button class="btn btn-sm btn-primary" type="button">
                            <a href="{{ route('produkhewan') }}" class=" text-white">See all</a>
                        </button>
                    </div>
                </div>
                <!-- Card Body -->
                @php
                    $produkhewan = \App\Models\produkhewan::all();
                @endphp
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>Nama Produk</th>
                                    <th>Harga Produk</th>
                                    <th>Berat Produk</th>
                                    <th>Gambar Produk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produkhewan as $produk)
                                <tr>
                                    <td>{{ $produk->id }}</td>
                                    <td>{{ $produk->name }}</td>
                                    <td>{{ $produk->price }}</td>
                                    <td>{{ $produk->berat }}</td>
                                    <td>
                                        @if($produk->image)
                                            <img src="{{ asset('storage/' . $produk->image) }}" alt="Produk Image" width="100">
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 mb-4" id="daftaranggota">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Anggota</h6>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Nama Lengkap</th>
                                    <th>No Telp</th>
                                    <th>Profile User</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($anggotas as $b)
                                <tr>
                                    <td>{{ $loop->iteration }}</td> <!-- Auto-incrementing number -->
                                    <td>{{ $b->username }}</td>
                                    <td>{{ $b->email }}</td>
                                    <td>{{ $b->nama_lengkap }}</td>
                                    <td>{{ $b->no_telepon }}</td>
                                    <td>
                                        @if($b->profile_anggota)
                                            <img src="{{ asset('storage/profile_anggota/' . $b->profile_anggota) }}" alt="Profile Anggota" width="100">
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-xl-12 mb-4" id="daftarpenabung">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Penabung</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Force horizontal scroll on smaller screens -->
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Nama Lengkap</th>
                                    <th>No Telp</th>
                                    <th>Profile User</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $a)
                                <tr>
                                    <td>{{ $a->id }}</td>
                                    <td>{{ $a->username }}</td>
                                    <td>{{ $a->email }}</td>
                                    <td>{{ $a->nama_lengkap }}</td>
                                    <td>{{ $a->no_telepon }}</td>
                                    <td>
                                        @if($a->profile_user)
                                            <img src="{{ asset('storage/profile_user/' . $a->profile_user) }}" alt="Profile User" width="100">
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
//     window.addEventListener("scroll", function() {
//   const scrollPosition = window.scrollY;
  // Lakukan sesuatu dengan nilai scrollPosition
  // Contoh: ubah ukuran elemen, opasitas, atau warna=
// });

// Fungsi untuk mengatur visibilitas tombol scroll-to-top
// Fungsi untuk mengatur visibilitas tombol scroll-to-top
// Fungsi untuk mengatur visibilitas tombol scroll-to-top
window.onscroll = function() {
    var scrollToTopButton = document.getElementById("scroll-to-top");

    // Periksa posisi scroll
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        scrollToTopButton.style.display = "flex"; // Tampilkan tombol saat scroll lebih dari 200px
    } else {
        scrollToTopButton.style.display = "none"; // Sembunyikan tombol saat di atas
    }
};


document.addEventListener("DOMContentLoaded", function() {
    // Menambahkan event listener pada setiap link yang mengarah ke ID
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            // Mencari elemen target berdasarkan ID dari href
            const targetElement = document.querySelector(this.getAttribute('href'));

            // Scroll dengan animasi smooth
            targetElement.scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});

</script>




