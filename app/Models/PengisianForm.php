<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PengisianForm extends Model
{
    protected $table = 'pengisian_form';

    protected $fillable = [
        'penugasan_id',
        'template_id',
        'diisi_oleh',
        'departemen_id',
        'tanggal_pengisian',
        'catatan',
        'status',
        'skor_kepatuhan',
    ];

    protected $casts = [
        'tanggal_pengisian' => 'datetime',
        'skor_kepatuhan'    => 'float',
    ];

    public function penugasan(): BelongsTo
    {
        return $this->belongsTo(PenugasanForm::class, 'penugasan_id');
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(TemplateForm::class, 'template_id');
    }

    public function pengisi(): BelongsTo
    {
        return $this->belongsTo(User::class, 'diisi_oleh');
    }

    public function departemen(): BelongsTo
    {
        return $this->belongsTo(Departemen::class);
    }

    public function jawaban(): HasMany
    {
        return $this->hasMany(JawabanForm::class, 'pengisian_id');
    }

    // Hitung skor kepatuhan: Ya / total yes_no × 100
    public function hitungSkor(): float
    {
        $jawabanYesNo = $this->jawaban()
            ->whereHas('pertanyaan', fn($q) => $q->where('tipe_field', 'yes_no'))
            ->get();

        // Abaikan jawaban yang tidak diisi (null)
        $total = $jawabanYesNo->whereNotNull('jawaban')->count();

        if ($total === 0) return 0;

        $jumlahYa = $jawabanYesNo->where('jawaban', 'ya')->count();

        return round(($jumlahYa / $total) * 100, 2);
    }

    // Label warna skor untuk UI
    public function getLabelSkorAttribute(): string
    {
        $skor = $this->skor_kepatuhan ?? 0;

        return match(true) {
            $skor >= 85 => 'Baik',
            $skor >= 70 => 'Cukup',
            $skor >= 50 => 'Kurang',
            default     => 'Tidak Patuh',
        };
    }

    // Warna badge untuk Filament
    public function getWarnaSkorAttribute(): string
    {
        $skor = $this->skor_kepatuhan ?? 0;

        return match(true) {
            $skor >= 85 => 'success',
            $skor >= 70 => 'warning',
            $skor >= 50 => 'danger',
            default     => 'gray',
        };
    }
}