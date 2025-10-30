{{-- @extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div>
    <h1 class="font-semibold text-2xl ml-2 mt-2">SELAMAT DATANG DI MENU DASHBOARD</h1>
</div>
<div class="max-w-8xl mx-auto mt-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Today's Money -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-4">
                <div class="bg-black text-white p-3 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Today's Money</p>
                    <p class="text-2xl font-bold">$53k</p>
                </div>
            </div>
            <p class="text-sm text-green-500">+55% than last week</p>
        </div>

        <!-- Today's Users -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-4">
                <div class="bg-pink-500 text-white p-3 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Today's Users</p>
                    <p class="text-2xl font-bold">2,300</p>
                </div>
            </div>
            <p class="text-sm text-green-500">+3% than last month</p>
        </div>

        <!-- New Clients -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-4">
                <div class="bg-green-500 text-white p-3 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500">New Clients</p>
                    <p class="text-2xl font-bold">3,462</p>
                </div>
            </div>
            <p class="text-sm text-red-500">-2% than yesterday</p>
        </div>

        <!-- Sales -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-4">
                <div class="bg-blue-500 text-white p-3 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Sales</p>
                    <p class="text-2xl font-bold">$103,430</p>
                </div>
            </div>
            <p class="text-sm text-green-500">+5% than yesterday</p>
        </div>
    </div>

    <div class="pt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Website Views -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Website Views</h3>
            <div class="chart-container" style="position: relative; height:200px; width:100%">
                <canvas id="websiteViewsChart"></canvas>
            </div>
            <p class="text-sm text-gray-500">Last Campaign Performance</p>
            <p class="text-xs text-gray-400 mt-2">campaign sent 2 days ago</p>
        </div>

        <!-- Daily Sales -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Daily Sales</h3>
            <div class="chart-container" style="position: relative; height:200px; width:100%">
                <canvas id="dailySalesChart"></canvas>
            </div>
            <p class="text-sm text-gray-500">(+15%) increase in today sales.</p>
            <p class="text-xs text-gray-400 mt-2">updated 4 min ago</p>
        </div>

        <!-- Completed Tasks -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Completed Tasks</h3>
            <div class="chart-container" style="position: relative; height:200px; width:100%">
                <canvas id="completedTasksChart"></canvas>
            </div>
            <p class="text-sm text-gray-500">Last Campaign Performance</p>
            <p class="text-xs text-gray-400 mt-2">just updated</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Fungsi untuk membuat opsi chart
        function createChartOptions() {
            return {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            };
        }

        // Website Views Chart
        var websiteViewsCtx = document.getElementById('websiteViewsChart').getContext('2d');
        var websiteViewsChart = new Chart(websiteViewsCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Website Views',
                    data: [12, 19, 3, 5, 2, 3],
                    borderColor: 'rgb(236, 72, 153)',
                    tension: 0.1
                }]
            },
            options: createChartOptions()
        });

        // Daily Sales Chart
        var dailySalesCtx = document.getElementById('dailySalesChart').getContext('2d');
        var dailySalesChart = new Chart(dailySalesCtx, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Daily Sales',
                    data: [12, 19, 3, 5, 2, 3, 7],
                    backgroundColor: 'rgb(34, 197, 94)'
                }]
            },
            options: createChartOptions()
        });

        // Completed Tasks Chart
        var completedTasksCtx = document.getElementById('completedTasksChart').getContext('2d');
        var completedTasksChart = new Chart(completedTasksCtx, {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'Pending'],
                datasets: [{
                    label: 'Completed Tasks',
                    data: [300, 50],
                    backgroundColor: [
                        'rgb(31, 41, 55)',
                        'rgb(209, 213, 219)'
                    ]
                }]
            },
            options: createChartOptions()
        });
    </script>
</div>

@endsection --}}


@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div>
    <h1 class="font-semibold text-2xl ml-2 mt-2">SELAMAT DATANG DI SISTEM INFORMASI PENERIMAAN DAN PENGELUARAN BARANG</h1>
