<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class DokumenVersi extends Model
{
    protected $table = 'dokumen_versi';

    const UPDATED_AT = null;

    protected $fillable = [
        'dokumen_id',
        'nomor_versi',
        'nomor_revisi',
        'file_path',
        'catatan_perubahan',
        'diupload_oleh',
    ];

    protected static function booted(): void
    {
        static::creating(function ($versi) {
            if (empty($versi->diupload_oleh) && Auth::check()) {
                $versi->diupload_oleh = Auth::id();
            }
        });
    }

    public function dokumen(): BelongsTo
    {
        return $this->belongsTo(Dokumen::class);
    }

    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'diupload_oleh');
    }
}