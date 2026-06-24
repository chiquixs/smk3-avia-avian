<?php

namespace App\Observers;

use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ActivityLogObserver
{
    protected array $modulMap = [
        \App\Models\Dokumen::class => 'dokumen',
        \App\Models\DokumenVersi::class => 'dokumen',
        \App\Models\TemplateForm::class => 'form',
        \App\Models\PenugasanForm::class => 'form',
        \App\Models\PengisianForm::class => 'form',
        \App\Models\LaporanInsiden::class => 'insiden',
        \App\Models\Audit::class => 'audit',
        \App\Models\ChecklistAudit::class => 'audit',
        \App\Models\TemuanAudit::class => 'audit',
        \App\Models\User::class => 'user',
        \App\Models\Capa::class => 'capa',
        \App\Models\PelatihanK3::class => 'pelatihan',
        \App\Models\PesertaPelatihan::class => 'pelatihan',
        \App\Models\IdentifikasiBahaya::class => 'bahaya',
    ];

    public function created(Model $model): void
    {
        $this->log('create', $model);
    }

    public function updated(Model $model): void
    {
        $this->log('update', $model);
    }

    public function deleted(Model $model): void
    {
        $this->log('delete', $model);
    }

    protected function log(string $aksi, Model $model): void
    {
        $modul = $this->modulMap[get_class($model)] ?? null;

        if (! $modul) {
            return;
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'aksi' => $aksi,
            'modul' => $modul,
            'referensi_id' => $model->getKey(),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}