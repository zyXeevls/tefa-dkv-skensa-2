@extends('layouts.app')

@section('title', 'Form Quality Control (QC)')

@section('content')
    <div class="p-4 sm:p-10 min-h-screen">
        <div class="max-w-7xl mx-auto bg-white shadow-2xl rounded-xl border border-gray-100 p-6 sm:p-10">

            <header class="text-center mb-10 border-b pb-4">
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900">FORM QUALITY CONTROL (QC)</h1>
                <p class="text-sm text-gray-600 mt-1">Teaching Factory Cluster Pentahelix – SMKN 1 RANGKASBITUNG</p>
            </header>

            <form id="qc-form" class="space-y-10"
                onsubmit="alert('Formulir berhasil dikirim (simulasi). Cek konsol untuk data.'); return false;">
                <div class="mb-8 bg-gray-50 p-6 rounded-lg border border-gray-200">
                    <h2 class="text-lg font-bold text-gray-800 mb-4">Informasi Dokumen</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nomor QC</label><input type="text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2"
                                name="nomor_qc">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal</label><input
                                datepicker-format="dd-mm-yyyy" datepicker name="tanggal-qc" id="tanggal-qc"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-5"
                                placeholder="Pilih Tanggal" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Produk/Jasa</label><input type="text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2"
                                name="produk_jasa">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Batch/Lot</label><input type="text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2"
                                name="batch_lot">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Pemeriksa</label><input type="text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2"
                                name="pemeriksa">
                        </div>
                    </div>
                </div>

                <section>
                    <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-1">A. Incoming Quality Control (IQC)</h3>
                    <div class="overflow-x-auto shadow-md rounded-lg border border-gray-300">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-3 py-2 text-xs font-semibold text-gray-700 w-10">No</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[120px]">
                                        Bahan/Komponen</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">
                                        Spesifikasi</th>
                                    <th class="px-3 py-2 text-center text-xs font-semibold text-gray-700 w-24">Jml Diterima
                                    </th>
                                    <th class="px-3 py-2 text-center text-xs font-semibold text-gray-700 w-24">Jml Cek</th>
                                    <th class="px-3 py-2 text-center text-xs font-semibold text-gray-700 w-32">Hasil (G/NG)
                                    </th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">
                                        Catatan</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">Tindak
                                        Lanjut</th>
                                </tr>
                            </thead>
                            <tbody id="iqc-table-body" class="divide-y divide-gray-200">
                            </tbody>
                        </table>
                    </div>
                    <button type="button" onclick="addRow('iqc')"
                        class="mt-4 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition duration-150 shadow-md flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Baris IQC
                    </button>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-1">B. In-Process Quality Control (IPQC)</h3>
                    <div class="overflow-x-auto shadow-md rounded-lg border border-gray-300">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-3 py-2 text-xs font-semibold text-gray-700 w-10">No</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[120px]">Tahap
                                        Proses</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">
                                        Parameter Kontrol</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">
                                        Standar</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[120px]">Hasil
                                        Uji</th>
                                    <th class="px-3 py-2 text-center text-xs font-semibold text-gray-700 w-32">Status (G/NG)
                                    </th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">
                                        Catatan</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">Tindak
                                        Lanjut</th>
                                </tr>
                            </thead>
                            <tbody id="ipqc-table-body" class="divide-y divide-gray-200">
                            </tbody>
                        </table>
                    </div>
                    <button type="button" onclick="addRow('ipqc')"
                        class="mt-4 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition duration-150 shadow-md flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Baris IPQC
                    </button>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-1">C. Outgoing Quality Control (OQC)</h3>
                    <div class="overflow-x-auto shadow-md rounded-lg border border-gray-300">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-3 py-2 text-xs font-semibold text-gray-700 w-10">No</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[120px]">Item
                                        Produk/Jasa</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">
                                        Parameter Uji</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">
                                        Standar</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[120px]">Hasil
                                        Uji</th>
                                    <th class="px-3 py-2 text-center text-xs font-semibold text-gray-700 w-32">Status (G/NG)
                                    </th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">
                                        Catatan</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-700 min-w-[150px]">Tindak
                                        Lanjut</th>
                                </tr>
                            </thead>
                            <tbody id="oqc-table-body" class="divide-y divide-gray-200">
                            </tbody>
                        </table>
                    </div>
                    <button type="button" onclick="addRow('oqc')"
                        class="mt-4 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition duration-150 shadow-md flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Baris OQC
                    </button>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-1">D. Rekapitulasi Hasil QC</h3>
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jumlah diperiksa</label>
                            <input type="number"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2 text-right"
                                name="jml_periksa" placeholder="0">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jumlah Good</label>
                            <input type="number"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2 text-right"
                                name="jml_good" placeholder="0">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jumlah NG (Not Good)</label>
                            <input type="number"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2 text-right"
                                name="jml_ng" placeholder="0">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-700 font-bold">Tingkat First Pass Yield
                                (FPY)</label>
                            <input type="text"
                                class="mt-1 block w-full rounded-md border-blue-500 border-2 shadow-inner sm:text-sm p-2 bg-blue-50 text-right font-bold"
                                name="fpy" placeholder="0 %" readonly>
                        </div>
                    </div>
                </section>

                <section class="mt-12">
                    <h3 class="text-xl font-bold text-gray-800 mb-8 border-b pb-1">E. Persetujuan</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-10 text-center">
                        <div>
                            <p class="text-sm font-semibold text-gray-800 mb-10">Diperiksa oleh, QC Inspector / Guru TEFA
                            </p>
                            <input type="text" placeholder="(Nama Lengkap)"
                                class="mt-1 block w-full text-center border-b border-gray-400 focus:border-blue-500 focus:ring-0 p-1 font-medium text-gray-800"
                                name="pemeriksa">
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800 mb-10">Disetujui oleh, Koordinator Produksi & QA
                            </p>
                            <input type="text" placeholder="(Nama Lengkap)"
                                class="mt-1 block w-full text-center border-b border-gray-400 focus:border-blue-500 focus:ring-0 p-1 font-medium text-gray-800"
                                name="penyetuju">
                        </div>
                    </div>
                </section>

                <div class="pt-8 flex justify-center border-t">
                    <button type="submit"
                        class="px-8 py-3 bg-green-600 text-white text-lg font-bold rounded-lg hover:bg-green-700 transition duration-200 shadow-xl focus:outline-none focus:ring-4 focus:ring-green-500 focus:ring-opacity-50">
                        Kirim Data QC
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Variabel global untuk melacak nomor baris saat ini untuk setiap tabel
        let iqcRowCount = 0;
        let ipqcRowCount = 0;
        let oqcRowCount = 0;

        /**
         * Menambahkan baris baru ke tabel QC yang ditentukan.
         * @param {string} tableId - ID tabel: 'iqc', 'ipqc', atau 'oqc'.
         */
        function addRow(tableId) {
            let tbody;
            let rowCountVar;
            let templateHtml;

            if (tableId === 'iqc') {
                tbody = document.getElementById('iqc-table-body');
                // Cek jika tbody ditemukan
                if (!tbody) {
                    console.error("Error: Element with ID 'iqc-table-body' not found.");
                    return;
                }
                iqcRowCount++;
                rowCountVar = iqcRowCount;

                // Template HTML untuk Baris IQC
                templateHtml = `
                <tr>
                    <td class="whitespace-nowrap px-3 py-1 text-sm text-gray-500 text-center">${rowCountVar}</td>
                    <td class="px-3 py-1"><input type="text" class="w-full text-sm border-0 focus:ring-0 p-0" name="iqc_${rowCountVar}_bahan"></td>
                    <td class="px-3 py-1"><input type="text" class="w-full text-sm border-0 focus:ring-0 p-0" name="iqc_${rowCountVar}_spek"></td>
                    <td class="px-3 py-1"><input type="number" class="w-full text-sm text-center border-0 focus:ring-0 p-0" name="iqc_${rowCountVar}_diterima" min="0"></td>
                    <td class="px-3 py-1"><input type="number" class="w-full text-sm text-center border-0 focus:ring-0 p-0" name="iqc_${rowCountVar}_cek" min="0"></td>
                    <td class="px-3 py-1 text-center">
                        <div class="flex justify-center space-x-3">
                            <label class="flex items-center text-sm"><input type="radio" name="iqc_${rowCountVar}_status" value="G" class="text-green-600 focus:ring-green-500"> G</label>
                            <label class="flex items-center text-sm"><input type="radio" name="iqc_${rowCountVar}_status" value="NG" class="text-red-600 focus:ring-red-500"> NG</label>
                        </div>
                    </td>
                    <td class="px-3 py-1"><input type="text" class="w-full text-sm border-0 focus:ring-0 p-0" name="iqc_${rowCountVar}_catatan"></td>
                    <td class="px-3 py-1"><input type="text" class="w-full text-sm border-0 focus:ring-0 p-0" name="iqc_${rowCountVar}_tindaklanjut"></td>
                </tr>
            `;
            } else if (tableId === 'ipqc') {
                tbody = document.getElementById('ipqc-table-body');
                if (!tbody) {
                    console.error("Error: Element with ID 'ipqc-table-body' not found.");
                    return;
                }
                ipqcRowCount++;
                rowCountVar = ipqcRowCount;

                // Template HTML untuk Baris IPQC
                templateHtml = `
                <tr>
                    <td class="whitespace-nowrap px-3 py-1 text-sm text-gray-500 text-center">${rowCountVar}</td>
                    <td class="px-3 py-1"><input type="text" class="w-full text-sm border-0 focus:ring-0 p-0" name="ipqc_${rowCountVar}_proses"></td>
                    <td class="px-3 py-1"><input type="text" class="w-full text-sm border-0 focus:ring-0 p-0" name="ipqc_${rowCountVar}_kontrol"></td>
                    <td class="px-3 py-1"><input type="text" class="w-full text-sm border-0 focus:ring-0 p-0" name="ipqc_${rowCountVar}_standar"></td>
                    <td class="px-3 py-1"><input type="text" class="w-full text-sm border-0 focus:ring-0 p-0" name="ipqc_${rowCountVar}_hasil"></td>
                    <td class="px-3 py-1 text-center">
                        <div class="flex justify-center space-x-3">
                            <label class="flex items-center text-sm"><input type="radio" name="ipqc_${rowCountVar}_status" value="G" class="text-green-600 focus:ring-green-500"> G</label>
                            <label class="flex items-center text-sm"><input type="radio" name="ipqc_${rowCountVar}_status" value="NG" class="text-red-600 focus:ring-red-500"> NG</label>
                        </div>
                    </td>
                    <td class="px-3 py-1"><input type="text" class="w-full text-sm border-0 focus:ring-0 p-0" name="ipqc_${rowCountVar}_catatan"></td>
                    <td class="px-3 py-1"><input type="text" class="w-full text-sm border-0 focus:ring-0 p-0" name="ipqc_${rowCountVar}_tindaklanjut"></td>
                </tr>
            `;
            } else if (tableId === 'oqc') {
                tbody = document.getElementById('oqc-table-body');
                if (!tbody) {
                    console.error("Error: Element with ID 'oqc-table-body' not found.");
                    return;
                }
                oqcRowCount++;
                rowCountVar = oqcRowCount;

                // Template HTML untuk Baris OQC
                templateHtml = `
                <tr>
                    <td class="whitespace-nowrap px-3 py-1 text-sm text-gray-500 text-center">${rowCountVar}</td>
                    <td class="px-3 py-1"><input type="text" class="w-full text-sm border-0 focus:ring-0 p-0" name="oqc_${rowCountVar}_item"></td>
                    <td class="px-3 py-1"><input type="text" class="w-full text-sm border-0 focus:ring-0 p-0" name="oqc_${rowCountVar}_parameter"></td>
                    <td class="px-3 py-1"><input type="text" class="w-full text-sm border-0 focus:ring-0 p-0" name="oqc_${rowCountVar}_standar"></td>
                    <td class="px-3 py-1"><input type="text" class="w-full text-sm border-0 focus:ring-0 p-0" name="oqc_${rowCountVar}_hasil"></td>
                    <td class="px-3 py-1 text-center">
                        <div class="flex justify-center space-x-3">
                            <label class="flex items-center text-sm"><input type="radio" name="oqc_${rowCountVar}_status" value="G" class="text-green-600 focus:ring-green-500"> G</label>
                            <label class="flex items-center text-sm"><input type="radio" name="oqc_${rowCountVar}_status" value="NG" class="text-red-600 focus:ring-red-500"> NG</label>
                        </div>
                    </td>
                    <td class="px-3 py-1"><input type="text" class="w-full text-sm border-0 focus:ring-0 p-0" name="oqc_${rowCountVar}_catatan"></td>
                    <td class="px-3 py-1"><input type="text" class="w-full text-sm border-0 focus:ring-0 p-0" name="oqc_${rowCountVar}_tindaklanjut"></td>
                </tr>
            `;
            } else {
                return;
            }

            const newRow = document.createElement('tr');
            newRow.innerHTML = templateHtml;
            tbody.appendChild(newRow);
        }

        // Fungsi untuk inisialisasi baris saat halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            // Cek apakah skrip berjalan (bisa dilihat di Console Browser)
            console.log("Skrip penambahan baris dinamis telah berjalan.");

            // Tambahkan 2 baris awal untuk setiap tabel agar tidak kosong
            addRow('iqc');
            addRow('iqc');
            addRow('ipqc');
            addRow('ipqc');
            addRow('oqc');
            addRow('oqc');
        });
    </script>
@endsection
