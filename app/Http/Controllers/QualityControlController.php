<?php

namespace App\Http\Controllers;

use App\Models\QualityControl;
use Illuminate\Http\Request;

class QualityControlController extends Controller
{
    public function index()
    {
        $qcs = QualityControl::latest()->get();
        return view('admin.qc.index', compact('qcs'));
    }

    public function create()
    {
        return view('admin.qc.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_qc' => 'required|string|max:255',
            'tanggal_qc' => 'required|date',
            'produk_jasa' => 'required|string|max:255',
            'batch_lot' => 'nullable|string|max:255',
            'pemeriksa' => 'nullable|string|max:255',
            'departemen' => 'nullable|string|max:255',
            'jml_periksa' => 'nullable|integer',
            'jml_good' => 'nullable|integer',
            'jml_ng' => 'nullable|integer',
            'fpy' => 'nullable|string|max:20',
            'penyetuju' => 'nullable|string|max:255',
        ]);

        QualityControl::create($validated);

        return redirect()
            ->route('admin.qc.create')
            ->with('success', '✅ Data QC berhasil disimpan!');
    }
}