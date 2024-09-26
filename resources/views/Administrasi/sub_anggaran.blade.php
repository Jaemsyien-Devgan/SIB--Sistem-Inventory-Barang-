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
            <button class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-600 mr-2"
                onclick="openAddSubAnggaranModal()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Sub Anggaran
            </button>
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
                <div class="relative">
                    <select
                        class="appearance-none bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-700 focus:border-blue-500 focus:ring-0">
                        <option>Semua</option>
                        <option>Aktif</option>
                        <option>Tidak Aktif</option>
                    </select>
                    <div
                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 dark:text-gray-200">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>
            <form method="GET" action="">
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
                            Kode Anggaran</th>
                        <th
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Nama Anggaran</th>
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
                    @if ($subAnggarans && $subAnggarans->isNotEmpty())
                        @foreach ($subAnggarans as $anggaran)
                            <tr>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $anggaran->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    {{ $anggaran->kode_anggaran }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    {{ $anggaran->nama_anggaran }}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $anggaran->satuan }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    {{ $anggaran->kuantitas }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    {{ $anggaran->harga_satuan }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    {{ $anggaran->kuantitas * $anggaran->harga_satuan }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button
                                        class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-600 mr-2"
                                        onclick="openModal()">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </button>
                                    <form action="" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-600"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus satuan ini?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300 text-center">
                                No records found.
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>

            {{-- @if ($satuans instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="m-6">
                    {{ $satuans->appends(request()->query())->links() }}
                </div>
            @endif --}}
        </div>
    </div>
    <!-- Table End -->
</div>

<!-- Modal untuk menambah sub anggaran -->
<div id="addSubAnggaranModal"
    class="hidden fixed inset-0 bg-gray-800 bg-opacity-95 flex items-center justify-center p-4">
    <div class="bg-gray-900 rounded-lg shadow-lg p-6 w-full max-w-4xl">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white">Tambah Sub Anggaran</h2>
            <button type="button" class="text-gray-400 hover:text-white" onclick="closeAddSubAnggaranModal()">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form action="{{ route('sub_anggaran.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="administrasi_id" value="{{ $administrasi->id }}">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="kode_anggaran" class="block text-sm font-medium text-gray-400 mb-1">Kode
                        Anggaran</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                            </svg>
                        </span>
                        <input type="text" id="kode_anggaran" value="{{ $nextKodeAnggaran }}"
                            name="kode_anggaran" readonly
                            class="block w-full pl-10 pr-3 py-2 rounded-md bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div>
                    <label for="nama_anggaran" class="block text-sm font-medium text-gray-400 mb-1">Nama
                        Anggaran</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                            </svg>
                        </span>
                        <input type="text" id="nama_anggaran" name="nama_anggaran" required
                            class="block w-full pl-10 pr-3 py-2 rounded-md bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div>
                    <label for="satuan_id" class="block text-sm font-medium text-gray-400 mb-1">Satuan</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                            </svg>
                        </span>
                        <select name="satuan_id" required
                            class="block w-full pl-10 pr-3 py-2 rounded-md bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            @foreach ($satuan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_satuan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label for="kuantitas" class="block text-sm font-medium text-gray-400 mb-1">Kuantitas</label>
                    <div class="relative">
                        <input type="number" id="kuantitas" name="kuantitas" required
                            class="block w-full pl-10 pr-3 py-2 rounded-md bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div>
                    <label for="harga_satuan" class="block text-sm font-medium text-gray-400 mb-1">Harga
                        Satuan</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <input type="number" id="harga_satuan" name="harga_satuan" required
                            class="block w-full pl-10 pr-3 py-2 rounded-md bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div>
                    <label for="jumlah_harga" class="block text-sm font-medium text-gray-400 mb-1">Jumlah
                        Harga</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <input type="number" id="jumlah_harga" name="jumlah_harga" readonly
                            class="block w-full pl-10 pr-3 py-2 rounded-md bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>


                <div class="flex justify-end mt-6 space-x-3">
                    <button type="button" onclick="closeAddSubAnggaranModal()"
                        class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                        Tutup
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                        Simpan
                    </button>
                </div>
        </form>
    </div>
</div>

<script>
    function openAddSubAnggaranModal() {
        document.getElementById('addSubAnggaranModal').classList.remove('hidden');
    }

    function closeAddSubAnggaranModal() {
        document.getElementById('addSubAnggaranModal').classList.add('hidden');
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
</script>
