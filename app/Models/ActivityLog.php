<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityLog extends Model
{
    protected $table = 'activity_log';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'aksi',
        'modul',
        'referensi_id',
        'detail',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'detail' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}