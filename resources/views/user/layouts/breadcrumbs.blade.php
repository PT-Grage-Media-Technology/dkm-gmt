@if (Route::currentRouteName() === 'tabungan.input') <!-- Menyesuaikan dengan route name -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="inline-flex space-x-1 items-center rounded-md bg-blue-gray-50 bg-opacity-60 py-2 px-3">
        <li class="flex cursor-pointer items-center text-sm font-normal text-blue-gray-900 hover:text-pink-500">
            <a class="opacity-60" href="{{ route('produk') }}">
                <span>Produk</span>
            </a>
            <span class="mx-1 text-blue-gray-500">/</span>
        </li>
        <li class="flex cursor-pointer items-center text-sm font-normal text-blue-gray-900 hover:text-pink-500">
            <a class="font-medium text-blue-gray-900" href="#">
                Input Tabungan
            </a>
            <span class="mx-1 text-blue-gray-500">/</span>
        </li>
        <li class="flex cursor-pointer items-center text-sm font-normal text-blue-gray-900 hover:text-pink-500">
            <a class="opacity-60" href="{{ route('tabungan.index') }}">
                <span>Tabungan</span>
            </a>
        </li>
    </ol>
</nav>
@endif
