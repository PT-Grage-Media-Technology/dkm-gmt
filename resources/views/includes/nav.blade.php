<nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
    <div class="container d-flex justify-content-between align-items-center">
    <a class="navbar-brand h1" href="index.html">
            <i class='bx bx-buildings bx-sm text-dark'></i>
            <span class="text-dark h4">DKM</span>
        </a>

        <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between" id="navbar-toggler-success">
            <div class="flex-fill mx-xl-5 mb-2 d-flex justify-content-end">
                <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
                    <li class="nav-item">
                        <a class="nav-link btn-outline-primary rounded-pill px-3" href="{{route('beranda')}}">Beranda</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link btn-outline-primary rounded-pill px-3" href="{{route('produk')}}">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-outline-primary rounded-pill px-3" href="{{route('contact1')}}">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-outline-primary rounded-pill px-3" href="{{route('tentang')}}">Tentang</a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0)">
                            @if(Auth::user()->profile_user)
                                <i class="bi bi-person-circle profile-icon" src="{{ asset('storage/profile_user/' . Auth::user()->profile_user) }}"></i>
                            @else
                                <i class="bi bi-person-circle profile-icon"></i>
                            @endif
                        </a>
                        <div class="dropdown-content">
                            <a href="{{ route('settingAkun') }}">Setting Akun</a>
                            <a href="{{ route('logout') }}">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<style>
    .profile-icon {
        width: 30px;
        height: 30px;
        font-size: 30px;
        color: white;
    }
</style>
