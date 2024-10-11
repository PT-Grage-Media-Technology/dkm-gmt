<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="{{ asset('sbadmin/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') }}"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fotoadmin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ubahPwAdmin.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/alamatadmin.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <div class="flex-shrink-0" style="display: flex; align-items: center;">
                @php
                    $setadusrset = App\Models\Setadusrset::first()
                @endphp
                @if ($setadusrset && $setadusrset->logo)
                    <img src="{{ asset('storage/' . $setadusrset->logo) }}" style="max-height: 47px; height: auto; width: auto;" alt="Logo">
                @else
                    <img src="{{ 'assets/qurban.png' }}" style="max-height: 47px; height: auto; width: auto;" alt="Default Logo">
                @endif
                <p style="color: white; margin-left: 3px; font-size: 13px; text-align: center;">
                    {{ $setadusrset && $setadusrset->nama ? $setadusrset->nama : 'Nama DKM' }}
                </p>            </div>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">


            <div class="sidebar-heading">
                Interface
            </div>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Toko:</h6>
                        <a class="collapse-item" href="{{ route('produkhewan') }}">Produk</a>
                        <a class="collapse-item" href="{{ route('tadamet') }}">Metode Pembayaran</a>
                        <a class="collapse-item" href="{{ route('datatabungan.index') }}">Tabungan</a>
                        <a class="collapse-item" href="{{ route('historytabungan') }}">History Tabungan</a>
                        <a class="collapse-item" href="{{ route('datapemasukan') }}">Data Pemasukan</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - New Data Tabungan Dropdown -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTabungan"
                    aria-expanded="true" aria-controls="collapseTabungan">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                    <span>Data Anggota</span>
                </a>
                <div id="collapseTabungan" class="collapse" aria-labelledby="headingTabungan"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('pembin') }}">Pembagian Admin</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettings"
                    aria-expanded="true" aria-controls="collapseSettings">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Setting Halaman User</span>
                </a>
                <div id="collapseSettings" class="collapse" aria-labelledby="headingSettings"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('setadusr.create') }}">Setting Akun</a>
                        <a class="collapse-item" href="{{ route('info.index') }}">Informasi</a>
                        <a class="collapse-item" href="{{ route('kontakadmin') }}">Kontak</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettingsAdmin"
                    aria-expanded="true" aria-controls="collapseSettingsAdmin">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Setting Super Admin</span>
                </a>
                <div id="collapseSettingsAdmin" class="collapse" aria-labelledby="headingSettingsAdmin"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('settingadmin')}}">Setting Akun</a>
                        <a class="collapse-item" href="{{ route('data-transaksi-histori') }}">Data Transaksi</a>
                        <a class="collapse-item" href="{{route('admin.setting.ubahPasswordAdmin')}}">Resset Password Admin</a>

                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="{{ route('settingadmin') }}" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $setting->nama_lengkap ? $setting->nama_lengkap : 'Nama Admin' }}</span>
                                {{-- @if ($setadusrset && $setadusrset->logo)
                                <img class="img-profile rounded-circle" src="{{ asset('storage/' . $setting->logo) }}" alt="Profile Picture">
                                @else --}}

                                @if(isset($setting) && $setting->logo)
                                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo DKM" class="img-profile">
                                @else
                                    <img src="{{ asset('image/profil.png') }}" style="max-height: 47px; height: auto; width: auto;" alt="Default Logo">
                                @endif
                            </a>


                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('settingadmin')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
               @yield('content')
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

         <!-- Logout Modal-->
         <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yakin Untuk Keluar?</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close" style="width: 5rem; background-color: transparent;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Logout" jika yakin untuk keluar.
                    </div>
                    <div class="modal-footer">
                        {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> --}}
                        <a class="btn btn-primary" href="{{ route('lomin') }}">Logout</a>
                    </div>
                </div>
            </div>
        </div>


            <!-- Bootstrap core JavaScript-->
            <script src="{{ asset('sbadmin/vendor/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

            <!-- Core plugin JavaScript-->
            <script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

            <!-- Custom scripts for all pages-->
            <script src="{{ asset('sbadmin/js/sb-admin-2.min.js') }}"></script>

            <!-- Page level plugins -->
            <script src="{{ asset('sbadmin/vendor/chart.js/Chart.min.js') }}"></script>

            <!-- Page level custom scripts -->
            <script src="{{ asset('sbadmin/js/demo/chart-area-demo.js') }}"></script>
            <script src="{{ asset('sbadmin/js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>
