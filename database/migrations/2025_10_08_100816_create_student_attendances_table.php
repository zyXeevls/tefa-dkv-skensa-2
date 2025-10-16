<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_attendances', function (Blueprint $table) {
            $table->id();

            // Kolom dari formulir
            $table->string('periode', 20);
            $table->string('pengawas', 100);
            $table->string('blok_tefa', 50);
            $table->string('nama_lengkap', 100);
            $table->string('nisn', 20);
            $table->string('kelas_jurusan', 50);
            $table->date('tanggal');
            $table->string('kehadiran', 10);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_attendances');
    }
};
