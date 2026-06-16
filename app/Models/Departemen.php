<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departemen extends Model
{
    protected $table = 'departemen';

    protected $fillable = [
        'divisi_id',
        'nama_departemen',
        'kode_departemen',
        'kepala_departemen_id',
        'deskripsi',
        'is_active',
    ];

    public function divisi(): BelongsTo
    {
        return $this->belongsTo(Divisi::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}