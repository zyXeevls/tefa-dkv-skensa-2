@extends('layouts.app')

@section('title', 'Paspor Skill')

@section('content')
    <div class="p-4 sm:p-10 min-h-screen">
        <div class="max-w-7xl mx-auto bg-white shadow-2xl rounded-xl border border-gray-100 p-6 sm:p-10">

            <header class="text-center mb-10 border-b pb-4">
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900">PASPOR SKILL (SKILL PASSPORT)</h1>
                <p class="text-sm text-gray-600 mt-1">Teaching Factory Cluster Pentahelix – SMK …………</p>
            </header>

            <form id="skill-passport-form" class="space-y-12"
                onsubmit="alert('Data Paspor Skill berhasil dikirim (simulasi).'); return false;">

                <div class="mb-8 bg-blue-50 p-6 rounded-lg border border-blue-200">
                    <h2 class="text-lg font-bold text-blue-800 mb-4">Identitas Siswa</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4">
                        <div><label class="block text-sm font-medium text-gray-700">Nama Lengkap</label><input
                                type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2"
                                name="nama_siswa" placeholder="Cth: Siti Nurhaliza"></div>
                        <div><label class="block text-sm font-medium text-gray-700">NIS/NISN</label><input type="text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2"
                                name="nis"></div>
                        <div><label class="block text-sm font-medium text-gray-700">Kelas/Jurusan</label><input
                                type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2"
                                name="kelas_jurusan" placeholder="Cth: XII RPL"></div>
                        <div class="lg:col-span-3"><label class="block text-sm font-medium text-gray-700">Periode & Unit
                                TEFA</label><input type="text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2"
                                name="periode_unit" placeholder="Cth: Semester Genap 2024 - Unit Multimedia"></div>
                    </div>
                </div>

                <section>
                    <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-1">A. Kompetensi Teknis</h3>
                    <div class="overflow-x-auto shadow-md rounded-lg border border-gray-300">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-3 py-2 text-xs font-semibold text-gray-700 w-10">No</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">
                                        Kompetensi Teknis</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">Bukti
                                        Kegiatan/Proyek</th>
                                    <th class="px-3 py-2 text-center text-xs font-semibold text-gray-700 w-24">Tanggal</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">
                                        Verifikasi (Guru/Instruktur)</th>
                                    <th class="px-3 py-2 text-center text-xs font-semibold text-gray-700 w-32">Level (1–5)
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="teknis-table-body" class="divide-y divide-gray-200">
                            </tbody>
                        </table>
                    </div>
                    <button type="button" onclick="addRow('teknis')"
                        class="mt-4 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition duration-150 shadow-md flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Kompetensi Teknis
                    </button>
                    <p class="text-xs text-gray-500 mt-2">Level Penguasaan: 1=Mengenal, 2=Memahami, 3=Menerapkan, 4=Mahir,
                        5=Ahli/Mandiri</p>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-1">B. Kompetensi Non-Teknis (Soft Skills)
                    </h3>
                    <div class="overflow-x-auto shadow-md rounded-lg border border-gray-300">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-3 py-2 text-xs font-semibold text-gray-700 w-10">No</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">Aspek
                                    </th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">Bukti
                                        Kegiatan</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">
                                        Verifikasi</th>
                                    <th class="px-3 py-2 text-center text-xs font-semibold text-gray-700 w-32">Level (1–5)
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="nonteknis-table-body" class="divide-y divide-gray-200">
                            </tbody>
                        </table>
                    </div>
                    <button type="button" onclick="addRow('nonteknis')"
                        class="mt-4 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition duration-150 shadow-md flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Aspek Non-Teknis
                    </button>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-1">C. Portofolio Produk/Proyek</h3>
                    <div class="overflow-x-auto shadow-md rounded-lg border border-gray-300">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-3 py-2 text-xs font-semibold text-gray-700 w-10">No</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">Nama
                                        Proyek/Produk</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[200px]">
                                        Deskripsi</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">Hasil
                                        (Foto/Link)</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">
                                        Nilai/Feedback Pelanggan</th>
                                    <th class="px-3 py-2 text-center text-xs font-semibold text-gray-700 w-32">Status</th>
                                </tr>
                            </thead>
                            <tbody id="portofolio-table-body" class="divide-y divide-gray-200">
                            </tbody>
                        </table>
                    </div>
                    <button type="button" onclick="addRow('portofolio')"
                        class="mt-4 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition duration-150 shadow-md flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Portofolio Proyek
                    </button>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-1">D. Rekap Indeks Skill</h3>
                    <div
                        class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-yellow-50 p-6 rounded-lg border border-yellow-200">
                        <div class="col-span-1 md:col-span-2"><label
                                class="block text-sm font-medium text-gray-700">Rata-rata Kompetensi Teknis</label><input
                                type="text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2 bg-yellow-100 font-medium"
                                name="rata_teknis" placeholder="0.0 (Dihitung Otomatis)" readonly></div>
                        <div class="col-span-1 md:col-span-2"><label
                                class="block text-sm font-medium text-gray-700">Rata-rata Kompetensi
                                Non-Teknis</label><input type="text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2 bg-yellow-100 font-medium"
                                name="rata_nonteknis" placeholder="0.0 (Dihitung Otomatis)" readonly></div>
                        <div class="col-span-1 md:col-span-2"><label class="block text-sm font-medium text-gray-700">CSI
                                (Indeks Kepuasan Pelanggan terkait produk siswa)</label><input type="text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2 bg-yellow-100 font-medium"
                                name="csi" placeholder="Cth: 85.5 %" readonly></div>
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-sm font-bold text-gray-700">Status Penguasaan</label>
                            <select
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2 bg-yellow-100 font-bold"
                                name="status_penguasaan">
                                <option value="">Pilih Status</option>
                                <option value="Dasar">Dasar</option>
                                <option value="Menengah">Menengah</option>
                                <option value="Lanjut">Lanjut</option>
                            </select>
                        </div>
                    </div>
                </section>

                <section class="mt-12">
                    <h3 class="text-xl font-bold text-gray-800 mb-8 border-b pb-1">E. Validasi</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                        <div>
                            <p class="text-sm font-semibold text-gray-800 mb-10">Guru Pembimbing TEFA</p>
                            <input type="text" placeholder="(Nama Lengkap)"
                                class="mt-1 block w-full text-center border-b border-gray-400 focus:border-blue-500 focus:ring-0 p-1 font-medium text-gray-800"
                                name="guru_pembimbing">
                            <input type="date"
                                class="mt-4 block w-full text-center border-b border-gray-300 focus:border-blue-500 focus:ring-0 text-xs text-gray-600 p-1"
                                name="tgl_guru">
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800 mb-10">Kepala Program Keahlian</p>
                            <input type="text" placeholder="(Nama Lengkap)"
                                class="mt-1 block w-full text-center border-b border-gray-400 focus:border-blue-500 focus:ring-0 p-1 font-medium text-gray-800"
                                name="kepala_progam">
                            <input type="date"
                                class="mt-4 block w-full text-center border-b border-gray-300 focus:border-blue-500 focus:ring-0 text-xs text-gray-600 p-1"
                                name="tgl_kaprog">
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800 mb-10">Mitra Industri (Opsional)</p>
                            <input type="text" placeholder="(Nama Lengkap)"
                                class="mt-1 block w-full text-center border-b border-gray-400 focus:border-blue-500 focus:ring-0 p-1 font-medium text-gray-800"
                                name="mitra_industri">
                            <input type="date"
                                class="mt-4 block w-full text-center border-b border-gray-300 focus:border-blue-500 focus:ring-0 text-xs text-gray-600 p-1"
                                name="tgl_mitra">
                        </div>
                    </div>
                </section>

                <div class="pt-8 flex justify-center border-t border-gray-200">
                    <button type="submit"
                        class="px-8 py-3 bg-green-600 text-white text-lg font-bold rounded-lg hover:bg-green-700 transition duration-200 shadow-xl focus:outline-none focus:ring-4 focus:ring-green-500 focus:ring-opacity-50">
                        Kirim Data Paspor Skill
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let teknisRowCount = 0;
        let nonteknisRowCount = 0;
        let portofolioRowCount = 0;

        const softSkillAspects = ["Disiplin Waktu", "Kerja Sama Tim", "Komunikasi", "Kepemimpinan"];

        /**
         * Mengembalikan radio button Level (1-5) yang unik untuk setiap baris.
         * @param {string} namePrefix - Awalan nama unik untuk radio button.
         */
        function getLevelRadios(namePrefix) {
            let radios = '';
            for (let i = 1; i <= 5; i++) {
                radios += `
                <label class="flex items-center text-xs space-x-1">
                    <input type="radio" name="${namePrefix}_status" value="${i}" class="text-purple-600 focus:ring-purple-500 h-3 w-3">
                    ${i}
                </label>
            `;
            }
            return `<div class="flex justify-around space-x-1">${radios}</div>`;
        }

        /**
         * Menambahkan baris baru ke tabel yang ditentukan.
         */
        function addRow(tableId, isInitialSoftSkill = false, fixedAspek = '') {
            let tbody;
            let rowCountVar;
            let templateHtml;

            if (tableId === 'teknis') {
                tbody = document.getElementById('teknis-table-body');
                if (!tbody) return;
                teknisRowCount++;
                rowCountVar = teknisRowCount;

                templateHtml = `
                <tr>
                    <td class="whitespace-nowrap px-3 py-1 text-sm text-gray-500 text-center">${rowCountVar}</td>
                    <td class="px-3 py-1"><input type="text" class="table-input" name="teknis_${rowCountVar}_kompetensi"></td>
                    <td class="px-3 py-1"><input type="text" class="table-input" name="teknis_${rowCountVar}_bukti"></td>
                    <td class="px-3 py-1"><input type="date" class="table-input text-center" name="teknis_${rowCountVar}_tanggal"></td>
                    <td class="px-3 py-1"><input type="text" class="table-input" name="teknis_${rowCountVar}_verifikasi"></td>
                    <td class="px-3 py-1">${getLevelRadios(`teknis_${rowCountVar}`)}</td>
                </tr>
            `;
            } else if (tableId === 'nonteknis') {
                tbody = document.getElementById('nonteknis-table-body');
                if (!tbody) return;
                nonteknisRowCount++;
                rowCountVar = nonteknisRowCount;

                // Jika ini adalah baris soft skill inisial, gunakan nama aspek tetap
                const aspekValue = isInitialSoftSkill ? fixedAspek : '';
                const aspekInput = isInitialSoftSkill ?
                    `<span class="font-medium text-gray-700">${aspekValue}</span><input type="hidden" name="nonteknis_${rowCountVar}_aspek" value="${aspekValue}">` :
                    `<input type="text" class="table-input" name="nonteknis_${rowCountVar}_aspek">`;

                templateHtml = `
                <tr>
                    <td class="whitespace-nowrap px-3 py-1 text-sm text-gray-500 text-center">${rowCountVar}</td>
                    <td class="px-3 py-1">${aspekInput}</td>
                    <td class="px-3 py-1"><input type="text" class="table-input" name="nonteknis_${rowCountVar}_bukti"></td>
                    <td class="px-3 py-1"><input type="text" class="table-input" name="nonteknis_${rowCountVar}_verifikasi"></td>
                    <td class="px-3 py-1">${getLevelRadios(`nonteknis_${rowCountVar}`)}</td>
                </tr>
            `;
            } else if (tableId === 'portofolio') {
                tbody = document.getElementById('portofolio-table-body');
                if (!tbody) return;
                portofolioRowCount++;
                rowCountVar = portofolioRowCount;

                templateHtml = `
                <tr>
                    <td class="whitespace-nowrap px-3 py-1 text-sm text-gray-500 text-center">${rowCountVar}</td>
                    <td class="px-3 py-1"><input type="text" class="table-input" name="portofolio_${rowCountVar}_nama"></td>
                    <td class="px-3 py-1"><input type="text" class="table-input" name="portofolio_${rowCountVar}_deskripsi"></td>
                    <td class="px-3 py-1"><input type="url" class="table-input" name="portofolio_${rowCountVar}_link" placeholder="URL/Link"></td>
                    <td class="px-3 py-1"><input type="text" class="table-input" name="portofolio_${rowCountVar}_feedback"></td>
                    <td class="px-3 py-1 text-center">
                        <div class="flex justify-center space-x-3">
                            <label class="flex items-center text-sm"><input type="radio" name="portofolio_${rowCountVar}_status" value="Selesai" class="text-green-600 focus:ring-green-500"> Selesai</label>
                            <label class="flex items-center text-sm"><input type="radio" name="portofolio_${rowCountVar}_status" value="Proses" class="text-yellow-600 focus:ring-yellow-500"> Proses</label>
                        </div>
                    </td>
                </tr>
            `;
            } else {
                return;
            }

            const newRow = document.createElement('tr');
            newRow.innerHTML = templateHtml;
            tbody.appendChild(newRow);
        }

        // Inisialisasi baris saat halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            // A. Kompetensi Teknis (2 baris awal)
            addRow('teknis');
            addRow('teknis');

            // B. Kompetensi Non-Teknis (4 baris awal dengan nama aspek tetap)
            softSkillAspects.forEach(aspek => {
                addRow('nonteknis', true, aspek); // 'true' menandakan ini adalah baris inisial soft skill
            });

            // C. Portofolio Produk/Proyek (1 baris awal)
            addRow('portofolio');
        });
    </script>
@endsection
