@extends('layouts.admin')

@section('title', 'Kehadiran Siswa — Admin DKV')
@section('header', 'Data Kehadiran Siswa')

@section('content')
    <div class="bg-white shadow-lg rounded-xl p-6 relative overflow-hidden">

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 gap-4">
            <h2 class="text-2xl font-bold text-indigo-700">📊 Kehadiran Siswa</h2>

            <!-- Filter  -->
            <form method="GET" action="{{ route('admin.kehadiran') }}" class="flex flex-wrap items-center gap-3">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama / NISN"
                    class="border rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">

                <select name="kelas_jurusan"
                    class="border rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                    <option value="">Kelas</option>
                    <option value="11 dkv 1" {{ request('kelas_jurusan') == '11 dkv 1' ? 'selected' : '' }}>XI DKV 1
                    </option>
                    <option value="11 dkv 2" {{ request('kelas_jurusan') == '11 dkv 2' ? 'selected' : '' }}>XI DKV 2
                    </option>
                </select>

                <select name="kehadiran"
                    class="border rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                    <option value="">Status</option>
                    <option value="hadir" {{ request('kehadiran') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="izin" {{ request('kehadiran') == 'izin' ? 'selected' : '' }}>Izin</option>
                    <option value="sakit" {{ request('kehadiran') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                    <option value="alpha" {{ request('kehadiran') == 'alpha' ? 'selected' : '' }}>Alfa</option>
                </select>

                <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                    class="border rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500" />

                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 text-sm">
                    Filter
                </button>
            </form>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto mt-4">
            <table class="min-w-full border text-sm">
                <thead class="bg-indigo-100 text-indigo-800">
                    <tr>
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2 text-left">Nama Lengkap</th>
                        <th class="border px-4 py-2 text-left">NISN</th>
                        <th class="border px-4 py-2 text-left">Kelas</th>
                        <th class="border px-4 py-2 text-left">Tanggal</th>
                        <th class="border px-4 py-2 text-left">Status</th>
                        <th class="border px-4 py-2 text-left">Blok TEFA</th>
                        <th class="border px-4 py-2 text-left">Pengawas</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kehadiran as $index => $data)
                        <tr class="hover:bg-indigo-50 transition">
                            <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2">{{ $data->nama_lengkap }}</td>
                            <td class="border px-4 py-2">{{ $data->nisn }}</td>
                            <td class="border px-4 py-2">{{ $data->kelas_jurusan }}</td>
                            <td class="border px-4 py-2">{{ $data->tanggal }}</td>
                            <td
                                class="border px-4 py-2 font-semibold 
                            {{ $data->kehadiran == 'Hadir' ? 'text-green-600' : ($data->kehadiran == 'Alfa' ? 'text-red-600' : 'text-yellow-600') }}">
                                {{ $data->kehadiran }}
                            </td>
                            <td class="border px-4 py-2">{{ $data->blok_tefa }}</td>
                            <td class="border px-4 py-2">{{ $data->pengawas }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-gray-500">Belum ada data kehadiran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
