{{-- <!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">DKM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Toko:</h6>
                <a class="collapse-item" href="{{route('produkhewan')}}">Produk</a>
                <a class="collapse-item" href="{{route('metode')}}">Metode Pembayaran</a>
                <a class="collapse-item" href="{{route('datatabungan.index')}}">Tabungan</a>
                <a class="collapse-item" href="{{route('indabar.index')}}">Input Tabungan</a>
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
        <div id="collapseTabungan" class="collapse" aria-labelledby="headingTabungan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('pembin')}}">Pembagian Penagihan</a>
                <a class="collapse-item" href="{{route('admin.showAssignForm')}}">Pembagian Penagihan</a>
                <a class="collapse-item" href="{{route('penu')}}">Penagihan Penabung</a>
                <a class="collapse-item" href="{{route('tabamin')}}">History Tabungan</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettings"
        aria-expanded="true" aria-controls="collapseSettings">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Settings</span>
    </a>
    <div id="collapseSettings" class="collapse" aria-labelledby="headingSettings" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('setadusr')}}">Setting Akun</a>
            <a class="collapse-item" href="{{route('informasiadmin')}}">Informasi</a>
            <a class="collapse-item" href="{{route('kontakadmin')}}">Kontak</a>
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
 --}}
