<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    use HasFactory;

    // Tentukan kolom mana saja yang boleh diisi (mass assignment)
    protected $fillable = [
        'periode',
        'pengawas',
        'blok_tefa',
        'nama_lengkap',
        'nisn',
        'kelas_jurusan',
        'tanggal',
        'kehadiran'
    ];
}
