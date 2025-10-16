@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('header', 'Dashboard Admin')

@section('content')
    <div class="space-y-12">

        <!-- Ringkasan Utama -->
        <div class="grid md:grid-cols-4 gap-6">
            <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl shadow-lg p-6 text-center text-white">
                <h3 class="text-lg font-semibold mb-2">Kehadiran</h3>
                <p class="text-4xl font-extrabold">{{ $hadirHariIni }} / 37</p>
                <p class="text-sm mt-2 opacity-80">Kehadiran Siswa <span class="font-black">hari ini</span></p>
            </div>

            <div class="bg-gradient-to-br from-emerald-500 to-green-600 rounded-2xl shadow-lg p-6 text-center text-white">
                <h3 class="text-lg font-semibold mb-2">Logbook</h3>
                <p class="text-5xl font-extrabold">{{ $logbookHariIni }}</p>
                <p class="text-sm mt-2 opacity-80">Logbook Siswa yang diisi <span class="font-black">hari ini</span>
                </p>
            </div>

            <div class="bg-gradient-to-br from-yellow-400 to-amber-500 rounded-2xl shadow-lg p-6 text-center text-white">
                <h3 class="text-lg font-semibold mb-2">Kepuasan Pelanggan</h3>
                <p class="text-5xl font-extrabold">{{ $kepuasanPelanggan }}</p>
                <p class="text-sm mt-2 opacity-80">Jumlah Pelanggan yang puas <span class="font-black">hari ini</span>
            </div>

            <div class="bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl shadow-lg p-6 text-center text-white">
                <h3 class="text-lg font-semibold mb-2">Quality Control</h3>
                <p class="text-5xl font-extrabold">{{ $totalQC }}</p>
                <p class="text-sm mt-2 opacity-80 text-white font-bold">Total QC Yang telah Diisi</p>
            </div>
        </div>

        <!-- Chart.js -->
        <div class="grid md:grid-cols-3 gap-8 mt-12">
            <div class="bg-white p-6 rounded-2xl shadow text-center">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Data Dummy</h2>
                <div class="relative w-44 h-44 mx-auto">
                    <canvas id="chartLulus"></canvas>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="text-3xl font-extrabold text-indigo-600">{{ $persentaseLulus ?? 80 }}%</span>
                        <span class="text-sm text-red-600 font-bold"><i class="fa-solid fa-exclamation"></i> Fitur ini masih
                            dalam
                            tahap pengembangan</span>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow text-center">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Data Dummy</h2>
                <div class="relative w-44 h-44 mx-auto">
                    <canvas id="chartDisiplin"></canvas>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="text-3xl font-extrabold text-green-600">90%</span>
                        <span class="text-sm text-red-600 font-bold"><i class="fa-solid fa-exclamation"></i> Fitur ini masih
                            dalam
                            tahap pengembangan</span>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow text-center">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Data Dummy</h2>
                <div class="relative w-44 h-44 mx-auto">
                    <canvas id="chartHadir"></canvas>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="text-3xl font-extrabold text-yellow-500">82%</span>
                        <span class="text-sm text-red-600 font-bold"><i class="fa-solid fa-exclamation"></i> Fitur ini
                            masih dalam
                            tahap pengembangan</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const makeChart = (id, percent, color) => {
                const ctx = document.getElementById(id).getContext('2d');
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                            data: [percent, 100 - percent],
                            backgroundColor: [color, '#E5E7EB'],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        cutout: '80%',
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });
            };

            makeChart('chartLulus', {{ $persentaseLulus ?? 80 }}, '#6366F1');
            makeChart('chartDisiplin', 90, '#10B981');
            makeChart('chartHadir', 82, '#FACC15');
        </script>
    @endpush
@endsection
