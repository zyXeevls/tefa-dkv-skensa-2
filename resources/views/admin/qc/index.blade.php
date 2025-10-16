@extends('layouts.admin')

@section('title', 'Data Quality Control')

@section('content')
    <div class="p-6 sm:p-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900">Data Quality Control (QC)</h1>
                    <p class="text-gray-600 text-sm mt-1">Teaching Factory Cluster Pentahelix – SMKN 1 Rangkasbitung</p>
                </div>
                <a href="{{ route('admin.qc.create') }}"
                    class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition-all">
                    + Tambah Data QC
                </a>
            </div>

            {{-- List Data --}}
            @forelse ($qcs as $qc)
                <div class="bg-white shadow-md rounded-xl border border-gray-200 mb-6 overflow-hidden">
                    <div class="p-5 sm:p-6 border-b bg-gray-50 flex justify-between items-center">
                        <div>
                            <h2 class="text-lg font-bold text-gray-800">QC #{{ $qc->nomor_qc }}</h2>
                            <p class="text-xs text-gray-500">Tanggal: {{ $qc->tanggal_qc }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.qc.edit', $qc->id) }}"
                                class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded text-xs font-medium">
                                Edit
                            </a>
                            <form action="{{ route('admin.qc.destroy', $qc->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded text-xs font-medium">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-6 text-sm text-gray-800">
                        <div><span class="font-semibold">Produk / Jasa:</span> {{ $qc->produk_jasa }}</div>
                        <div><span class="font-semibold">Batch / Lot:</span> {{ $qc->batch_lot }}</div>
                        <div><span class="font-semibold">Pemeriksa:</span> {{ $qc->pemeriksa }}</div>
                        <div><span class="font-semibold">Departemen:</span> {{ $qc->departemen }}</div>
                        <div><span class="font-semibold">Jumlah Diperiksa:</span> {{ $qc->jml_periksa }}</div>
                        <div><span class="font-semibold">Good:</span> {{ $qc->jml_good }}</div>
                        <div><span class="font-semibold">NG:</span> {{ $qc->jml_ng }}</div>
                        <div><span class="font-semibold">FPY:</span> {{ $qc->fpy }}%</div>

                        <div class="col-span-full border-t pt-3 text-gray-900 font-semibold">📋 Jenis & Deskripsi Cacat
                        </div>
                        <div><span class="font-semibold">Cacat Utama:</span> {{ $qc->jenis_cacat_utama }}</div>
                        <div><span class="font-semibold">Cacat Lain:</span> {{ $qc->jenis_cacat_lain }}</div>
                        <div class="col-span-full"><span class="font-semibold">Deskripsi:</span> {{ $qc->deskripsi_cacat }}
                        </div>
                        <div><span class="font-semibold">Lokasi Cacat:</span> {{ $qc->lokasi_cacat }}</div>
                        <div><span class="font-semibold">Perlu Perbaikan:</span> {{ $qc->perlu_perbaikan }}</div>

                        <div class="col-span-full border-t pt-3 text-gray-900 font-semibold">🛠️ Verifikasi & Tindakan</div>
                        <div><span class="font-semibold">Tindakan Perbaikan:</span> {{ $qc->tindakan_perbaikan }}</div>
                        <div><span class="font-semibold">Penanggung Jawab:</span> {{ $qc->penanggung_jawab }}</div>
                        <div><span class="font-semibold">Tanggal Tindakan:</span> {{ $qc->tgl_tindakan }}</div>
                        <div><span class="font-semibold">Status Verifikasi:</span> {{ $qc->status_verifikasi }}</div>
                        <div><span class="font-semibold">Catatan Verifikator:</span> {{ $qc->catatan_verifikator }}</div>

                        <div class="col-span-full border-t pt-3 text-gray-900 font-semibold">✅ Persetujuan</div>
                        <div><span class="font-semibold">Penyetuju:</span> {{ $qc->penyetuju }}</div>
                        <div><span class="font-semibold">Jabatan:</span> {{ $qc->jabatan_penyetuju }}</div>
                        <div><span class="font-semibold">Tanggal:</span> {{ $qc->tanggal_persetujuan }}</div>

                        <div><span class="font-semibold">Tanda Tangan Pemeriksa:</span>
                            @if ($qc->tanda_tangan_pemeriksa)
                                <img src="{{ asset('storage/' . $qc->tanda_tangan_pemeriksa) }}" class="w-16 mt-1">
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </div>
                        <div><span class="font-semibold">Tanda Tangan Penyetuju:</span>
                            @if ($qc->tanda_tangan_penyetuju)
                                <img src="{{ asset('storage/' . $qc->tanda_tangan_penyetuju) }}" class="w-16 mt-1">
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </div>

                        <div class="col-span-full border-t pt-3 text-gray-900 font-semibold">📎 Lampiran</div>
                        <div>
                            <span class="font-semibold">Foto:</span>
                            @if ($qc->lampiran_foto)
                                <a href="{{ asset('storage/' . $qc->lampiran_foto) }}" target="_blank"
                                    class="text-blue-600 hover:underline">Lihat Foto</a>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </div>
                        <div>
                            <span class="font-semibold">Dokumen:</span>
                            @if ($qc->lampiran_dokumen)
                                <a href="{{ asset('storage/' . $qc->lampiran_dokumen) }}" target="_blank"
                                    class="text-blue-600 hover:underline">Lihat Dokumen</a>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </div>

                        <div class="col-span-full border-t pt-3">
                            <span class="font-semibold text-gray-800">Dibuat oleh:</span>
                            <span class="text-gray-600">{{ $qc->dibuat_oleh }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-10 text-gray-500 bg-white rounded-xl border">
                    Belum ada data Quality Control.
                </div>
            @endforelse
        </div>
    </div>
@endsection
