<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuditStandar extends Model
{
    protected $table = 'audit_standar';

    public $timestamps = false;

    protected $fillable = [
        'audit_id',
        'standar_id',
    ];

    public function audit(): BelongsTo
    {
        return $this->belongsTo(Audit::class);
    }

    public function standar(): BelongsTo
    {
        return $this->belongsTo(StandarK3::class, 'standar_id');
    }
}