</div>
<div class="max-w-8xl mx-auto mt-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Penerimaan Hari Ini -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-4">
                <div class="bg-black text-white p-3 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Penerimaan Hari Ini</p>
                    <p class="text-2xl font-bold">Rp53 juta</p>
                </div>
            </div>
            <p class="text-sm text-green-500">+55% dibanding minggu lalu</p>
        </div>

        <!-- Pengguna Hari Ini -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-4">
                <div class="bg-pink-500 text-white p-3 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Pengguna Hari Ini</p>
                    <p class="text-2xl font-bold">1,386</p>
                </div>
            </div>
            <p class="text-sm text-green-500">+3% dibanding bulan lalu</p>
        </div>

        <!-- Klien Baru -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-4">
                <div class="bg-green-500 text-white p-3 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Klien Baru</p>
                    <p class="text-2xl font-bold">536</p>
                </div>
            </div>
            <p class="text-sm text-red-500">-2% dibanding kemarin</p>
        </div>

        <!-- Pengeluaran Barang -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center mb-4">
                <div class="bg-blue-500 text-white p-3 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Pengeluaran Barang</p>
                    <p class="text-2xl font-bold">Rp103,43 juta</p>
                </div>
            </div>
            <p class="text-sm text-green-500">+5% dibanding kemarin</p>
        </div>
    </div>

    <div class="pt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Grafik Penerimaan Barang -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Grafik Penerimaan Barang</h3>
            <div class="chart-container" style="position: relative; height:200px; width:100%">
                <canvas id="grafikPenerimaanBarangChart"></canvas>
            </div>
            <p class="text-sm text-gray-500">Performa Laporan Terakhir</p>
            <p class="text-xs text-gray-400 mt-2">laporan dikirim 2 hari lalu</p>
        </div>

        <!-- Grafik Pengeluaran Barang Harian -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Grafik Pengeluaran Barang Harian</h3>
            <div class="chart-container" style="position: relative; height:200px; width:100%">
                <canvas id="grafikPengeluaranBarangHarianChart"></canvas>
            </div>
            <p class="text-sm text-gray-500">(+15%) peningkatan pengeluaran hari ini.</p>
            <p class="text-xs text-gray-400 mt-2">diperbarui 4 menit lalu</p>
        </div>

        <!-- Tugas yang Selesai -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Tugas yang Selesai</h3>
            <div class="chart-container" style="position: relative; height:200px; width:100%">
                <canvas id="tugasSelesaiChart"></canvas>
            </div>
            <p class="text-sm text-gray-500">Performa Laporan Terakhir</p>
            <p class="text-xs text-gray-400 mt-2">baru diperbarui</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function createChartOptions() {
            return {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                }
            };
        }

        // Grafik Penerimaan Barang
        var penerimaanCtx = document.getElementById('grafikPenerimaanBarangChart').getContext('2d');
        var grafikPenerimaanBarangChart = new Chart(penerimaanCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Penerimaan Barang',
                    data: [12, 19, 3, 5, 2, 3],
                    borderColor: 'rgb(236, 72, 153)',
                    tension: 0.1
                }]
            },
            options: createChartOptions()
        });

        // Grafik Pengeluaran Barang Harian
        var pengeluaranCtx = document.getElementById('grafikPengeluaranBarangHarianChart').getContext('2d');
        var grafikPengeluaranBarangHarianChart = new Chart(pengeluaranCtx, {
            type: 'bar',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                datasets: [{
                    label: 'Pengeluaran Barang',
                    data: [20, 30, 50, 40, 60, 80, 90],
                    backgroundColor: 'rgb(99, 102, 241)'
                }]
            },
            options: createChartOptions()
        });

        // Tugas yang Selesai
        var tugasSelesaiCtx = document.getElementById('tugasSelesaiChart').getContext('2d');
        var tugasSelesaiChart = new Chart(tugasSelesaiCtx, {
            type: 'pie',
            data: {
                labels: ['Tugas 1', 'Tugas 2', 'Tugas 3'],
                datasets: [{
                    data: [10, 20, 30],
                    backgroundColor: ['rgb(59, 130, 246)', 'rgb(234, 179, 8)', 'rgb(52, 211, 153)']
                }]
            },
            options: createChartOptions()
        });
    </script>
</div>
@endsection
