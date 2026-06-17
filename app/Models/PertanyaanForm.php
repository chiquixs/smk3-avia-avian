<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PertanyaanForm extends Model
{
    protected $table = 'pertanyaan_form';

    protected $fillable = [
        'template_id',
        'urutan',
        'label',
        'tipe_field',
        'opsi_jawaban',
        'is_required',
    ];

    protected $casts = [
        'opsi_jawaban' => 'array',
        'is_required'  => 'boolean',
    ];

    // Label tipe field untuk ditampilkan di UI
    public const TIPE_OPTIONS = [
        'yes_no'    => 'Ya / Tidak',
        'text'      => 'Teks Bebas',
        'number'    => 'Angka',
        'checklist' => 'Checklist',
        'dropdown'  => 'Dropdown',
        'date'      => 'Tanggal',
        'photo'     => 'Foto',
        'rating'    => 'Rating (1-5)',
    ];

    public function template(): BelongsTo
    {
        return $this->belongsTo(TemplateForm::class, 'template_id');
    }

    public function jawaban(): HasMany
    {
        return $this->hasMany(JawabanForm::class, 'pertanyaan_id');
    }
}