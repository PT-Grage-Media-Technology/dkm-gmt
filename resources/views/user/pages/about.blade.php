@extends('user.layouts.main')
@section('title', 'About')

@section('content')
<section class="max-w-6xl mx-auto py-12 md:px-8 px-4 xl:px-0">
    <div class="flex flex-col md:flex-row gap-y-10 justify-start gap-x-10 lg:gap-x-24">
        <div class="flex items-center flex-col">
            <img src="{{ asset('assets/qurban.png') }}" class="h-[360px] lg:h-[550px]" alt="">
        </div>
        <div class="flex flex-col text-left gap-y-10 basis-2/4 pt-20">
            <h3 class="leading-tight md:leading-lg text-[34px] lg:text-5xl text-indigo-950 font-bold mb-5">
                Tentang Kami<br class="hidden lg:block">
            </h3>
            <p class="text-base leading-lg text-gray-500">
                @php
                    $info = App\Models\InfoKoAdmin::first();
                @endphp
                @if($info)
                    {{ $info->description }}
                @else
                    Data tidak ditemukan
                @endif
            </p>
        </div>
    </div>
</section>
@endsection
