@extends('layouts.admin')

@section('title', 'Data Siswa — Admin DKV')
@section('header', 'Manajemen Data Siswa')

@section('content')
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-indigo-700">Daftar Siswa</h2>
            <a href="{{ route('admin.data-siswa.create') }}"
                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">+
                Tambah Siswa</a>
        </div>

        <table class="min-w-full border text-sm">
            <thead class="bg-indigo-100 text-indigo-800">
                <tr>
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2 text-left">Nama</th>
                    <th class="border px-4 py-2 text-left">NISN</th>
                    <th class="border px-4 py-2 text-left">Kelas</th>
                    <th class="border px-4 py-2 text-left">Email</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswa as $index => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $item->nama }}</td>
                        <td class="border px-4 py-2">{{ $item->nisn }}</td>
                        <td class="border px-4 py-2">{{ $item->kelas }}</td>
                        <td class="border px-4 py-2">{{ $item->email }}</td>
                        <td class="border px-4 py-2 text-center">
                            <a href="{{ route('siswa.edit', $item->id) }}" class="text-blue-600 hover:underline">Edit</a> |
                            <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline"
                                    onclick="return confirm('Hapus siswa ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data siswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
