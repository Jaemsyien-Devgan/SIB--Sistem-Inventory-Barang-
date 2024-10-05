<div id="modal_transaksi" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title"
                role="dialog" aria-modal="true">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full h-full">
                        <div class="p-6">
                            <h2 class="text-lg font-medium text-gray-100">Transaksi</h2>
                            <p class="mt-1 text-sm text-gray-400">Pilih Transaksi...</p>
                            <div class="mt-4">
                                <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                                    <div class="relative">
                                        <input id="searchInput" placeholder="Cari"
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
                                                    Kode Transaksi</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                    Nama Transaksi</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                    Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-gray-900 divide-y divide-gray-700">
                                            @foreach ($transaksi as $item)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                                        {{ $item->kode_transaksi }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                                        {{ $item->nama_transaksi }}</td>
                                                    <td class="px-4 py-2 whitespace-nowrap text-sm font-medium">
                                                        <button
                                                            class="bg-green-100 text-indigo-400 hover:text-indigo-600 transition duration-300 ease-in-out transform hover:scale-110 p-1 rounded-lg"
                                                            onclick="selectTransaksi('{{ $item->kode_transaksi }}', '{{ $item->nama_transaksi }}')">
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
                                    onclick="closeModal('modal_transaksi')">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
