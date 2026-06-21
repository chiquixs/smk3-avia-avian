<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Audit extends Model
{
    protected $table = 'audit';

    protected $fillable = [
        'judul',
        'jenis_audit',
        'frekuensi_audit',
        'tanggal_mulai',
        'tanggal_selesai',
        'auditor_eksternal',
        'auditor_id',
        'departemen_id',
        'lingkup',
        'status',
        'kesimpulan',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function auditor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'auditor_id');
    }

    public function departemen(): BelongsTo
    {
        return $this->belongsTo(Departemen::class);
    }

    public function standar(): HasMany
    {
        return $this->hasMany(AuditStandar::class);
    }

    public function checklist(): HasMany
    {
        return $this->hasMany(ChecklistAudit::class);
    }

    public function temuan(): HasMany
    {
        return $this->hasMany(TemuanAudit::class);
    }
}