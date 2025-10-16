<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('admin.data_siswa', compact('siswa'));
    }

    public function create()
    {
        return view('admin.tambah_siswa');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'required|string|max:50|unique:siswas',
            'kelas' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
        ]);

        Siswa::create($request->all());
        return redirect()->route('admin.data-siswa')->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('admin.edit_siswa', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());
        return redirect()->route('admin.data-siswa')->with('success', 'Data siswa diperbarui!');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('admin.data-siswa')->with('success', 'Siswa dihapus!');
    }
}
