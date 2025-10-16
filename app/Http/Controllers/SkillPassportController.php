<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SkillPassport;
use App\Models\TechnicalSkill;
use App\Models\SoftSkill;
use App\Models\PortfolioProject;

class SkillPassportController extends Controller
{
    // Menampilkan form (Form Paspor Skill)
    public function create()
    {
        return view('skill_passport.create');
    }

    // Menyimpan data dari form
    public function store(Request $request)
    {
        // 1. Validasi Data Utama
        $validatedData = $request->validate([
            'nama_siswa' => 'required|string|max:100',
            'nis' => 'required|string|max:20|unique:skill_passports,nis',
            'kelas_jurusan' => 'required|string|max:50',
            'periode_unit' => 'required|string|max:100',
            // ... (Tambahkan validasi untuk semua field utama)
            'guru_pembimbing' => 'required|string|max:100',
            'tgl_guru' => 'required|date',
            'kepala_progam' => 'required|string|max:100',
            'tgl_kaprog' => 'required|date',
        ]);

        // 2. Simpan Data Utama dalam Transaksi
        DB::transaction(function () use ($request, $validatedData) {
            // Simpan data Paspor Skill
            $passport = SkillPassport::create($validatedData);

            // 3. Simpan Data Dinamis (Technical Skills)
            if ($request->has('teknis')) {
                foreach ($request->teknis as $teknisData) {
                    if (!empty($teknisData['kompetensi'])) {
                        $passport->technicalSkills()->create([
                            'kompetensi' => $teknisData['kompetensi'],
                            'bukti' => $teknisData['bukti'],
                            'tanggal' => $teknisData['tanggal'],
                            'verifikasi' => $teknisData['verifikasi'],
                            'level' => $teknisData['level'],
                        ]);
                    }
                }
            }

            // 4. Simpan Data Dinamis (Soft Skills)
            if ($request->has('nonteknis')) {
                foreach ($request->nonteknis as $softData) {
                    if (!empty($softData['aspek'])) {
                        $passport->softSkills()->create([
                            'aspek' => $softData['aspek'],
                            'bukti' => $softData['bukti'],
                            'verifikasi' => $softData['verifikasi'],
                            'level' => $softData['level'],
                        ]);
                    }
                }
            }

            // 5. Simpan Data Dinamis (Portofolio)
            if ($request->has('portofolio')) {
                foreach ($request->portofolio as $portofolioData) {
                    if (!empty($portofolioData['nama_proyek'])) {
                        $passport->portfolioProjects()->create([
                            'nama_proyek' => $portofolioData['nama_proyek'],
                            'deskripsi' => $portofolioData['deskripsi'],
                            'hasil_link' => $portofolioData['hasil_link'],
                            'feedback' => $portofolioData['feedback'],
                            'status' => $portofolioData['status'],
                        ]);
                    }
                }
            }
        }); // Transaksi berakhir

        return redirect()->route('skill_passport.create')->with('success', 'Paspor Skill berhasil disimpan!');
    }
}
