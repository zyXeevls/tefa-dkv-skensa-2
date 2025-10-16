<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    protected $table = 'logbooks';

    protected $fillable = [
        'nama_siswa',
        'kelas_jurusan',
        'tanggal',
        'aktivitas_harian',
        'hasil_qty',
        'kendala',
        'tindak_lanjut',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
