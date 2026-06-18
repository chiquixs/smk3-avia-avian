<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StandarK3 extends Model
{
    protected $table = 'standar_k3';

    protected $fillable = [
        'kode',
        'nama',
        'versi',
        'badan_standar',
        'deskripsi',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function auditStandar(): HasMany
    {
        return $this->hasMany(AuditStandar::class);
    }
}