<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skill_passport_id')->constrained()->onDelete('cascade');
            $table->string('nama_proyek');
            $table->text('deskripsi');
            $table->string('hasil_link')->nullable();
            $table->string('feedback')->nullable();
            $table->string('status', 20); // Selesai/Proses
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_projects');
    }
};
