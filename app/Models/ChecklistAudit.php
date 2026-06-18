<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChecklistAudit extends Model
{
    protected $table = 'checklist_audit';

    protected $fillable = [
        'audit_id',
        'kriteria',
        'referensi',
        'bukti_dokumen_id',
        'bukti_pengisian_id',
        'hasil',
        'catatan',
    ];

    public function audit(): BelongsTo
    {
        return $this->belongsTo(Audit::class);
    }

    public function buktiDokumen(): BelongsTo
    {
        return $this->belongsTo(Dokumen::class, 'bukti_dokumen_id');
    }

    public function buktiPengisian(): BelongsTo
    {
        return $this->belongsTo(PengisianForm::class, 'bukti_pengisian_id');
    }
}