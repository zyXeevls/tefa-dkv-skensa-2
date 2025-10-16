<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('soft_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skill_passport_id')->constrained()->onDelete('cascade');
            $table->string('aspek');
            $table->string('bukti');
            $table->string('verifikasi');
            $table->unsignedTinyInteger('level'); // Nilai 1-5
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('soft_skills');
    }
};
