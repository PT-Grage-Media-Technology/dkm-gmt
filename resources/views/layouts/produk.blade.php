@extends('layouts.master')
@section('content')
@include('includes.nav')


<!-- Start Banner Hero -->
<div id="work_single_banner" class="bg-light w-100" style="background-image: url('{{ asset('landing/assets/img/masjid.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container-fluid text-light d-flex justify-content-center align-items-center border-0 rounded-0 p-0 py-5">
        <div class="banner-content col-lg-8 m-lg-auto text-center py-5 px-3">
                <h1 class="banner-heading h2 pb-5 typo-space-line-center">MARI BERKURBAN</<h1>
                </h1>
                <h3 class="h4 pb-2 light-300">Pilih Pilihan Hewan Yang Anda Inginkan</h3>
                <p class="banner-footer light-300">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Integer ut ipsum eu libero venenatis euismod.
                </p>
            </div>
        </div>
    </div>
    <div class="topnav">
  <div class="search-container">
    <form action="{{ route('produk') }}" method="GET" class="search-form">
      <input type="text" placeholder="Search.." name="search" value="{{ $search }}" class="input-search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

    <section class="container overflow-hidden py-5">
    <div class="row gx-5 gx-sm-3 gx-lg-5 gy-lg-5 gy-3 pb-3 projects">
        @if ($produkhewan->isEmpty())
            <p>Tidak ada produk yang ditemukan.</p>
        @else
            @foreach($produkhewan as $produk)
                <!-- Start Recent Work -->
                <div class="col-xl-3 col-md-4 col-sm-6 project ui branding">
                    <a href="{{ route('tabungan.show', ['name' => $produk->name]) }}" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                        <img class="service card-img" src="{{ asset('storage/' . $produk->image) }}" alt="Card image" style="width: 100%; height: 350px; object-fit: cover;">
                        <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                            <div class="service-work-content text-left text-light">
                                <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300">Menabung</span>
                                <h2 class="card-text">{{ $produk->name }}</h2>
                                <p class="card-text">Berat: {{ $produk->berat }} kg</p>
                                <p class="card-text">Rp {{ number_format($produk->price, 0, ',', '.') }}/Ekor</p>
                            </div>
                        </div>
                    </a>
                </div><!-- End Recent Work -->
            @endforeach
        @endif
    </div>
</section>

@include('layouts.footer')
@endsection

