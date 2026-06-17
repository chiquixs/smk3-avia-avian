<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PenugasanForm extends Model
{
    protected $table = 'penugasan_form';

    protected $fillable = [
        'template_id',
        'departemen_id',
        'user_id',
        'tanggal_mulai',
        'tanggal_deadline',
        'status',
    ];

    protected $casts = [
        'tanggal_mulai'    => 'date',
        'tanggal_deadline' => 'date',
    ];

    public function template(): BelongsTo
    {
        return $this->belongsTo(TemplateForm::class, 'template_id');
    }

    public function departemen(): BelongsTo
    {
        return $this->belongsTo(Departemen::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pengisian(): HasMany
    {
        return $this->hasMany(PengisianForm::class, 'penugasan_id');
    }

    // Cek apakah sudah melewati deadline
    public function getIsOverdueAttribute(): bool
    {
        return $this->status === 'pending' 
            && Carbon::now()->isAfter($this->tanggal_deadline);
    }

    // Update status jadi overdue otomatis saat diakses
    public function syncStatus(): void
    {
        if ($this->is_overdue) {
            $this->update(['status' => 'overdue']);
        }
    }
}