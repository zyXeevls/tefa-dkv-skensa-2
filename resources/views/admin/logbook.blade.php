@extends('layouts.admin')

@section('title', 'Logbook Harian')
@section('header', 'Logbook Harian Siswa')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <!-- Header & Filter -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-3">
            <h3 class="text-lg font-semibold text-indigo-700">Daftar Logbook Harian</h3>

            <form method="GET" action="{{ route('admin.logbook') }}" id="filter-form"
                class="flex items-center gap-3 bg-indigo-50 p-3 rounded-md border border-indigo-200">
                <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                    class="border border-indigo-300 rounded px-3 py-1 focus:ring focus:ring-indigo-200 text-sm">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded text-sm font-medium transition">
                    <i class="fa-solid fa-filter mr-1"></i> Filter
                </button>
                @if (request('tanggal'))
                    <a href="{{ route('admin.logbook') }}"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-1 rounded text-sm transition">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <!-- Tabel Data -->
        @if ($logbooks->isEmpty())
            <p class="text-gray-500 text-center py-6">Belum ada logbook yang masuk.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm border-collapse">
                    <thead class="bg-indigo-100 text-indigo-800">
                        <tr>
                            <th class="px-3 py-2 border text-left">Nama Siswa</th>
                            <th class="px-3 py-2 border text-left">Kelas</th>
                            <th class="px-3 py-2 border text-center">Tanggal</th>
                            <th class="px-3 py-2 border text-left">Aktivitas Harian</th>
                            <th class="px-3 py-2 border text-center">Hasil (Qty)</th>
                            <th class="px-3 py-2 border text-left">Kendala</th>
                            <th class="px-3 py-2 border text-left">Tindak Lanjut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logbooks as $lb)
                            <tr class="border-t hover:bg-gray-50 transition">
                                <td class="px-3 py-2 border">{{ $lb->nama_siswa }}</td>
                                <td class="px-3 py-2 border">{{ $lb->kelas_jurusan }}</td>
                                <td class="px-3 py-2 border text-center">
                                    {{ \Carbon\Carbon::parse($lb->tanggal)->format('d M Y') }}
                                </td>
                                <td class="px-3 py-2 border">{{ $lb->aktivitas_harian }}</td>
                                <td class="px-3 py-2 border text-center">{{ $lb->hasil_qty ?? '-' }}</td>
                                <td class="px-3 py-2 border">{{ $lb->kendala ?? '-' }}</td>
                                <td class="px-3 py-2 border">{{ $lb->tindak_lanjut ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
