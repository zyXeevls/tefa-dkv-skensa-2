@extends('layouts.admin')

@section('title', 'Edit QC')

@section('content')
    <div class="p-8">
        <h1 class="text-2xl font-bold mb-4">Edit Data Quality Control</h1>

        <form action="{{ route('qc.update', $qc->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 font-medium">Nomor QC</label>
                <input type="text" name="nomor_qc" value="{{ $qc->nomor_qc }}" class="border rounded w-full p-2" required>
            </div>

            <div>
                <label class="block mb-1 font-medium">Tanggal QC</label>
                <input type="date" name="tanggal_qc" value="{{ $qc->tanggal_qc }}" class="border rounded w-full p-2"
                    required>
            </div>

            <div>
                <label class="block mb-1 font-medium">Produk/Jasa</label>
                <input type="text" name="produk_jasa" value="{{ $qc->produk_jasa }}" class="border rounded w-full p-2"
                    required>
            </div>

            <div>
                <label class="block mb-1 font-medium">Pemeriksa</label>
                <input type="text" name="pemeriksa" value="{{ $qc->pemeriksa }}" class="border rounded w-full p-2"
                    required>
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <a href="{{ route('qc.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
@endsection
