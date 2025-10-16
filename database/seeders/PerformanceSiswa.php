<?php

namespace Database\Seeders;

use App\Models\Performance;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PerformanceSiswa extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Performance::create([
            'nama' => 'Admin',
            'nisn' => '1234567890',
            'nilai_produktif' => "99",
            'softskil' => '80',
            'kehadiran' => '99',
            'rata_rata' => '98',
        ]);
    }
}
