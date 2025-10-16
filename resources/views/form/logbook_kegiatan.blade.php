@extends('layouts.app')

@section('title', 'Form Kehadiran & Kinerja Murid')

@section('content')
    {{-- Tambahkan pesan sukses di sini --}}
    <div class="min-h-screen flex items-center justify-center p-4 bg-gray-100">
        <div class="w-full max-w-xl bg-white p-8 rounded-xl shadow-lg">

            @if (session('success'))
                <div class="max-w-xl z-100 mx-auto mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg"
                    role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <img src="../img/vector/logbook.png" alt="LogBook" class="block mx-auto mb-8 w-full max-w-[250px] h-auto" />
            <form action="{{ route('logbook.store') }}" method="POST">
                @csrf

                {{-- nama siswa --}}
                <label for="nama-lengkap" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Nama
                    Lengkap</label>
                <input type="text" name="nama_siswa" id="nama-lengkap"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-5 min-h-10"
                    placeholder="Tuliskan nama lengkap kamu tanpa typo!" required />

                {{-- Komponen Kelas / Jurusan --}}
                <label for="kelas" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Kelas /
                    Jurusan</label>
                <select id="kelas" name="kelas_jurusan"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-5"
                    required>
                    <option value="11 DKV 1">XI DKV 1</option>
                    <option value="11 DKV 2">XI DKV 2</option>
                </select>

                <label for="tanggal"
                    class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Tanggal</label>
                <input datepicker-format="dd-mm-yyyy" datepicker name="tanggal" id="tanggal"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-5"
                    placeholder="Pilih Tanggal" required>

                {{-- aktivitas harian --}}
                <label for="aktivitas" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Aktivitas
                    Harian</label>
                <input type="text" name="aktivitas_harian" id="aktivitasHarian"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-5 min-h-[10vh]"
                    placeholder="Tuliskan kegiatan anda hari ini" required />

                {{-- hasil qty/unit --}}
                <label for="hasil" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Hasil
                    (qty/unit)</label>
                <input type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2"
                    name="hasil_qty" placeholder="0" required>

                <label for="kendala"
                    class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 mt-3">Kendala/Masalah hari
                    ini</label>
                <input type="text" name="kendala" id="kendala"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-5 min-h-10"
                    placeholder="Tuliskan jika ada kendala" />

                {{-- tindak lanjut --}}
                <label for="tindak-lanjut" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Tindak
                    Lanjut</label>
                <input type="text" name="tindak_lanjut" id="tindakLanjut"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-5 min-h-10"
                    placeholder="Tuliskan jika ada massalh yang sudah ditindak lanjuti" />

                <button type="submit"
                    class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-base px-5 py-3 text-center transition-colors duration-200">
                    Kirim Data Kegiatan Hari ini
                </button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('nama-lengkap').addEventListener('input', function() {
            this.value = this.value.toUpperCase();
        });
    </script>
@endsection
