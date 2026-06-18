<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PelatihanK3 extends Model
{
    protected $table = 'pelatihan_k3';

    protected $fillable = [
        'nama_pelatihan',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'penyelenggara',
        'lokasi',
        'materi',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function peserta(): HasMany
    {
        return $this->hasMany(PesertaPelatihan::class, 'pelatihan_id');
    }
}