@extends('layouts.app')
@section('title', 'Laporan Penerimaan Barang')
@section('content')


<div class="container mx-auto ">
    <h1 class="text-2xl font-bold ml-2 mb-4 uppercase">Detail Laporan Penerimaan Barang: {{ $lpb->nomor_op }}</h1>

    <div class="w-full mx-auto bg-gray-800 text-white rounded-lg overflow-hidden shadow-lg">
        <div class="px-6 py-4 bg-gray-700">
            <h3 class="text-xl font-bold flex items-center">
                <svg class="w-6 h-6 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                Informasi Laporan Penerimaan Barang
            </h3>
        </div>
        <div class="divide-y divide-gray-700">
            <div class="px-6 py-4 flex items-center">
                <span class="w-8 h-8 rounded-full bg-purple-500 flex items-center justify-center mr-4">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                    </svg>
                </span>
                <div>
                    <p class="text-sm text-gray-400">Nomor OP</p>
                    <p class="font-semibold">{{ $lpb->nomor_op }}</p>
                </div>
            </div>
            <div class="px-6 py-4 flex items-center">
                <span class="w-8 h-8 rounded-full bg-yellow-500 flex items-center justify-center mr-4">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </span>
                <div>
                    <p class="text-sm text-gray-400">Keperluan Proyek</p>
                    <p class="font-semibold">{{ $lpb->administrasi->nama_proyek }}</p>
                </div>
            </div>
            <div class="px-6 py-4 flex items-center">
                <span class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center mr-4">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                    </svg>
                </span>
                <div>
                    <p class="text-sm text-gray-400 mb-1">Nama Supplier</p>
                    <span class="font-semibold rounded-full">
                        {{ $lpb->supplier->nama_supplier }}
                    </span>
                </div>
            </div>
            <div class="px-6 py-4 flex items-center">
                <span class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center mr-4">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                    </svg>
                </span>
                <div>
                    <p class="text-sm text-gray-400 mb-1">Nama Transaksi</p>
                    <span class=" font-semibold rounded-full">
                        {{ $lpb->transaksi->nama_transaksi }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

@include('LPB.sub_lpb')

@endsection
