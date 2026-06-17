<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Departemen;
use App\Models\User;
use App\Models\Capa;

class IdentifikasiBahaya extends Model
{
    protected $table = 'identifikasi_bahaya';

    protected $fillable = [
        'lokasi',
        'departemen_id',
        'deskripsi_bahaya',
        'kategori_bahaya',
        'kemungkinan',
        'keparahan',
        'tindakan_pengendalian',
        'status',
        'dilaporkan_oleh',
    ];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function pelapor()
    {
        return $this->belongsTo(User::class, 'dilaporkan_oleh');
    }

    public function capas()
    {
        return $this->hasMany(Capa::class, 'identifikasi_bahaya_id');
    }
}