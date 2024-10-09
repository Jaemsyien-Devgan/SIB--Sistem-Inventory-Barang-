<div id="modal_tambah" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-100">Daftar Administrasi</h2>
                <p class="mt-1 text-sm text-gray-400">Pilih Daftar Administrasi...</p>
                <div class="mt-4">
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                        <div class="relative w-full sm:w-64">
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
                                        Produk ID</th>

                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Kode Barang</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Nama Produk</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Kuantitas</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Satuan</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Harga satuan</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="modalProjectTableBody" class="bg-gray-900 divide-y divide-gray-700">
                                @foreach ($administrasi->subAnggarans as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                            {{ $loop->iteration}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                            {{ $item->product->kode_produk }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                            {{ $item->product->nama_produk }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                            {{ $item->kuantitas }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                            {{ $item->product->satuan->nama_satuan }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                            {{ $item->harga_satuan }}</td>
                                        <td class="px-4 py-2 whitespace-nowrap text-sm font-medium">
                                            <button
                                                class="bg-green-100 text-indigo-400 hover:text-indigo-600 transition duration-300 ease-in-out transform hover:scale-110 p-1 rounded-lg"
                                                onclick="selectlpb('{{ $administrasi->id }}','{{ $lpb->id }}','{{ $item->id }}','{{ $item->product->id }}', '{{ $item->product->kode_produk }}', '{{ $item->product->nama_produk }}', '{{ $item->product->satuan->nama_satuan }}', '{{ $item->harga_satuan }}')">
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
                        onclick="closeModal('modal_tambah')">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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

    function selectlpb(administrasi_id, lbp_id, sub_anggaran_id, product_id, kode_produk, nama_produk, nama_satuan, harga_satuan) {
        // Mengisi nilai ke dalam form
        document.getElementById('administrasi_id').value = administrasi_id;
        document.getElementById('lpb_id').value = lbp_id;
        document.getElementById('sub_anggaran_id').value = sub_anggaran_id;
        document.getElementById('product_id').value = product_id;
        document.getElementById('nama_produk').value = nama_produk;
        document.getElementById('kode_produk').value = kode_produk;
        document.getElementById('satuan').value = nama_satuan;
        document.getElementById('harga_satuan').value = harga_satuan;

        // Menambahkan product_id ke tabel
        addProductToTable(lbp_id, product_id, kode_produk, nama_produk, nama_satuan, harga_satuan);

        // Menutup modal setelah pemilihan produk selesai
        closeModal('modal_tambah');
    }

    function addProductToTable(lbp_id, product_id, kode_produk, nama_produk, nama_satuan, harga_satuan) {
        const tableBody = document.getElementById('selectedProductsTableBody');
        if (!tableBody) {
            console.error('Table body element not found');
            return;
        }

        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">${product_id}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">${kode_produk}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">${nama_produk}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">${nama_satuan}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">${harga_satuan}</td>
            <td class="px-4 py-2 whitespace-nowrap text-sm font-medium">
                <button class="bg-red-500 hover:bg-red-600 text-white p-1 rounded-lg" onclick="removeProduct(this)">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </td>
        `;
        tableBody.appendChild(row);
    }

    function removeProduct(button) {
        const row = button.closest('tr');
        row.remove();
    }

    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }

    document.getElementById('modalSearchInput').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('#modalProjectTableBody tr');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });
</script>
