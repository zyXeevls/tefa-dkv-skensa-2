<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    public function index(Request $request)
    {
        $query = Kehadiran::query();

        // Filter berdasarkan nama / nisn
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'LIKE', "%{$search}%")
                    ->orWhere('nisn', 'LIKE', "%{$search}%");
            });
        }

        // Filter tanggal 
        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        // Filter kelas
        if ($request->filled('kelas_jurusan')) {
            $query->where('kelas_jurusan', $request->kelas_jurusan);
        }

        // Filter status kehadiran
        if ($request->filled('kehadiran')) {
            $query->where('kehadiran', $request->kehadiran);
        }

        // Hasil akhir
        $kehadiran = $query->orderBy('tanggal', 'desc')->get();

        return view('admin.kehadiran', compact('kehadiran'));
    }
}
