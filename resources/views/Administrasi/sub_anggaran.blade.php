


@if (session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000,
                background: '#e2f9e1', // background alert
                toast: true, // tampilkan sebagai toast
                position: 'top-end' // posisi di kanan atas
            });
        });
    </script>
@endif

@if (session('error'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 100000,
                background: '#f8d7da', // background alert
                toast: true, // t  er como toast
                position: 'top-end' // posisi di kanan atas
            });
        });
    </script>
@endif

<div class="w-full mx-auto my-6">
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
        <div class="w-full sm:w-auto">
            <a href="{{ route('Administrasi.administrasi') }}"
                class="group w-full sm:w-auto flex items-center justify-center px-6 py-3 bg-gradient-to-r from-purple-500 to-indigo-600 text-white text-sm font-medium rounded-md hover:from-purple-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 ease-in-out">
                <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform duration-300 ease-in-out"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>
        <div class="w-full sm:w-auto">
            <div class="w-full sm:w-auto">
                <button class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-600 mr-2"
                    onclick="openModal('addSubAnggaranModal')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Sub Anggaran
                </button>
            </div>
        </div>
    </div>
</div>


<div class="p-6 bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">
        Daftar Sub Anggaran
    </h2>
    <p class="mb-6 text-sm text-gray-600 dark:text-gray-400">
        Pilih Daftar Sub Anggaran...
    </p>

    <!-- Table Start -->
    <div>
        <div class="mb-4 flex flex-col sm:flex-row justify-between items-center">
            <div class="flex flex-row mb-2 sm:mb-0">
                <div class="relative mr-2">
                    <select id="perPage" onchange="changePerPage()"
                        class="appearance-none bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-700 focus:border-blue-500 focus:ring-0">
                        <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20</option>
                        <option value="-1" {{ request('per_page') == -1 ? 'selected' : '' }}>All</option>
                    </select>
                    <div
                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 dark:text-gray-200">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>
            <form method="GET" action="{{ route('Administrasi.show', ['id' => $administrasi->id]) }}">
                <div class="relative">
                    <input type="text" name="search" placeholder="Cari"
                        class="bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 block w-full appearance-none leading-normal focus:outline-none focus:ring-0 focus:border-blue-500 pl-10"
                        value="{{ request()->get('search') }}">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </form>


        </div>

        <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow overflow-y-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            No Detail</th>
                        <th
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Kode Product</th>
                        <th
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Nama Anggaran</th>
                        <th
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Kelompok Anggaran</th>
                        <th
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Satuan</th>
                        <th
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Kuantitas</th>
                        <th
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Harga Satuan</th>
                        <th
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Jumlah Harga</th>
                        <th
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody
                    class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700 items-center text-center justify-center">
                    @forelse ($subAnggarans as $anggaran)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                {{ $anggaran->no_detail }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                {{ $anggaran->product->kode_produk }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                {{ $anggaran->product->nama_produk }}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                {{ $anggaran->anggaran->nama_anggaran }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                {{ $anggaran->product->satuan->nama_satuan }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                {{ $anggaran->kuantitas }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                {{ number_format($anggaran->harga_satuan, 2) }} <!-- Format angka -->
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                {{ number_format($anggaran->kuantitas * $anggaran->harga_satuan, 2) }}
                                <!-- Format angka -->
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button
                                    class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-600 mr-2"
                                    onclick="openModal('editSubAnggaranModal_{{ $anggaran->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit
                                </button>

                                <form action="{{ route('Administrasi.sub_anggaran.destroy', $anggaran->id) }}"
                                    method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-600"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus sub anggaran ini?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300 text-center">
                                Tidak ada sub anggaran yang ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if ($pages instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="m-6">
                    {{ $pages->links() }}
                </div>
            @endif
        </div>
        <div class="mt-2 bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="grid grid-cols-2 ">
                <div>

                </div>
                <div class="flex justify-end gap-4 py-2">
                    <div>
                        <label for="subtotal" class="text-white block text-sm font-medium">SubTotal</label>
                        <div class="relative">
                            <input id="subtotal"
                                class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md text-white"
                                type="text" name="subtotal" value="{{ number_format($subtotal, 2, ',', '.') }}"
                                readonly />
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <i class="fa-solid fa-clipboard-list h-5 w-5 text-yellow-400"></i>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="grandTotal" class="text-white block text-sm font-medium">Grand Total</label>
                        <div class="relative">
                            <input id="grandTotal"
                                class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md text-white"
                                type="text" name="grandTotal"
                                value="{{ number_format($grandTotal, 2, ',', '.') }}" readonly />
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <i class="fa-solid fa-file-signature h-5 w-5 text-red-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Table End -->
</div>



<!-- Modal untuk menambah sub anggaran -->
<div id="addSubAnggaranModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-95 z-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-gray-900 rounded-lg shadow-lg p-6 w-full max-w-4xl">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-white">Tambah Sub Anggaran</h2>
                <button onclick="closeModal('addSubAnggaranModal')" class="text-gray-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <form action="{{ route('Administrasi.sub_anggaran.store') }}" method="POST" class="space-y-6">
                @csrf
                @method('POST')
                <input type="hidden" name="administrasi_id" value="{{ $administrasi->id }}">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- No Detail -->
                    <div>
                        <label for="no_detail" class="block text-sm font-medium text-gray-400 mb-1">No Detail</label>
                        <input id="no_detail" type="text" name="no_detail" value="{{ $nextKodeDetail }}"
                            class="block w-full px-3 py-2 rounded-md bg-gray-700 border border-gray-600 placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            readonly />
                    </div>

                    <!-- Product ID -->
                    <div>
                        <label for="product_id" class="block text-sm font-medium text-gray-400 mb-1">Product</label>
                        <div class="relative">

                            <input id="product_id" type="hidden" name="product_id" value="" readonly
                                class=" block w-full px-3 py-2 pr-10 rounded-md bg-gray-700 border border-gray-600 text-white" />

                            <input id="nama_produk" type="text" name="nama_produk" value="" readonly
                                class="block w-full px-3 py-2 pr-10 rounded-md bg-gray-700 border border-gray-600 text-white" />

                            <button type="button" class="absolute right-3 top-3 text-gray-400 hover:text-white"
                                onclick="openModal('modal_product')">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Anggaran ID -->
                    <div>
                        <label for="anggaran_id" class="block text-sm font-medium text-gray-400 mb-1">Anggaran</label>
                        <div class="relative">
                            <input id="anggaran_id" type="hidden" name="anggaran_id" value="" readonly
                                class="block w-full px-3 py-2 pr-10 rounded-md bg-gray-700 border border-gray-600 text-white" />

                            <input id="nama_anggaran" type="text" name="nama_anggaran" value="" readonly
                                class="block w-full px-3 py-2 pr-10 rounded-md bg-gray-700 border border-gray-600 text-white" />


                            <button type="button" class="absolute right-3 top-3 text-gray-400 hover:text-white"
                                onclick="openModal('modal_anggarans')">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Kuantitas -->
                    <div>
                        <label for="kuantitas" class="block text-sm font-medium text-gray-400 mb-1">Kuantitas</label>
                        <input type="number" id="kuantitas" name="kuantitas" value="" required
                            class="block w-full px-3 py-2 rounded-md bg-gray-700 border border-gray-600 placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Harga Satuan -->
                    <div>
                        <label for="harga_satuan" class="block text-sm font-medium text-gray-400 mb-1">Harga
                            Satuan</label>
                        <input type="number" id="harga_satuan" name="harga_satuan" value="" required
                            class="block w-full px-3 py-2 rounded-md bg-gray-700 border border-gray-600 placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Jumlah Harga (Readonly, calculated) -->
                    <div>
                        <label for="jumlah_harga" class="block text-sm font-medium text-gray-400 mb-1">Jumlah
                            Harga</label>
                        <input type="number" id="jumlah_harga" name="jumlah_harga" readonly
                            class="block w-full px-3 py-2 rounded-md bg-gray-700 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="flex justify-end mt-6 space-x-3">
                    <button type="button" onclick="closeModal('addSubAnggaranModal')"
                        class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                        Tutup
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                        Simpan
                    </button>
                </div>
            </form>
            @include('Administrasi.modal_product')
            @include('Administrasi.modal_anggaran')
        </div>
    </div>
</div>


<!-- Modal untuk Edit Sub Anggaran -->
@foreach ($subAnggarans as $item)
<div id="editSubAnggaranModal_{{ $item->id }}" class="hidden fixed inset-0 bg-gray-800 bg-opacity-95 z-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-gray-900 rounded-lg shadow-lg p-6 w-full max-w-4xl">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-white">Edit Sub Anggaran</h2>
                <button onclick="closeModal('editSubAnggaranModal_{{ $item->id }}')" class="text-gray-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form id="editSubAnggaranForm" action="{{ route('Administrasi.sub_anggaran.update', ['id' => $item->id]) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <input type="hidden" name="administrasi_id" value="{{ $item->administrasi_id }}">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- No Detail -->
                    <div>
                        <label for="no_detail" class="block text-sm font-medium text-gray-400 mb-1">No Detail</label>
                        <input id="no_detail" type="text" name="no_detail" value="{{ $item->no_detail }}"
                               class="block w-full px-3 py-2 rounded-md bg-gray-700 border border-gray-600 placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly />
                    </div>

                    <!-- Product ID (with search dropdown) -->
                    <div>
                        <label for="product_id" class="block text-sm font-medium text-gray-400 mb-1">Product</label>
                        <div class="relative">
                            <!-- Product Input Search -->
                            <input type="text" id="searchProduct_{{ $item->id }}" value="{{ $item->product->nama_produk }}"
                                   placeholder="Cari Produk..."
                                   class="block w-full px-3 py-2 rounded-md bg-gray-700 border border-gray-600 text-white focus:outline-none">
                            <ul id="productDropdown_{{ $item->id }}"
                                class="absolute bg-gray-700 border border-gray-600 mt-2 rounded-md w-full z-10 max-h-40 overflow-y-auto hidden">
                                @foreach($product as $products)
                                    <li data-id="{{ $products->id }}" class="px-3 py-2 hover:bg-gray-600 cursor-pointer text-white">{{ $products->nama_produk }}</li>
                                @endforeach
                            </ul>
                            <!-- Hidden input for selected Product ID -->
                            <input type="hidden" id="product_id_{{ $item->id }}" name="product_id" value="{{ $item->product->id }}">
                        </div>
                    </div>

                    <!-- Anggaran ID (with search dropdown) -->
                    <div>
                        <label for="anggaran_id" class="block text-sm font-medium text-gray-400 mb-1">Anggaran</label>
                        <div class="relative">
                            <!-- Anggaran Input Search -->
                            <input type="text" id="searchAnggaran_{{ $item->id }}" value="{{ $item->anggaran->nama_anggaran }}"
                                   placeholder="Cari Anggaran..."
                                   class="block w-full px-3 py-2 rounded-md bg-gray-700 border border-gray-600 text-white focus:outline-none">
                            <ul id="anggaranDropdown_{{ $item->id }}"
                                class="absolute bg-gray-700 border border-gray-600 mt-2 rounded-md w-full z-10 max-h-40 overflow-y-auto hidden">
                                @foreach($anggarans as $anggaran)
                                    <li data-id="{{ $anggaran->id }}" class="px-3 py-2 hover:bg-gray-600 cursor-pointer text-white">{{ $anggaran->nama_anggaran }}</li>
                                @endforeach
                            </ul>
                            <!-- Hidden input for selected Anggaran ID -->
                            <input type="hidden" id="anggaran_id_{{ $item->id }}" name="anggaran_id" value="{{ $item->anggaran->id }}">
                        </div>
                    </div>

                    <!-- Kuantitas -->
                    <div>
                        <label for="kuantitas" class="block text-sm font-medium text-gray-400 mb-1">Kuantitas</label>
                        <input type="number" id="kuantitas" name="kuantitas" value="{{ $item->kuantitas }}" required
                               class="block w-full px-3 py-2 rounded-md bg-gray-700 border border-gray-600 placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Harga Satuan -->
                    <div>
                        <label for="harga_satuan" class="block text-sm font-medium text-gray-400 mb-1">Harga Satuan</label>
                        <input type="number" id="harga_satuan" name="harga_satuan" value="{{ $item->harga_satuan }}" required
                               class="block w-full px-3 py-2 rounded-md bg-gray-700 border border-gray-600 placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Jumlah Harga (Readonly, calculated) -->
                    <div>
                        <label for="jumlah_harga" class="block text-sm font-medium text-gray-400 mb-1">Jumlah Harga</label>
                        <input type="number" id="jumlah_harga" name="jumlah_harga" value="{{ $item->kuantitas * $item->harga_satuan }}" readonly
                               class="block w-full px-3 py-2 rounded-md bg-gray-700 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="flex justify-end mt-6 space-x-3">
                    <button type="button" onclick="closeModal('editSubAnggaranModal_{{ $item->id }}')" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-900">Tutup</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-900">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach









<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent scrolling when modal is open
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        document.body.style.overflow = ''; // Restore scrolling when modal is closed
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Dapatkan elemen input kuantitas, harga_satuan, dan jumlah_harga
        var kuantitasInput = document.getElementById('kuantitas');
        var hargaSatuanInput = document.getElementById('harga_satuan');
        var jumlahHargaInput = document.getElementById('jumlah_harga');

        // Fungsi untuk menghitung jumlah harga
        function hitungJumlahHarga() {
            var kuantitas = parseFloat(kuantitasInput.value) || 0;
            var hargaSatuan = parseFloat(hargaSatuanInput.value) || 0;
            var jumlahHarga = kuantitas * hargaSatuan;
            jumlahHargaInput.value = jumlahHarga.toFixed(2); // Mengatur 2 desimal
        }

        // Tambahkan event listener pada input kuantitas dan harga_satuan
        kuantitasInput.addEventListener('input', hitungJumlahHarga);
        hargaSatuanInput.addEventListener('input', hitungJumlahHarga);
    });

    @foreach ($subAnggarans as $item)
        setupDropdownSearch('searchProduct_{{ $item->id }}', 'productDropdown_{{ $item->id }}', 'product_id_{{ $item->id }}');
        setupDropdownSearch('searchAnggaran_{{ $item->id }}', 'anggaranDropdown_{{ $item->id }}', 'anggaran_id_{{ $item->id }}');
        @endforeach

        function setupDropdownSearch(searchInputId, dropdownId, hiddenInputId) {
            const searchInput = document.getElementById(searchInputId);
            const dropdown = document.getElementById(dropdownId);
            const hiddenInput = document.getElementById(hiddenInputId);
            const dropdownItems = dropdown.querySelectorAll('li');

            searchInput.addEventListener('input', function () {
                const filter = searchInput.value.toLowerCase();
                dropdown.style.display = 'block'; // Show dropdown
                dropdownItems.forEach(item => {
                    const text = item.textContent.toLowerCase();
                    item.style.display = text.includes(filter) ? '' : 'none';
                });
            });

            dropdownItems.forEach(item => {
                item.addEventListener('click', function () {
                    searchInput.value = item.textContent; // Set the input to selected text
                    hiddenInput.value = item.getAttribute('data-id'); // Update hidden input
                    dropdown.style.display = 'none'; // Hide dropdown after selection
                });
            });

            document.addEventListener('click', function (e) {
                if (!dropdown.contains(e.target) && !searchInput.contains(e.target)) {
                    dropdown.style.display = 'none'; // Hide dropdown when clicking outside
                }
            });
        }

    function changePerPage() {
        var perPage = document.getElementById('perPage').value;
        var currentUrl = new URL(window.location.href);
        currentUrl.searchParams.set('per_page', perPage);
        window.location.href = currentUrl.toString();
    }
    setTimeout(function() {
        let alert = document.querySelector('.bg-green-500');
        if (alert) {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500); // Hapus setelah transisi selesai
        }
    }, 3000);
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const setupDropdown = (searchInputId, dropdownId, hiddenInputId) => {
            const searchInput = document.getElementById(searchInputId);
            const dropdown = document.getElementById(dropdownId);
            const hiddenInput = document.getElementById(hiddenInputId);

            searchInput.addEventListener('focus', () => dropdown.classList.remove('hidden'));
            searchInput.addEventListener('blur', () => setTimeout(() => dropdown.classList.add('hidden'), 200));

            searchInput.addEventListener('input', function() {
                const filter = this.value.toLowerCase();
                Array.from(dropdown.children).forEach(item => {
                    const text = item.textContent.toLowerCase();
                    item.style.display = text.includes(filter) ? '' : 'none';
                });
                dropdown.classList.remove('hidden');
            });

            dropdown.addEventListener('click', function(e) {
                if (e.target.tagName === 'LI') {
                    searchInput.value = e.target.textContent;
                    hiddenInput.value = e.target.dataset.id;
                    dropdown.classList.add('hidden');
                }
            });
        };

        // 
        // Calculate Jumlah Harga
        const kuantitasInput = document.getElementById('kuantitas');
        const hargaSatuanInput = document.getElementById('harga_satuan');
        const jumlahHargaInput = document.getElementById('jumlah_harga');

        const calculateJumlahHarga = () => {
            const kuantitas = parseFloat(kuantitasInput.value) || 0;
            const hargaSatuan = parseFloat(hargaSatuanInput.value) || 0;
            jumlahHargaInput.value = (kuantitas * hargaSatuan).toFixed(2);
        };

        kuantitasInput.addEventListener('input', calculateJumlahHarga);
        hargaSatuanInput.addEventListener('input', calculateJumlahHarga);
    });
    </script>
