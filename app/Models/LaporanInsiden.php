<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanInsiden extends Model
{
    protected $table = 'laporan_insiden';

    protected $fillable = [
        'nomor_laporan',
        'judul',
        'tipe',
        'tingkat_keparahan',
        'tanggal_kejadian',
        'lokasi',
        'departemen_id',
        'dilaporkan_oleh',
        'deskripsi',
        'penyebab_langsung',
        'penyebab_dasar',
        'tindakan_darurat',
        'korban_jiwa',
        'luka_ringan',
        'luka_berat',
        'kerugian_material',
        'status',
        'diselesaikan_oleh',
        'tanggal_selesai',
    ];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function pelapor()
    {
        return $this->belongsTo(User::class, 'dilaporkan_oleh');
    }
}