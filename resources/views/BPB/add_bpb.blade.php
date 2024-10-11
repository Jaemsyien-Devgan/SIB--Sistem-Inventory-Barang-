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

<!---- Tambah Data BPB --->
<div class="py-2">
    <div class="w-full max-auto">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-700 border-1 p-4">
            <h2 class="text-2xl font-bold text-gray-100 mb-6">
                Tambahkan Data Bon Penerimaan Barang
            </h2>
            <form action="{{ route('BPB.bpb.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nomor_bpb" class="block text-sm font-medium text-gray-100">Nomor BPB</label>
                        <div class="relative mt-1">
                            <input id="nomor_bpb" value="{{ $newBPBCode ?? old('nomor_bpb') }}"
                                class="block w-full pl-10 pr-3 py-2 bg-gray-700 border-gray-600 rounded-md text-gray-100"
                                type="text" name="nomor_bpb" required readonly />
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-green-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-100">Tanggal</label>
                        <div class="relative mt-1">
                            <input id="tanggal"
                                class="block w-full pl-10 pr-3 py-2 bg-gray-700 border-gray-600 rounded-md text-gray-100"
                                type="date" name="tanggal_bpb" value="{{ date('Y-m-d') }}" required />
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-purple-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="grid grid-cols-3 gap-6 mt-6">
                    <div>
                        <label for="kode_proyek_peminta" class="block text-sm font-medium text-gray-100">Kode Proyek</label>
                        <div class="relative mt-1">
                            <input id="lpb_id" type="hidden" name="lpb_id" />
                            <input id="kode_proyek_peminta"
                                class="block w-full pl-10 pr-10 py-2 bg-gray-700 border-gray-600 rounded-md text-gray-100"
                                type="text" name="kode_proyek_peminta" required readonly />
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3"
                                onclick="openModal('modal_proyek')">
                                <svg class="w-5 h-5 text-gray-400 hover:text-blue-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label for="nama_proyek_peminta" class="block text-sm font-medium text-gray-100">Proyek
                            Peminta</label>
                        <div class="relative mt-1">
                            <input id="nama_proyek_peminta"
                                class="block w-full pl-10 pr-3 py-2 bg-gray-700 border-gray-600 rounded-md text-gray-100"
                                type="text" name="nama_proyek_peminta" required readonly />
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mt-6">
                    <div class="mt-6">
                        <label for="tanda_tangan" class="block text-sm font-medium text-gray-100 mb-2">Tanda
                            Tangan</label>
                        <div id="signature-container">
                            <div class="signature-field flex items-center space-x-2 mb-2">
                                <div class="relative flex-grow">
                                    <input type="text" name="tanda_tangan[]"
                                        class="block w-full pl-10 pr-3 py-2 bg-gray-700 border-gray-600 rounded-md text-gray-100"
                                        required placeholder="Tanda Tangan">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="h-5 w-5 text-cyan-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </div>
                                </div>
                                <input type="text" name="jabatan[]"
                                    class="w-1/2 bg-gray-700 border-gray-600 rounded-md text-gray-100 py-2 px-3"
                                    required placeholder="Jabatan">
                                <div class="flex space-x-2">
                                    <button type="button" id="add-signature"
                                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">+</button>
                                    <button type="button" id="remove-signature"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">-</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="flex justify-end mt-6">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg inline-flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            ADD LPB
                        </button>
                    </div>
            </form>
        </div>
    </div>
        @include('BPB.modal_proyek')

</div>

