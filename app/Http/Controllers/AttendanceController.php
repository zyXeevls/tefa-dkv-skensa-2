<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAttendance;
use Carbon\Carbon; // JANGAN LUPA: Tambahkan use Carbon\Carbon

class AttendanceController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi Data
        // Kita hanya perlu memastikan tanggal wajib diisi dan merupakan string
        $validatedData = $request->validate([
            'periode' => 'required|string|max:20',
            'pengawas' => 'required|string|max:100',
            'blok_tefa' => 'required|string|max:50',
            'nama_lengkap' => 'required|string|max:100',
            'nisn' => 'required|string|max:20',
            'kelas_jurusan' => 'required|string|max:50',
            'tanggal' => 'required|string', // Cukup pastikan ini string
            'kehadiran' => 'required|string|in:hadir,sakit,izin,alpha',
        ]);

        // 2. Koreksi Format Tanggal
        // Format input dari form Anda: DD-MM-YYYY (08-10-2025)
        // Format yang dibutuhkan MySQL: YYYY-MM-DD (2025-10-08)
        try {
            $formattedDate = Carbon::createFromFormat('d-m-Y', $validatedData['tanggal'])
                ->format('Y-m-d');
        } catch (\Exception $e) {
            // Jika parsing gagal (misalnya pengguna memasukkan format aneh), 
            // kita bisa kembalikan error.
            return redirect()->back()->withErrors(['tanggal' => 'Format tanggal harus DD-MM-YYYY (e.g., 08-10-2025).'])->withInput();
        }

        // 3. Gabungkan data yang sudah dikoreksi format tanggalnya
        $dataToStore = array_merge($validatedData, ['tanggal' => $formattedDate]);

        // 4. Simpan Data ke Database
        StudentAttendance::create($dataToStore);

        // 5. Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data Kehadiran & Kinerja berhasil direkam!');
    }
}
