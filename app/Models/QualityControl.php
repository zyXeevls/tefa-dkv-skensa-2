<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityControl extends Model
{
    use HasFactory;

    protected $table = 'q_c_s';
    protected $fillable = [
        // Identitas QC
        'nomor_qc',
        'tanggal_qc',
        'produk_jasa',
        'batch_lot',
        'pemeriksa',
        'departemen',

        // Data Pemeriksaan
        'jml_periksa',
        'jml_good',
        'jml_ng',
        'fpy',

        // Jenis Cacat
        'jenis_cacat_utama',
        'jenis_cacat_lain',
        'deskripsi_cacat',
        'lokasi_cacat',
        'perlu_perbaikan',

        // Verifikasi / Tindakan
        'tindakan_perbaikan',
        'penanggung_jawab',
        'tgl_tindakan',
        'status_verifikasi',
        'catatan_verifikator',

        // Persetujuan
        'penyetuju',
        'jabatan_penyetuju',
        'tanggal_persetujuan',
        'tanda_tangan_pemeriksa',
        'tanda_tangan_penyetuju',

        // Lampiran
        'lampiran_foto',
        'lampiran_dokumen',

        // Metadata
        'dibuat_oleh',
    ];
}