<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Capa extends Model
{
    protected $table = 'capa';

    protected $fillable = [
        'nomor_capa',
        'sumber',
        'insiden_id',
        'identifikasi_bahaya_id',

        'deskripsi_masalah',

        'tindakan_perbaikan',
        'tindakan_pencegahan',

        'penanggung_jawab',
        'departemen_id',

        'target_selesai',
        'tanggal_selesai',

        'status',
        'efektivitas',

        'dibuat_oleh',
        'diverifikasi_oleh',
    ];

    public function laporanInsiden()
    {
        return $this->belongsTo(
            LaporanInsiden::class,
            'insiden_id'
        );
    }

    public function identifikasiBahaya()
    {
        return $this->belongsTo(
            IdentifikasiBahaya::class,
            'identifikasi_bahaya_id'
        );
    }

    public function penanggungJawab()
    {
        return $this->belongsTo(
            User::class,
            'penanggung_jawab'
        );
    }

    public function departemen()
    {
        return $this->belongsTo(
            Departemen::class,
            'departemen_id'
        );
    }
}