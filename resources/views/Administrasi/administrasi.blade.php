@extends('layouts.app')

@section('title', 'Administrasi Permintaan Pembelian')

@section('content')
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
    @include('Administrasi.administrasi_add')
@endsection
