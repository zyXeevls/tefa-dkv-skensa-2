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

            <img src="../img/vector/attendances.png" alt="Kehadiran" class="block mx-auto mb-8 w-full max-w-[250px] h-auto" />

            {{-- Action mengarah ke route Laravel --}}
            <form action="{{ route('attendance.store') }}" method="POST">
                @csrf

                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2 text-center">Kehadiran & Kinerja Siswa
                    </h2>
                    <p class="text-sm text-gray-600 text-center leading-relaxed">
                        Teaching Factory DKV Pentahelix – SMKN 1 RANGKASBITUNG
                    </p>
                </div>

                <label for="periode" class="block text-sm font-semibold text-gray-700 mb-2 mt-4">Periode
                    Bulan</label>
                <select id="periode" name="periode"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-5"
                    required>
                    <option value="januari">Januari</option>
                    <option value="februari">Februari</option>
                    <option value="maret">Maret</option>
                    <option value="april">April</option>
                    <option value="mei">Mei</option>
                    <option value="juni">Juni</option>
                    <option value="juli">Juli</option>
                    <option value="agustus">Agustus</option>
                    <option value="september">September</option>
                    <option value="oktober">Oktober</option>
                    <option value="november">November</option>
                    <option value="desember">Desember</option>
                </select>

                {{-- Komponen Pengawas --}}
                <label for="pengawas" class="block text-sm font-semibold text-gray-700 mb-2 mt-4">Pengawas</label>
                <select id="pengawas" name="pengawas"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-5"
                    required>
                    <option value="Farhan Ainu Bikzy, S.Des - Adi Ardiansyah, S.Kom">Farhan Ainu Bikzy, S.Des - Adi
                        Ardiansyah, S.Kom</option>
                    <option value="Sopyan Hardiyanto S.Sn, MM">Sopyan Hardiyanto S.Sn, MM</option>
                    <option value="Rizky Ramadhan S.Kom">Rizky Ramadhan S.Kom</option>
                    <option value="Septiana Indra P, S.Kom - M. Abdu Al-Afgani, S.Kom, Gr">Septiana Indra P, S.Kom - M. Abdu
                        Al-Afgani, S.Kom, Gr</option>
                </select>

                {{-- Komponen Blok Tefa --}}
                <label for="blok-tefa" class="block text-sm font-semibold text-gray-700 mb-2 mt-4">Blok
                    Tefa</label>
                <select id="blok-tefa" name="blok_tefa"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-5"
                    required>
                    <option value="Desain Percetakan">Desain Percetakan</option>
                    <option value="Foto/Video & Sosmed">Foto/Video & Sosmed</option>
                    <option value="Animasi 2D / 3D">Animasi 2D / 3D</option>
                    <option value="Software & Web Desain">Software & Web Desain</option>
                </select>

                {{-- Komponen Nama Lengkap (Text Input) --}}
                <label for="nama-lengkap" class="block text-sm font-semibold text-gray-700 mb-2 mt-4">Nama
                    Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama-lengkap"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-5"
                    placeholder="Harap masukan nama lengkap Anda tanpa typo" required />

                {{-- Komponen NISN (Number Input) --}}
                <label for="nisn" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">NISN</label>
                <input type="number" name="nisn" id="nisn"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-5"
                    placeholder="Masukkan NISN Anda" required />

                {{-- Komponen Kelas / Jurusan --}}
                <label for="kelas" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Kelas /
                    Jurusan</label>
                <select id="kelas" name="kelas_jurusan"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-5"
                    required>
                    <option value="11 DKV 1">XI DKV 1</option>
                    <option value="11 dkv 2">XI DKV 2</option>
                </select>

                {{-- Komponen Tanggal (Datepicker) --}}
                <label for="tanggal"
                    class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Tanggal</label>
                <input datepicker-format="dd-mm-yyyy" datepicker name="tanggal" id="tanggal" {{-- TAMBAH: name="tanggal" --}}
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-5"
                    placeholder="Pilih Tanggal" required>

                {{-- Komponen Kehadiran --}}
                <label for="kehadiran"
                    class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Kehadiran</label>
                <select id="kehadiran" name="kehadiran"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-5"
                    required>
                    <option value="Hadir" selected>Hadir</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Izin">Izin</option>
                    <option value="Alpa">Alpa</option>
                </select>

                <button type="submit"
                    class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-base px-5 py-3 text-center transition-colors duration-200">
                    Kirim Data Kehadiran
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
