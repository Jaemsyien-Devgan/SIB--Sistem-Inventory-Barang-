<div class="py-2">
    <div class="w-full max-auto">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-700 border-1 p-4">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 pt-2 pl-6">
                Tambahkan Data Laporan Penerimaan Barang
            </h2>
            <div class="p-6 text-gray-100 grid gap-6">
                <div class="flex gap-6">
                    <div class="w-2/3">
                        <label for="nomor_lpb" class="block text-sm font-medium">Nomor LBP</label>
                        <div class="relative">
                            <input id="nomor_lpb" class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                type="text" name="nomor_lpb" value="{{ old('nomor_lpb') }}" required autofocus />
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-green-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/3">
                        <label for="tanggal" class="block text-sm font-medium">Tanggal</label>
                        <div class="relative">
                            <input id="tanggal" class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                type="text" name="tanggal" value="{{ old('tanggal') }}" required autofocus />
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
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="nomor_op" class="block text-sm font-medium">Nomor OP</label>
                        <div class="relative">
                            <input id="nomor_op" class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                type="text" name="nomor_op" value="{{ old('nomor_OP') }}" required autofocus />
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-pink-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="nomor_pp" class="block text-sm font-medium">Nomor PP</label>
                        <div class="relative">
                            <input id="nomor_pp" class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                type="text" name="nomor_pp" value="{{ old('nomor_pp') }}" required autofocus />
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-orange-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="grid grid-cols-3 gap-2">
                        <div class="col-span-1">
                            <label for="proyek_peminta" class="block text-sm font-medium">Proyek Peminta</label>
                            <div class="relative">
                                <input id="proyek_peminta"
                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                    type="text" name="proyek_peminta" value="{{ old('proyek_peminta') }}" required
                                    autofocus />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <button type="button" class="absolute right-2 top-1.5 text-white rounded-md p-1"
                                    onclick="openModal('modal_produk_1')">
                                    <svg class="w-5 h-5 hover:text-blue-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="proyek_peminta" class="block text-sm font-medium invisible">Label
                                Kosong</label>
                            <div class="relative">
                                <input id="proyek_peminta"
                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                    type="text" name="proyek_peminta" value="{{ old('proyek_peminta') }}" required
                                    autofocus />
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <div class="col-span-1">
                            <label for="kode_proyek" class="block text-sm font-medium">Kode Proyek</label>
                            <div class="relative">
                                <input id="kode_proyek"
                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                    type="text" name="kode_proyek" value="{{ old('kode_proyek') }}" required
                                    autofocus />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="w-5 h-5 text-red-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                </div>
                                <button type="button" class="absolute right-2 top-1.5 text-white rounded-md p-1"
                                    onclick="openModal('')">
                                    <svg class="w-5 h-5 hover:text-blue-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="kode_proyek" class="block text-sm font-medium invisible">Label Kosong</label>
                            <div class="relative">
                                <input id="kode_proyek"
                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                    type="text" name="kode_proyek" value="{{ old('kode_proyek') }}" required
                                    autofocus />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="grid grid-cols-3 gap-2">
                        <div class="col-span-1">
                            <label for="kode_transaksi" class="block text-sm font-medium">Kode Transaksi</label>
                            <div class="relative">
                                <input id="kode_transaksi"
                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                    type="text" name="kode_transaksi" value="{{ old('kode_transaksi') }}" required
                                    autofocus />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="w-5 h-5 text-teal-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <button type="button" class="absolute right-2 top-1.5 text-white rounded-md p-1"
                                    onclick="openModal('')">
                                    <svg class="w-5 h-5 hover:text-blue-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="kode_transaksi" class="block text-sm font-medium invisible">Label
                                Kosong</label>
                            <div class="relative">
                                <input id="kode_transaksi"
                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                    type="text" name="kode_transaksi" value="{{ old('kode_transaksi') }}" required
                                    autofocus />
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-2">
                        <div class="col-span-1">
                            <label for="supplier" class="block text-sm font-medium">Supplier</label>
                            <div class="relative">
                                <input id="supplier"
                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                    type="text" name="supplier" value="{{ old('supplier') }}" required
                                    autofocus />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <button type="button" class="absolute right-2 top-1.5 text-white rounded-md p-1"
                                    onclick="openModal('')">
                                    <svg class="w-5 h-5 hover:text-blue-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="supplier" class="block text-sm font-medium invisible">Label Kosong</label>
                            <div class="relative">
                                <input id="supplier"
                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                    type="text" name="supplier" value="{{ old('supplier') }}" required
                                    autofocus />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="mata_uang" class="block text-sm font-medium">Mata Uang</label>
                        <div class="relative">
                            <select id="mata_uang" name="mata_uang"
                                class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md h-10" required
                                autofocus>
                                <option value="IDR">IDR - Rupiah</option>
                                <option value="USD">USD - Dollar</option>
                                <option value="EUR">EUR - Euro</option>
                                <option value="JPY">JPY - Yen</option>
                                <option value="GBP">GBP - Pound Sterling</option>
                            </select>
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-yellow-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <div class="col-span-1 w-2/5">
                            <label for="ppn" class="block text-sm font-medium">PPN</label>
                            <div class="relative">
                                <select id="ppn" name="ppn"
                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md h-10"
                                    required autofocus>
                                    <option value="exclude">Exclude - Tanpa PPN</option>
                                    <option value="non_ppn">Non PPN</option>
                                    <option value="ppn_standar">PPN Standar</option>
                                    <option value="ppn_baru">PPN Baru</option>
                                    <option value="ppn_khusus">PPN Khusus</option>
                                </select>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-green-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-2 w-3/5">
                            <label for="persen" class="block text-sm font-medium invisible">Persen</label>
                            <div class="relative">
                                <select id="persen" name="persen"
                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md h-10"
                                    required autofocus>
                                    <option value="0">0% - Tidak Ada</option>
                                    <option value="5">5%</option>
                                    <option value="10">10%</option>
                                    <option value="15">15%</option>
                                    <option value="20">20%</option>
                                    <option value="25">25%</option>
                                    <option value="30">30%</option>
                                </select>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-purple-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="grid grid-cols-3 gap-2">
                        <div class="col-span-1">
                            <label for="pajak_lain" class="block text-sm font-medium">Pajak Lain</label>
                            <div class="relative">
                                <select id="pajak_lain" name="pajak_lain"
                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md h-10"
                                    required autofocus>
                                    <option value="">Pilih Pajak</option>
                                    <option value="pajak_1">Pajak 1 - 5%</option>
                                    <option value="pajak_2">Pajak 2 - 10%</option>
                                    <option value="pajak_3">Pajak 3 - 15%</option>
                                    <option value="pajak_4">Pajak 4 - 20%</option>
                                    <option value="pajak_5">Pajak 5 - 25%</option>
                                </select>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="na_option" class="block text-sm font-medium invisible">N/A</label>
                            <div class="relative">
                                <select id="na_option" name="na_option"
                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md h-10"
                                    required>
                                    <option value="na">N/A</option>
                                    <option value="yes">Ya</option>
                                    <option value="no">Tidak</option>
                                </select>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-orange-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="total" class="block text-sm font-medium invisible">Total</label>
                            <div class="relative">
                                <input id="total" name="total" type="text"
                                    class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md h-10"
                                    value="{{ old('total') }}" required placeholder="Total" />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-yellow-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="tanda_tangan" class="block text-sm font-medium">Tanda Tangan</label>
                        <div class="relative">
                            <select id="tanda_tangan" name="tanda_tangan"
                                class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md h-10" required
                                autofocus>
                                <option value="">Pilih Nama</option>
                                <option value="john_doe">John Doe</option>
                                <option value="jane_smith">Jane Smith</option>
                                <option value="michael_johnson">Michael Johnson</option>
                                <option value="emily_davis">Emily Davis</option>
                                <option value="david_brown">David Brown</option>
                            </select>
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-cyan-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end items-center my-4 pt-2">
                    <button type="submit"
                        class="bg-gray-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 rounded-lg inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        ADD LPB
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
