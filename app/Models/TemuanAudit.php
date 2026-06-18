<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TemuanAudit extends Model
{
    protected $table = 'temuan_audit';

    protected $fillable = [
        'audit_id',
        'nomor_temuan',
        'tipe',
        'deskripsi_temuan',
        'bukti',
        'rekomendasi',
        'capa_id',
        'status_tindak_lanjut',
    ];

    public function audit(): BelongsTo
    {
        return $this->belongsTo(Audit::class);
    }

    public function capa(): BelongsTo
    {
        return $this->belongsTo(Capa::class);
    }
}