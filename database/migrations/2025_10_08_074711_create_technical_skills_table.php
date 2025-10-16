<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('technical_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skill_passport_id')->constrained()->onDelete('cascade');
            $table->string('kompetensi');
            $table->string('bukti');
            $table->date('tanggal');
            $table->string('verifikasi');
            $table->unsignedTinyInteger('level'); // Nilai 1-5
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('technical_skills');
    }
};
