<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Performance;

class PerformanceController extends Controller
{
    public function index()
    {
        return view('form.cek_performa');
    }

    public function show(Request $request)
    {
        $request->validate([
            'nisn' => 'required|numeric'
        ]);

        $data = Performance::where('nisn', $request->nisn)->first();

        if (!$data) {
            return back()->with('error', 'NISN tidak ditemukan. Pastikan Anda memasukkan NISN dengan benar.');
        }

        return view('cek-performa', compact('data'));
    }
}
