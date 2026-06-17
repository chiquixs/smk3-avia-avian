<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JawabanForm extends Model
{
    protected $table = 'jawaban_form';

    // Tidak ada updated_at di tabel ini
    public $timestamps = false;

    protected $fillable = [
        'pengisian_id',
        'pertanyaan_id',
        'jawaban',
        'catatan',
        'file_path',
    ];

    public function pengisian(): BelongsTo
    {
        return $this->belongsTo(PengisianForm::class, 'pengisian_id');
    }

    public function pertanyaan(): BelongsTo
    {
        return $this->belongsTo(PertanyaanForm::class, 'pertanyaan_id');
    }
}