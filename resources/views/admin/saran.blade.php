@extends('layouts.admin')

@section('title', 'Data Feedback')
@section('header', 'Masukan & Saran')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-4 text-indigo-700">Daftar Feedback Pelanggan</h3>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($feedbacks->isEmpty())
            <p class="text-gray-500">Belum ada feedback yang masuk.</p>
        @else
            <table class="w-full text-sm">
                <thead class="bg-indigo-100 text-indigo-800">
                    <tr>
                        <th class="px-3 py-2 border">Nomor Order</th>
                        <th class="px-3 py-2 border">Nama Pelanggan</th>
                        <th class="px-3 py-2 border">Produk</th>
                        <th class="px-3 py-2 border">Kualitas</th>
                        <th class="px-3 py-2 border">Waktu</th>
                        <th class="px-3 py-2 border">Pelayanan</th>
                        <th class="px-3 py-2 border">Harga</th>
                        <th class="px-3 py-2 border">Kepuasan</th>
                        <th class="px-3 py-2 border">Komentar</th>
                        {{-- <th class="px-3 py-2 border">Aksi</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedbacks as $fb)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-3 py-2 border">{{ $fb->order_no }}</td>
                            <td class="px-3 py-2 border">{{ $fb->customer_name }}</td>
                            <td class="px-3 py-2 border">{{ $fb->product }}</td>
                            <td class="px-3 py-2 border text-center">{{ $fb->rating_quality }}</td>
                            <td class="px-3 py-2 border text-center">{{ $fb->rating_timeliness }}</td>
                            <td class="px-3 py-2 border text-center">{{ $fb->rating_service }}</td>
                            <td class="px-3 py-2 border text-center">{{ $fb->rating_price }}</td>
                            <td class="px-3 py-2 border text-center">{{ $fb->rating_overall }}</td>
                            <td class="px-3 py-2 border">{{ $fb->comment }}</td>
                            {{-- <td class="px-3 py-2 border text-center">
                                <form action="{{ route('feedback.destroy', $fb->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
