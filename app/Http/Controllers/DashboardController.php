<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use App\Models\Feedback;
use App\Models\Kehadiran;
use App\Models\QualityControl;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today('Asia/Jakarta');

        // Hitung total siswa unik di tabel kehadiran
        $totalSiswa = Kehadiran::distinct('nama_lengkap')->count('nama_lengkap');

        // Hitung siswa yang hadir hari ini
        $hadirHariIni = Kehadiran::whereDate('tanggal', $today)
            ->where('kehadiran', 'hadir')
            ->distinct('nama_lengkap')
            ->count('nama_lengkap');

        //hitung logbook hari ini
        $logbookHariIni = Logbook::whereDate('tanggal', $today)
            ->distinct('nama_siswa')
            ->count('nama_siswa');

        //hitung saran hari ini
        $kepuasanPelanggan = Feedback::whereDate('date_end', $today)
            ->distinct('customer_name')
            ->count('customer_name');

        //Total Quality Control
        $totalQC = QualityControl::count();

        // Data lain (dummy sementara) 
        $totalProyek = 8;
        $nilaiRata = 87;
        $tugasSelesai = 245;

        return view('admin.dashboard', compact(
            'totalSiswa',
            'hadirHariIni',
            'logbookHariIni',
            'totalQC',
            'kepuasanPelanggan',
            'totalProyek',
            'nilaiRata',
            'tugasSelesai'
        ));
    }
}