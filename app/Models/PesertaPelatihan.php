<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PesertaPelatihan extends Model
{
    protected $table = 'peserta_pelatihan';

    public $timestamps = false;

    protected $fillable = [
        'pelatihan_id',
        'user_id',
        'status_kehadiran',
        'sertifikat_path',
        'nilai',
    ];

    public function pelatihan(): BelongsTo
    {
        return $this->belongsTo(PelatihanK3::class, 'pelatihan_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}