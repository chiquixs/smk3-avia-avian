<?php

namespace App\Providers;

use App\Models\Audit;
use App\Models\Capa;
use App\Models\ChecklistAudit;
use App\Models\Dokumen;
use App\Models\DokumenVersi;
use App\Models\IdentifikasiBahaya;
use App\Models\LaporanInsiden;
use App\Models\PelatihanK3;
use App\Models\PengisianForm;
use App\Models\PenugasanForm;
use App\Models\PesertaPelatihan;
use App\Models\TemplateForm;
use App\Models\TemuanAudit;
use App\Models\User;
use App\Observers\ActivityLogObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Dokumen::observe(ActivityLogObserver::class);
        DokumenVersi::observe(ActivityLogObserver::class);
        TemplateForm::observe(ActivityLogObserver::class);
        PenugasanForm::observe(ActivityLogObserver::class);
        PengisianForm::observe(ActivityLogObserver::class);
        LaporanInsiden::observe(ActivityLogObserver::class);
        Audit::observe(ActivityLogObserver::class);
        ChecklistAudit::observe(ActivityLogObserver::class);
        TemuanAudit::observe(ActivityLogObserver::class);
        User::observe(ActivityLogObserver::class);
        Capa::observe(ActivityLogObserver::class);
        PelatihanK3::observe(ActivityLogObserver::class);
        PesertaPelatihan::observe(ActivityLogObserver::class);
        IdentifikasiBahaya::observe(ActivityLogObserver::class);
    }
}