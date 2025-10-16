<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skill_passports', function (Blueprint $table) {
            $table->id();

            // Identitas Siswa
            $table->string('nama_siswa', 100);
            $table->string('nis', 20)->unique();
            $table->string('kelas_jurusan', 50);
            $table->string('periode_unit', 100);

            // Rekap Indeks Skill (Nullable karena bisa diisi belakangan/otomatis)
            $table->decimal('rata_teknis', 4, 2)->nullable();
            $table->decimal('rata_nonteknis', 4, 2)->nullable();
            $table->decimal('csi', 5, 2)->nullable();
            $table->string('status_penguasaan', 50)->nullable();

            // Validasi / Persetujuan
            $table->string('guru_pembimbing', 100);
            $table->date('tgl_guru');
            $table->string('kepala_progam', 100);
            $table->date('tgl_kaprog');
            $table->string('mitra_industri', 100)->nullable();
            $table->date('tgl_mitra')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skill_passports');
    }
};
