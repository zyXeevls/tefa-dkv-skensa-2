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
