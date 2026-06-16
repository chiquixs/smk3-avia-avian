<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TemplateForm extends Model
{
    protected $table = 'template_form';

    protected $fillable = [
        'judul',
        'deskripsi',
        'departemen_id',
        'dibuat_oleh',
        'frekuensi',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function departemen(): BelongsTo
    {
        return $this->belongsTo(Departemen::class);
    }

    public function pembuatTemplate(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }

    public function pertanyaan(): HasMany
    {
        return $this->hasMany(PertanyaanForm::class, 'template_id')
                    ->orderBy('urutan');
    }

    public function penugasan(): HasMany
    {
        return $this->hasMany(PenugasanForm::class, 'template_id');
    }

    // Hanya pertanyaan yes_no yang dihitung untuk skor
    public function pertanyaanYesNo(): HasMany
    {
        return $this->hasMany(PertanyaanForm::class, 'template_id')
                    ->where('tipe_field', 'yes_no')
                    ->orderBy('urutan');
    }
}