@extends('layouts.app')

@section('title', 'Supplier')

@section('content')
    <div class="py-2">
        <div class="w-full mx-auto">
            <form action="{{ route('supplier.store') }}" method="POST">
                @csrf
                <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-700 border-1 p-4">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-2 pl-6">
                        Tambahkan Data Supplier
                    </h2>
                    <div class="p-6 text-gray-100 grid gap-6">
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="kode_supplier" class="block text-sm font-medium">Kode Supplier</label>
                                <div class="relative">
                                    <input id="kode_supplier"
                                    value="{{ $nextKodeSupplier }}"
                                        class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                        type="text" name="kode_supplier" readonly autofocus />
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <i class="fas fa-barcode text-lg text-yellow-400"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="nama_supplier" class="block text-sm font-medium">Nama Supplier</label>
                                <div class="relative">
                                    <input id="nama_supplier"
                                        class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                        type="text" name="nama_supplier" required />
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <i class="fas fa-user text-lg text-blue-400"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="alamat_supplier" class="block text-sm font-medium">Alamat Supplier</label>
                                <div class="relative">
                                    <input id="alamat_supplier"
                                        class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                        type="text" name="alamat_supplier" required autofocus />
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <i class="fas fa-map-marker-alt text-lg text-red-400"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="telepon_supplier" class="block text-sm font-medium">Telepon Supplier</label>
                                <div class="relative">
                                    <input id="telepon_supplier"
                                        class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                        type="text" name="telepon_supplier" required />
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <i class="fas fa-phone-alt text-lg text-green-400"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="tanggal_bergabung" class="block text-sm font-medium">Tanggal Bergabung</label>
                                <div class="relative">
                                    <input id="tanggal_bergabung"
                                        class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md text-white"
                                        type="date" name="tanggal_bergabung" value="{{ date('Y-m-d') }}" required />
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <i class="fas fa-calendar-alt text-lg text-purple-400"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="tanggal_berakhir" class="block text-sm font-medium">Tanggal Berakhir</label>
                                <div class="relative">
                                    <input id="tanggal_berakhir"
                                        class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md text-white"
                                        type="date" name="tanggal_berakhir" value="{{ date('Y-m-d') }}" required />
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <i class="fas fa-calendar-times text-lg text-orange-400"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="status" class="block text-sm font-medium">Status</label>
                                <div class="relative">
                                    <select id="status"
                                        class="block mt-1 w-full pl-10 pr-10 py-2 bg-gray-700 border-gray-600 rounded-md appearance-none"
                                        name="status" required>
                                        <option value="status">Pilih Status</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak_aktif">Tidak Aktif</option>
                                    </select>
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <i class="fas fa-toggle-on text-lg text-teal-400"></i>
                                    </div>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <i class="fas fa-chevron-down text-lg text-gray-400"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end items-end">
                                <button type="submit"
                                    class="bg-gray-600  hover:bg-blue-500 text-white text-sm font-bold py-2 px-4 rounded-lg inline-flex items-center transition duration-300">
                                    <i class="fas fa-plus text-lg mr-2"></i>
                                    Add Supplier
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="p-6 bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">
            Daftar Supplier
        </h2>
        <p class="mb-6 text-sm text-gray-600 dark:text-gray-400">
            Pilih Daftar Supplier...
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
                    <form action="{{ route('supplier') }}" method="GET" id="status-form">
                        @csrf
                        <div class="relative">
                            <select id="status-filter" name="status"
                                onchange="document.getElementById('status-form').submit()"
                                class="appearance-none bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-700 focus:border-blue-500 focus:ring-0">
                                <option value="">Semua</option>
                                <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="tidak_aktif" {{ request('status') == 'tidak_aktif' ? 'selected' : '' }}>
                                    Tidak
                                    Aktif</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 dark:text-gray-200">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </form>
                </div>
                <form method="GET" action="{{ route('supplier') }}">
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
                                Kode </th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Nama Supplier</th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Alamat Supplier</th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Telepon </th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Tanggal Bergabung</th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Tanggal Berakhir</th>
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
                        @foreach ($suppliers as $supplier)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $supplier->kode_supplier }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    {{ $supplier->nama_supplier }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    {{ $supplier->alamat_supplier }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    {{ $supplier->telepon_supplier }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    {{ $supplier->tanggal_bergabung }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    {{ $supplier->tanggal_berakhir }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $supplier->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button
                                        class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-600 mr-2"
                                        onclick="openModal({{ $supplier->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </button>
                                    <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-600"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus supplier ini?')">
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
                        @endforeach
                    </tbody>
                </table>

                @if ($suppliers instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="m-6">
                        {{ $suppliers->appends(request()->query())->links() }}
                    </div>
                @endif
            </div>
        </div>
        <!-- Table End -->
    </div>


    @foreach ($suppliers as $supplier)
        <div id="modal_supplier_{{ $supplier->id }}" class="fixed z-10 inset-0 overflow-y-auto hidden"
            aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                    <div class="p-6">
                        <h2 class="text-2xl font-medium text-gray-100 mb-4">
                            Edit Data Supplier
                        </h2>
                        <div
                            class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-700 border-1 p-6">
                            <!-- Edit Form -->
                            <form id="editForm" method="POST" action="{{ route('supplier.update', $supplier->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="p-6 text-gray-100 grid gap-6">
                                    <div class="grid grid-cols-2 gap-6">
                                        <div>
                                            <label for="kode_supplier" class="block text-sm font-medium">Kode
                                                Supplier</label>
                                            <div class="relative">
                                                <input id="kode_supplier"
                                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                                    type="text" name="kode_supplier"
                                                    value="{{ $supplier->kode_supplier }}" required autofocus />
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                    <i class="fa-solid fa-clipboard-list h-5 w-5 text-yellow-400"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="nama_supplier" class="block text-sm font-medium">Nama
                                                Supplier</label>
                                            <div class="relative">
                                                <input id="nama_supplier"
                                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                                    type="text" name="nama_supplier"
                                                    value="{{ $supplier->nama_supplier }}" required />
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                    <i class="fa-solid fa-file-signature h-5 w-5 text-red-400"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-6">
                                        <div>
                                            <label for="alamat_supplier" class="block text-sm font-medium">Alamat
                                                Supplier</label>
                                            <div class="relative">
                                                <input id="alamat_supplier"
                                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                                    type="text" name="alamat_supplier"
                                                    value="{{ $supplier->alamat_supplier }}" required autofocus />
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                    <i class="fa-solid fa-clipboard-list h-5 w-5 text-yellow-400"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="telepon_supplier" class="block text-sm font-medium">Telepon
                                                Supplier</label>
                                            <div class="relative">
                                                <input id="telepon_supplier"
                                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                                    type="text" name="telepon_supplier"
                                                    value="{{ $supplier->telepon_supplier }}" required />
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                    <i class="fa-solid fa-file-signature h-5 w-5 text-red-400"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-6">
                                        <div>
                                            <label for="tanggal_bergabung" class="block text-sm font-medium">Tanggal
                                                bergabung</label>
                                            <div class="relative">
                                                <input id="tanggal_bergabung"
                                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                                    type="text" name="tanggal_bergabung"
                                                    value="{{ $supplier->tanggal_bergabung }}" required />
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                    <i class="fas fa-calendar-alt text-lg text-purple-400"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="tanggal_berakhir" class="block text-sm font-medium">Tanggal
                                                Berakhir</label>
                                            <div class="relative">
                                                <input id="tanggal_berakhir"
                                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                                    type="text" name="tanggal_berakhir"
                                                    value="{{ $supplier->tanggal_berakhir }}" required />
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                    <i class="fas fa-calendar-times text-lg text-orange-400"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="status" class="block text-sm font-medium">Status</label>
                                            <div class="relative">
                                                <select id="status" name="status"
                                                    class="block mt-1 w-full pl-10 pr-10 bg-gray-700 border-gray-600 rounded-md text-white py-2"
                                                    required>
                                                    <option value="aktif"
                                                        {{ $supplier->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                                    <option value="tidak_aktif"
                                                        {{ $supplier->status == 'tidak_aktif' ? 'selected' : '' }}>Tidak
                                                        Aktif</option>
                                                </select>
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                    <i class="fa-solid fa-scale-balanced w-5 h-5 text-blue-400"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="mt-6 flex justify-end space-x-3">
                                    <button type="button"
                                        class="bg-gray-600 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded"
                                        onclick="closeModal({{ $supplier->id }})">
                                        Close
                                    </button>
                                    <button type="submit"
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        function openModal(id) {
            // Menghapus class 'hidden' untuk modal dengan ID yang sesuai
            document.getElementById(`modal_supplier_${id}`).classList.remove('hidden');
        }

        function closeModal(id) {
            // Menambahkan class 'hidden' untuk modal dengan ID yang sesuai
            document.getElementById(`modal_supplier_${id}`).classList.add('hidden');
        }

        function changePerPage() {
            var perPage = document.getElementById('perPage').value;
            var currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('per_page', perPage);
            window.location.href = currentUrl.toString();
        }


        document.getElementById('status-filter').addEventListener('change', function() {
            console.log('Status changed to: ' + this.value);
            document.getElementById('status-form').submit();
        });
    </script>
@endsection
