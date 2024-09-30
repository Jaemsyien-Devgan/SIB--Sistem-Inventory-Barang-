<div class="py-2">
    <div class="w-full max-auto">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-700 border-1 p-4">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 pt-2 pl-6">
                Tambahkan Data Administrasi Proyek
            </h2>
            <form id="administrasiForm" method="POST" action="{{ route('Administrasi.administrasi.store') }}">
                @csrf
                <div class="p-6 text-gray-100 grid gap-6">
                    <div class="w-full">
                        <label for="kode_proyek" class="block text-sm font-medium">Kode Proyek</label>
                        <div class="relative">
                            <input id="kode_proyek"
                                class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md" type="text"
                                name="kode_proyek" value="{{ old('kode_proyek') }}" readonly />
                            <input id="proyek_id" type="hidden" name="proyek_id" />
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-green-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                            <button type="button" class="absolute right-2 top-1.5 text-white rounded-md p-1"
                                onclick="openModal('modal_administrasi')">
                                <svg class="w-5 h-5 hover:text-blue-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                            @error('kode_proyek')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="nama_proyek" class="block text-sm font-medium">Nama Proyek</label>
                            <div class="relative">
                                <input id="nama_proyek"
                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                    type="text" name="nama_proyek" value="{{ old('nama_proyek') }}" readonly />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-pink-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                    </svg>
                                </div>
                            </div>
                            @error('nama_proyek')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="status" class="block text-sm font-medium">Status Proyek</label>
                                <div class="relative">
                                    <input id="status"
                                        class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                        type="text" name="status" value="{{ old('status') }}" readonly />
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="h-5 w-5 text-orange-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                        </svg>
                                    </div>
                                </div>
                                @error('status')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex justify-center items-center my-2 py-4">
                                <button type="submit"
                                    class="bg-gray-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 rounded-lg inline-flex items-center py-">
                                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Add Administrasi
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Table Daftar -->
<div class="p-6 bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">
        Daftar Administrasi Proyek
    </h2>
    <p class="mb-6 text-sm text-gray-600 dark:text-gray-400">
        Pilih Daftar Administrasi Proyek...
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
                <form action="{{ route('Administrasi.administrasi') }}" method="GET" id="status-form">
                    @csrf
                    <div class="relative">
                        <select id="status-filter" name="status" onchange="document.getElementById('status-form').submit()"
                            class="appearance-none bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-700 focus:border-blue-500 focus:ring-0">
                            <option value="">Semua</option>
                            <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="tidak_aktif" {{ request('status') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 dark:text-gray-200">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </form>

            </div>
            <form method="GET" action="">
                <div class="relative">
                    <input type="text" name="search" placeholder="Cari"
                        class="bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 block w-full appearance-none leading-normal focus:outline-none focus:ring-0 focus:border-blue-500 pl-10"
                        value="">
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
                            Kode Proyek</th>
                        <th
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Nama Proyek</th>
                        <th
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Status</th>
                        <th
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody
                    class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700 items-center text-center justify-center">
                    @forelse ($administrasis as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                {{ $item->kode_proyek }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                {{ $item->nama_proyek }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $item->status }}
                                </span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center justify-center space-x-4 h-full">
                                    <button class="flex items-center text-blue-500 hover:text-blue-700 transition duration-200"
                                            onclick="openModal({{ $item->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <span class="ml-1">Edit</span>
                                    </button>

                                    <a href="{{ route('Administrasi.show', $item->id) }}"
                                       class="flex items-center text-teal-500 hover:text-teal-700 transition duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <span class="ml-1">Detail</span>
                                    </a>

                                    <form action="{{ route('Administrasi.administrasi.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="flex items-center text-red-500 hover:text-red-700 transition duration-200"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus Administrasi ini?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            <span class="ml-1">Delete</span>
                                        </button>
                                    </form>
                                </div>
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
            @if ($administrasis instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="m-6">
                    {{ $administrasis->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </div>
    <!-- Table End -->
</div>

<!-- Modal Start -->
<div id="modal_administrasi" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title"
    role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full h-full">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-100">Administrasi Proyek</h2>
                <p class="mt-1 text-sm text-gray-400">Pilih Administrasi Proyek...</p>
                <div class="mt-4">
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                        <div class="relative">
                            <input id="modalSearchInput" placeholder="Cari"
                                class="appearance-none bg-gray-700 rounded-md border border-gray-600 pl-10 pr-4 py-2 w-full text-sm placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto rounded-lg border border-gray-700">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead class="bg-gray-800">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Kode Proyek</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Nama Proyek</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="modalProjectTableBody" class="bg-gray-900 divide-y divide-gray-700">
                                @foreach ($proyek as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                            {{ $item->kode_proyek }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                            {{ $item->nama_proyek }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                            {{ $item->status }}</td>
                                        <td class="px-4 py-2 whitespace-nowrap text-sm font-medium">
                                            <button
                                                class="bg-green-100 text-indigo-400 hover:text-indigo-600 transition duration-300 ease-in-out transform hover:scale-110 p-1 rounded-lg"
                                                onclick="selectproyek('{{ $item->id }}', '{{ $item->kode_proyek }}', '{{ $item->nama_proyek }}', '{{ $item->status }}')">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button class="bg-gray-600 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded"
                        onclick="closeModal('modal_administrasi')">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->




@foreach ($administrasis as $items)
    <div id="modal_administrasis{{ $items->id }}" class="fixed z-10 inset-0 overflow-y-auto hidden"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                <div class="p-6">
                    <h2 class="text-2xl font-medium text-gray-100 mb-4">Edit Data proyek ANggaran</h2>
                    <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-700 p-6">
                        <!-- Edit Form -->
                        <form method="POST" action="{{ route('Administrasi.update', $items->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="p-6 text-gray-100 grid gap-6">

                                <div class="grid grid-cols-2 gap-6">
                                    <div>
                                        <label for="kode_proyek" class="block text-sm font-medium">Kode Proyek</label>
                                        <div class="relative">
                                            <input id="kode_proyek"
                                                class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                                type="text" name="kode_proyek" value="{{ $items->kode_proyek }}"
                                                readonly/>
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                <i class="fa-solid fa-clipboard-list h-5 w-5 text-yellow-400"></i>
                                            </div>
                                            @error('kode_proyek')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="nama_proyek" class="block text-sm font-medium">Nama Proyek</label>
                                        <div class="relative">
                                            <input id="nama_proyek"
                                                class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                                type="text" name="nama_proyek" value="{{ $items->nama_proyek }}"
                                                readonly />
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                <i class="fa-solid fa-file-signature h-5 w-5 text-red-400"></i>
                                            </div>
                                        </div>
                                        @error('nama_proyek')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-6">
                                    <div>
                                        <label for="status" class="block text-sm font-medium">Status</label>
                                        <div class="relative">
                                            <input id="status"
                                                class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                                type="text" name="status" value="{{ $items->status }}"
                                                readonly />
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                <i class="fa-solid fa-hashtag h-5 w-5 text-green-400"></i>
                                            </div>
                                        </div>
                                        @error('status')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="mt-6 flex justify-end space-x-3">
                                <button type="button"
                                    class="bg-gray-600 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded"
                                    onclick="closeModal({{ $items->id }})">Close</button>
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- Modal End -->



<script>
    function openModal(id) {
        // Menghapus class 'hidden' untuk modal dengan ID yang sesuai
        document.getElementById(`modal_administrasi`).classList.remove('hidden');
        document.getElementById(`modal_administrasis${id}`).classList.remove('hidden');
    }

    function closeModal(id) {
        // Menambahkan class 'hidden' untuk modal dengan ID yang sesuai
        document.getElementById(`modal_administrasi`).classList.add('hidden');
        document.getElementById(`modal_administrasis${id}`).classList.add('hidden');
    }

    function selectproyek(id, kode_proyek, nama_proyek, status_proyek) {
        console.log(id, kode_proyek, nama_proyek, status_proyek);
        // Mengisi input tersembunyi dengan ID proyek
        document.getElementById('proyek_id').value = id;

        // Mengisi input Kode Proyek
        document.getElementById('kode_proyek').value = kode_proyek;

        // Mengisi input Nama Proyek
        document.getElementById('nama_proyek').value = nama_proyek;

        // Mengisi input Status Proyek
        document.getElementById('status').value = status_proyek;

        // Menutup modal
        closeModal('modal_administrasi');
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
        const modalSearchInput = document.getElementById('modalSearchInput');
        const modalTableBody = document.getElementById('modalProjectTableBody');
        const originalModalRows = Array.from(modalTableBody.querySelectorAll('tr'));

        // Fungsi untuk memfilter dan memperbarui tabel di modal
        function filterModalTable() {
            const searchTerm = modalSearchInput.value.toLowerCase();
            const filteredRows = originalModalRows.filter(row => {
                const kodeProyek = row.cells[0].textContent.toLowerCase();
                const namaProyek = row.cells[1].textContent.toLowerCase();
                return (
                    kodeProyek.includes(searchTerm) ||
                    namaProyek.includes(searchTerm)
                );
            });

            // Clear the modal table body
            modalTableBody.innerHTML = '';

            // Jika tidak ada hasil, tambahkan pesan
            if (filteredRows.length === 0) {
                const noResultsRow = document.createElement('tr');
                const noResultsCell = document.createElement('td');
                noResultsCell.colSpan = 4; // Mengatur colspan sesuai jumlah kolom
                noResultsCell.className = 'px-6 py-4 text-center text-sm text-gray-500';
                noResultsCell.textContent = 'Daftar proyek tidak ditemukan';
                noResultsRow.appendChild(noResultsCell);
                modalTableBody.appendChild(noResultsRow);
            } else {
                // Tambahkan baris hasil pencarian
                filteredRows.forEach(row => {
                    modalTableBody.appendChild(row);
                });
            }
        }

        // Event listener untuk input pencarian di modal
        modalSearchInput.addEventListener('input', filterModalTable);
    });
</script>
