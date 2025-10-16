<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('q_c_s', function (Blueprint $table) {
            $table->id();

            // ===== Identitas QC =====
            $table->string('nomor_qc')->unique();
            $table->date('tanggal_qc');
            $table->string('produk_jasa');
            $table->string('batch_lot')->nullable();
            $table->string('pemeriksa');
            $table->string('departemen')->nullable();

            // ===== Data Pemeriksaan =====
            $table->integer('jml_periksa')->nullable();
            $table->integer('jml_good')->nullable();
            $table->integer('jml_ng')->nullable();
            $table->decimal('fpy', 5, 2)->nullable(); // persentase First Pass Yield

            // ===== Jenis Cacat / Temuan =====
            $table->string('jenis_cacat_utama')->nullable();
            $table->string('jenis_cacat_lain')->nullable();
            $table->text('deskripsi_cacat')->nullable();
            $table->string('lokasi_cacat')->nullable();
            $table->boolean('perlu_perbaikan')->default(false);

            // ===== Tindakan / Verifikasi =====
            $table->string('tindakan_perbaikan')->nullable();
            $table->string('penanggung_jawab')->nullable();
            $table->date('tgl_tindakan')->nullable();
            $table->enum('status_verifikasi', ['Pending', 'Diterima', 'Ditolak'])->default('Pending');
            $table->text('catatan_verifikator')->nullable();

            // ===== Persetujuan / Penandatangan =====
            $table->string('penyetuju')->nullable();
            $table->string('jabatan_penyetuju')->nullable();
            $table->date('tanggal_persetujuan')->nullable();
            $table->string('tanda_tangan_pemeriksa')->nullable();
            $table->string('tanda_tangan_penyetuju')->nullable();

            // ===== File Pendukung =====
            $table->string('lampiran_foto')->nullable(); // path file
            $table->string('lampiran_dokumen')->nullable();

            // ===== Metadata =====
            $table->string('dibuat_oleh')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quality_controls');
    }
};