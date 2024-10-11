@extends('user.layouts.main')
@section('title', 'Product')

@section('content')
<section class="mx-auto py-12 md:px-8 px-4 xl:px-0">
    <div class="flex flex-col gap-y-7">
        <div class="flex flex-col text-center">
            <h3 class="text-[34px] lg:text-5xl text-indigo-950 font-['Clash_Display'] font-bold mb-5">
             Mari BerQurban
            </h3>
            <p class="text-base leading-lg text-gray-500">
              Pilih Hewan Yang Anda Inginkan!<br class="hidden md:block">

            </p>
        </div>


<!-- This is an example component -->
<div class="max-w-2xl mx-auto">

    <form action="{{ route('produk') }}" method="GET" class="mx-auto flex items-center">
        <input type="search" name="search" value="{{ $search }}" class="text-xs peer cursor-pointer h-8 w-36 rounded-lg border bg-transparent pr-6 outline-none focus:rounded-r-none focus:w-full focus:cursor-text focus:border-taupeGray focus:px-3 px-10" placeholder="Cari Produk..." />

        <!-- Added a custom margin of 5px using inline style -->
        <button type="submit" class="h-8 w-10 px-3 bg-sky-500 rounded-lg" style="margin-left: 5px;">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" fill="white" width="20" height="20" viewBox="0 0 50 50">
                <path d="M 21 3 C 11.601563 3 4 10.601563 4 20 C 4 29.398438 11.601563 37 21 37 C 24.355469 37 27.460938 36.015625 30.09375 34.34375 L 42.375 46.625 L 46.625 42.375 L 34.5 30.28125 C 36.679688 27.421875 38 23.878906 38 20 C 38 10.601563 30.398438 3 21 3 Z M 21 7 C 28.199219 7 34 12.800781 34 20 C 34 27.199219 28.199219 33 21 33 C 13.800781 33 8 27.199219 8 20 C 8 12.800781 13.800781 7 21 7 Z"></path>
            </svg>
        </button>
    </form>

</div>
        <div class="flex flex-wrap gap-y-8 lg:flex-row justify-center gap-x-7 items-center">

            @forelse ($produkhewan as $item)
            <div class="p-4 bg-white shadow-md rounded-[16px] min-h-[320px]">
                <div class="bg-white w-[250px] rounded-[16px] overflow-hidden relative">
                    <div class="group relative">
                        <div
                            class="group-hover:opacity-100 transition-all ease-in-out duration-500 absolute opacity-0 bottom-8 justify-center flex w-full">
                            <a href="{{ route('tabungan.show', ['id' => $item->id]) }}"
                                class="transition-all ease-in-out duration-500 shadow-2xl shadow-orange-400 hover:bg-orange-400 hover:text-white bg-sky-500 px-7 py-3 font-semibold rounded-full text-white text-base">
                                Menabung
                            </a>
                        </div>
                        <img src="{{ 'storage/'.$item->image }}" alt=""
                            class="w-full h-[220px] object-cover border-0 group-hover:border-4 border-sky-500 transition-all ease-in-out duration-500">
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between">
                            <h1 class="font-bold">{{$item->name}}</h1>

                        </div>
                        <div class="flex justify-between mt-2">
                            <h1><span class="font-semibold">Berat: </span>{{$item->berat}}</h1>
                        </div>
                        <div class="flex justify-between mt-2">
                            <p><span class="font-semibold">Harga: </span>{{number_format($item->price)}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p>Tidak ada data</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
