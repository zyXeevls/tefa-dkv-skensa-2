<?php

namespace App\Http\Controllers;


use App\Models\Logbook;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LogbookController extends Controller
{
    public function create()
    {
        return view('logbook.form');
    }

    public function store(Request $request)
    {
        //bisa kosong table
        $request->merge([
            'kendala' => $request->input('kendala') ?? '',
            'tindak_lanjut' => $request->input('tindak_lanjut') ?? '',
        ]);

        // validasi table
        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:100',
            'kelas_jurusan' => 'required|string|max:100',
            'tanggal' => 'required|date_format:d-m-Y',
            'aktivitas_harian' => 'required|string|max:100',
            'hasil_qty' => 'required|integer',
            'kendala' => 'nullable|string|max:255',
            'tindak_lanjut' => 'nullable|string|max:255'
        ]);

        // Konversi format tanggal untuk PostgreSQL (DD-MM-YYYY -> YYYY-MM-DD)
        $validated['tanggal'] = Carbon::createFromFormat('d-m-Y', $validated['tanggal'])
            ->format('Y-m-d');

        Logbook::create($validated);

        return back()->with('success', 'Berhasil, data anda telah direkam');
    }

    public function index(Request $request)
    {
        $query = Logbook::query();

        // Filter berdasarkan tanggal (tanpa range)
        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        $logbooks = $query->latest()->get();

        return view('admin.logbook', compact('logbooks'));

        $logbooks = Logbook::latest()->get();
        return view('admin.logbook', compact('logbooks'));
    }

    public function destroy($id)
    {
        $logbook = Logbook::findOrFail($id);
        $logbook->delete();
    }
}
