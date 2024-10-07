@extends('user.layouts.main')
@section('title', 'Home')

@section('content')
 <!-- end mega menu floating dropdown -->
 <section class="hero max-w-6xl md:px-8 px-4 mx-auto py-12 xl:px-0">
    <div class="flex flex-col gap-y-10 md:flex-row md:justify-between items-center">
        <div class="gap-y-10 flex flex-col md:basis-2/4 lg:basis-3/6">
            {{-- <div class="flex py-2 flex-row small-badge items-center bg-white rounded-full gap-x-2 px-3 w-fit">
        </div> --}}

            <div>
                <h1
                    class="lg:text-[70px] text-[40px] text-indigo-950 font-['Clash_Display'] font-bold leading-none mb-3">
                    Tabungan<br>
                    Kurban
                </h1>
                <p class="text-base leading-loose text-gray-500">
                Rencanakan dan persiapkan kurban Anda dengan cara yang praktis dan transparan.
                Mulai menabung hari ini untuk memastikan kurban Anda terlaksana dengan baik.
                </p>
            </div>
        </div>
        <div class="flex items-center flex-col">
            <img src="assets/berandaimg.png" class="h-[397px] md:basis-2/4 lg:h-[550px]" alt="">
        </div>
    </div>
</section>

<!-- component -->
<div>
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <ul
          role="list"
          class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-0 gap-y-0 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        <li v-for="person in people" :key="person.name">
            <ul role="list" class="mt-3 flex justify-center gap-x-3">
              <div class="m-2 space-y-2">
                <div class="group flex flex-col gap-1 rounded-lg p-2 text-gray" tabindex="1">
                    {{-- <div style="width:300px;" class="group relative m-0 flex h-72 w-72 rounded-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg"> --}}
                    <div class="group relative m-0 flex lg:h-72 lg:w-72 h-64 w-64 rounded-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                    <img src="assets/boer kambing.jpeg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="" />
                </div>
                <div style="background-color: Gray; width:70%;" class="p-3 rounded-xl opacity-60 absolute bottom-0 z-20 m-0 pb-4 ps-4 transition duration-300 ease-in-out group-hover:-translate-y-1 group-hover:translate-x-3 group-hover:scale-110 group-hover:opacity-100">
                    <h1 class="text-lg font-bold text-white ">Kambing Boer</h1>
                </div>
              </div>
                  <div class="invisible h-auto max-h-0 p-5 items-center opacity-0 transition-all group-focus:visible group-focus:max-h-screen group-focus:opacity-100 group-focus:duration-1000">
                  </div>
                </div>
              </div>
            </ul>
          </li>

        <li v-for="person in people" :key="person.name">
            <ul role="list" class="mt-3 flex justify-center gap-x-3">
              <div class="m-2 space-y-2">
                <div class="group flex flex-col gap-1 rounded-lg p-2 text-gray" tabindex="1">
                    {{-- <div style="width:300px;" class="group relative m-0 flex h-72 w-72 rounded-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg"> --}}
                    <div class="group relative m-0 flex lg:h-72 lg:w-72 h-64 w-64 rounded-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                    <img src="assets/ongole.jpeg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="" />
                </div>
                <div style="background-color: Gray; width:70%;" class="p-3 rounded-xl opacity-60 absolute bottom-0 z-20 m-0 pb-4 ps-4 transition duration-300 ease-in-out group-hover:-translate-y-1 group-hover:translate-x-3 group-hover:scale-110 group-hover:opacity-100">
                    <h1 class="text-lg font-bold text-white ">Sapi Ongole</h1>
                </div>
              </div>
                  <div class="invisible h-auto max-h-0 p-5 items-center opacity-0 transition-all group-focus:visible group-focus:max-h-screen group-focus:opacity-100 group-focus:duration-1000">
                  </div>
                </div>
              </div>
            </ul>
          </li>


            <ul role="list" class="mt-3 flex justify-center gap-x-3">
              <div class="m-2 space-y-2">
                <div
                  class="group flex flex-col gap-1 rounded-lg p-2 text-gray"
                  tabindex="1">
                    {{-- <div style="width:300px;" class="group relative m-0 flex h-72 w-72 rounded-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg"> --}}
                    <div class="group relative m-0 flex lg:h-72 lg:w-72 h-64 w-64 rounded-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                    <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                    <img src="assets/kambing.jpeg" class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" alt="" />
                </div>
                <div style="background-color: Gray; width:70%;" class="p-3 rounded-xl opacity-60 absolute bottom-0 z-20 m-0 pb-4 ps-4 transition duration-300 ease-in-out group-hover:-translate-y-1 group-hover:translate-x-3 group-hover:scale-110 group-hover:opacity-100">
                    <h1 class="text-lg font-bold text-white ">Kambing Etawa</h1>
                </div>
              </div>
                  </div>
                </div>
              </div>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>

@endsection

