<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Capa extends Model
{
    protected $table = 'capa';

    protected $fillable = [
        'source_type',
        'identifikasi_bahaya_id',
        'insiden_id',
        'deskripsi_masalah',
        'tindakan_perbaikan',
        'tindakan_pencegahan',
        'penanggung_jawab',
        'departemen_id',
        'target_selesai',
        'status',
    ];

    // 🔵 RELASI INSIDEN
    public function insiden()
    {
        return $this->belongsTo(LaporanInsiden::class, 'insiden_id');
    }

    // 🔵 RELASI HAZARD
    public function identifikasiBahaya()
    {
        return $this->belongsTo(IdentifikasiBahaya::class, 'identifikasi_bahaya_id');
    }

    // 🏢 RELASI DEPARTEMEN (FIXED EXPLICIT FK)
    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }

    // 👤 PENANGGUNG JAWAB
    public function penanggungJawab()
    {
        return $this->belongsTo(User::class, 'penanggung_jawab');
    }
}