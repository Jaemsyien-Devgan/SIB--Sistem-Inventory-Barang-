@extends('layouts.app')

@section('title', 'Product')

@section('content')

    <div class="py-2">
        <div class="w-full mx-auto">
            <form>
                <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-700 border-1">
                    <div class="p-6 text-gray-100 grid gap-6">
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="kode_produk" class="block text-sm font-medium">Kode Product</label>
                                <div class="relative">
                                    <input id="kode_produk"
                                        class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md" type="text"
                                        name="kode_produk" required autofocus />
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <i class="fa-solid fa-clipboard-list h-5 w-5 text-yellow-400"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="nama_produk" class="block text-sm font-medium">Nama Product</label>
                                <div class="relative">
                                    <input id="nama_produk"
                                        class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                        type="text" name="nama_produk" required />
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <i class="fa-solid fa-file-signature h-5 w-5 text-red-400"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="harga" class="block text-sm font-medium">Harga Product</label>
                                <div class="relative">
                                    <input id="harga"
                                        class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                        type="text" name="harga" required />
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <i class="fa-solid fa-hashtag h-5 w-5 text-green-400"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="satuan_produk" class="block text-sm font-medium">Satuan</label>
                                <div class="relative">
                                    <input id="satuan_produk"
                                        class="block mt-1 w-full pl-10 pr-10 bg-gray-700 border-gray-600 rounded-md"
                                        type="text" name="satuan_produk" required />
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <i class="fa-solid fa-scale-balanced w-5 h-5 text-blue-400"></i>
                                    </div>
                                    <button type="button"
                                        class="absolute right-2 top-1.5  text-white rounded-md p-1"
                                        onclick="openModal()">
                                        <svg class="w-5 h-5 hover:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit"
                        class="bg-gray-800 hover:bg-gray-700 text-white text-sm font-bold py-2 px-4 rounded-lg inline-flex items-center">
                        <i class="fa-solid fa-plus w-4 h-4 mr-1"></i>
                        Add Produk
                    </button>
                </div>
            </form>

            <div id="modal_produk" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title"
                role="dialog" aria-modal="true">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl sm:w-full">
                        <div class="p-6">
                            <h2 class="text-lg font-medium text-gray-100">
                                Satuan
                            </h2>
                            <p class="mt-1 text-sm text-gray-400">
                                Pilih Satuan Produk...
                            </p>
                            <div class="mt-4">
                                <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                                    <div class="flex space-x-2 mb-2 sm:mb-0">
                                        <div class="relative">
                                            <select
                                                class="appearance-none bg-gray-700 h-full rounded-md border block w-full border-gray-600 text-white py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-gray-600 focus:border-blue-500">
                                                <option>5</option>
                                                <option>10</option>
                                                <option>20</option>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-300">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="relative">
                                            <select
                                                class="appearance-none bg-gray-700 h-full rounded-md border block w-full border-gray-600 text-white py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-gray-600 focus:border-blue-500">
                                                <option>Semua</option>
                                                <option>Aktif</option>
                                                <option>Tidak Aktif</option>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-300">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <input placeholder="Cari"
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
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                    Kode Product</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                    Nama Product</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                    Harga</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                    Satuan</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                    Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-gray-900 divide-y divide-gray-700">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                                    Kilogram</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">kg</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Satuan Berat</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <button class="text-indigo-400 hover:text-indigo-600">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="mt-6 flex justify-end space-x-3">
                                <button class="bg-gray-600 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded"
                                    onclick="closeModal()">
                                    Close
                                </button>
                                <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="p-6 bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">
            Daftar Product
        </h2>
        <p class="mb-6 text-sm text-gray-600 dark:text-gray-400">
            Pilih Daftar Product...
        </p>

        <!-- Table Start -->
        <div>
            <div class="mb-4 flex flex-col sm:flex-row justify-between items-center">
                <div class="flex flex-row mb-2 sm:mb-0">
                    <div class="relative mr-2">
                        <select
                            class="appearance-none bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-700 focus:border-blue-500 focus:ring-0">
                            <option>5</option>
                            <option>10</option>
                            <option>20</option>
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
                <div class="relative">
                    <input type="text" placeholder="Cari"
                        class="bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 block w-full appearance-none leading-normal focus:outline-none focus:ring-0 focus:border-blue-500 pl-10">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow overflow-y-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Kode Product</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Nama Product</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Harga</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Satuan</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                001</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">Semen</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">5</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button
                                    class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-600 mr-2" onclick="openModal()">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit
                                </button>
                                <button class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete
                                </button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Table End -->

    </div>


    <script>
        function openModal() {
            document.getElementById('modal_produk').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal_produk').classList.add('hidden');
        }
    </script>
@endsection
