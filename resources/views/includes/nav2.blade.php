<nav>
    <div class="navbar">
        <div class="logo"><a href="#">DKM</a></div>
        <ul class="menu">
            <li><a href="{{ route('beranda') }}">Beranda</a></li>
            <li><a href="{{ route('produk') }}">Produk</a></li>
            <li><a href="{{ route('tentang') }}">Tentang Kami</a></li>
            <li><a href="{{ route('contact1') }}">Kontak</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    @if(Auth::user()->profile_user)
                        <img id="profileImageNav" src="{{ asset('storage/profile_user/' . Auth::user()->profile_user) }}" alt="Profile Image" class="profile-user">
                    @else
                        <img id="profileImageNav" src="{{ asset('image/profil.png') }}" alt="Default Profile Image" class="profile-user">
                    @endif
                </a>
                <div class="dropdown-content">
                    <a href="{{ route('settingAkun') }}">Setting Akun</a>
                    <a href="{{ route('logout') }}">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

