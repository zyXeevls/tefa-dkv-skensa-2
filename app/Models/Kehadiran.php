<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    protected $table = 'student_attendances';

    protected $fillable = [
        'periode',
        'pengawas',
        'blok_tefa',
        'nama_lengkap',
        'nisn',
        'kelas_jurusan',
        'tanggal',
        'kehadiran',
    ];
}
