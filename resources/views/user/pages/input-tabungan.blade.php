

<!-- component -->
<div class="flex h-screen bg-gray-200 items-center justify-center  mt-32 mb-32">
    <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
      <div class="flex justify-center py-4">
        
      </div>
  
      <div class="flex justify-center">
        <div class="flex">
          
        </div>
      </div>
      @if($tabungankur->isNotEmpty())
      @php
          $data = $tabungankur->last();
      @endphp
      <div class="grid grid-cols-1 mt-5 mx-7">
        <label for="awal_waktu_tabungan" class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Input 1</label>
        <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="date" id="awal_waktu_tabungan" name="awal_waktu_tabungan" value="{{ $data->awal_waktu_tabungan }}" readonly />
      </div>

      <div class="grid grid-cols-1 mt-5 mx-7">
        <label for="targetWaktuTabungan" class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Input 1</label>
        <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" id="target_waktu_tabungan" name="target_waktu_tabungan" value="{{ $data->target_waktu_tabungan }}" readonly />
      </div>

      <div class="grid grid-cols-1 mt-5 mx-7">
        <label for="jumlahCicilan" class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Input 1</label>
        <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" id="target_waktu_tabungan" name="target_waktu_tabungan" value="{{ $data->target_waktu_tabungan }}" readonly />
      </div>

      <div class="grid grid-cols-1 mt-5 mx-7">
        <label for="metode_id" class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Input 1</label>
        <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" id="target_waktu_tabungan" name="target_waktu_tabungan" value="{{ $data->target_waktu_tabungan }}" readonly />
      </div>
  
      <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
        <div class="grid grid-cols-1">
          <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Input 2</label>
          <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Input 2" />
        </div>
        <div class="grid grid-cols-1">
          <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Input 3</label>
          <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Input 3" />
        </div>
      </div>
      @endif
      <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
        <a href="{{route('imputalamat')}}" class="btn btn-success btn-block">Isi Lengkap Data Alamat Berikut</a>
      </div>
  
    </div>
  </div>

  @endsection