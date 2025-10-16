<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Performance extends Model
{
    use HasFactory;

    protected $table = 'performances';

    protected $fillable = [
        'nama',
        'nisn',
        'nilai_produktif',
        'softskill',
        'kehadiran',
        'rata_rata',
    ];
}