<!---- Daftar Data BPB --->
<div class="mt-8 p-6 bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">
        Daftar Bon Penerimaan barang
    </h2>
    <p class="mb-6 text-sm text-gray-600 dark:text-gray-400">
        Pilih Daftar Bon Penerimaan Barang
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
                <form action="{{ route('bpb') }}" method="GET" id="status-form">
                    @csrf
                    <div class="relative">
                        <select id="status-filter" name="status"
                            onchange="document.getElementById('status-form').submit()"
                            class="appearance-none bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-700 focus:border-blue-500 focus:ring-0">
                            <option value="">Semua</option>
                            <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="tidak_aktif" {{ request('status') == 'tidak_aktif' ? 'selected' : '' }}>
                                Tidak Aktif</option>
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
                            Nomor BPB</th>
                        <th
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Keperluan Proyek</th>
                        <th
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody
                    class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700 items-center text-center justify-center">
                    @forelse ($bpb as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                {{ $item->nomor_bpb }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                {{ $item->lpb->administrasi->proyek->nama_proyek }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center justify-center space-x-4 h-full">


                                    <a href="{{ route('BPB.bpb_show', $item->lpb->id) }}"
                                        class="flex items-center text-teal-500 hover:text-teal-700 transition duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <span class="ml-1">Detail</span>
                                    </a>

                                    <form action="" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="flex items-center text-red-500 hover:text-red-700 transition duration-200"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus Administrasi ini?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                                Tidak ada Bon Permintaan Barang yang ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- @if ($administrasis instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="m-6">
                    {{ $administrasis->appends(request()->query())->links() }}
                </div>
            @endif --}}
        </div>
    </div>
    <!-- Table End -->
</div>


<script>
    // Fungsi untuk membuka modal berdasarkan ID
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }

    // Fungsi untuk menutup modal berdasarkan ID
    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }
    function selectProyek(id, proyek_peminta, nama_proyek_peminta) {
        console.log(id, proyek_peminta, nama_proyek_peminta);

        document.getElementById('lpb_id').value = id;
        document.getElementById('kode_proyek_peminta').value = proyek_peminta;
        document.getElementById('nama_proyek_peminta').value = nama_proyek_peminta;

        // Get the current OP number
        let currentBPBNumber = document.getElementById('nomor_bpb').value;


        // Replace 'XXXXX' in the OP number with the selected project number
        let newBPBNumber = currentBPBNumber.replace('XXXXX', proyek_peminta);


        // Update the OP number input
        document.getElementById('nomor_bpb').value = newBPBNumber;
        closeModal('modal_proyek');
    }
    document.addEventListener('DOMContentLoaded', function() {
        const administrasiSelect = document.getElementById('administrasi_id');
        const nomorBPBInput = document.getElementById('nomor_bpb');

        // Ketika administrasi berubah, ambil kode OP dari server
        administrasiSelect.addEventListener('change', function() {
            const administrasiId = this.value;
            if (administrasiId) {
                fetch(`/generate-op-code?administrasi_id=${administrasiId}`)
                    .then(response => response.json())
                    .then(data => {
                        nomorOpInput.value = data.opCode;
                    })
                    .catch(error => console.error('Error:', error));
            }
        });

        // Fungsi untuk menambah tanda tangan dinamis
        const container = document.getElementById('signature-container');
        const addButton = document.getElementById('add-signature');
        const removeButton = document.getElementById('remove-signature');

        // Ketika tombol "+" diklik, tambahkan input tanda tangan baru
        addButton.addEventListener('click', function() {
            const newField = document.createElement('div');
            newField.className = 'signature-field flex items-center space-x-2 mt-2';
            newField.innerHTML = `
                <div class="relative flex-grow">
                    <input type="text" name="tanda_tangan[]" class="block w-full pl-10 bg-gray-700 border-gray-600 rounded-md h-10 text-gray-100" required placeholder="Tanda Tangan">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </div>
                </div>
                <input type="text" name="jabatan[]" class="w-1/2 bg-gray-700 border-gray-600 rounded-md text-gray-100 py-2 px-3" required placeholder="Jabatan">
            `;
            container.appendChild(newField);
        });

        // Ketika tombol "-" diklik, hapus input tanda tangan terakhir
        removeButton.addEventListener('click', function() {
            const fields = container.getElementsByClassName('signature-field');
            if (fields.length > 1) { // Jangan hapus jika hanya ada satu input
                container.removeChild(fields[fields.length - 1]);
            }
        });
    });
</script>
