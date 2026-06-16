<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dokumen extends Model
{
    protected $table = 'dokumen';

    protected $fillable = [
        'kategori_id',
        'departemen_id',
        'nomor_dokumen',
        'judul',
        'deskripsi',
        'nomor_revisi',
        'versi',
        'status',
        'tanggal_berlaku',
        'tanggal_review',
        'file_path',
        'dibuat_oleh',
        'disetujui_oleh',
        'tanggal_disetujui',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriDokumen::class, 'kategori_id');
    }

    public function departemen(): BelongsTo
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }

    public function versi(): HasMany
    {
        return $this->hasMany(DokumenVersi::class, 'dokumen_id');
    }

    public function pembuat(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }

    public function penyetuju(): BelongsTo
    {
        return $this->belongsTo(User::class, 'disetujui_oleh');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'disetujui_oleh');
    }
}