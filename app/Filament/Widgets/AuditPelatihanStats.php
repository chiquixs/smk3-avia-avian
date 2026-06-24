<?php

namespace App\Filament\Widgets;

use App\Models\Audit;
use App\Models\PelatihanK3;
use App\Models\PesertaPelatihan;
use App\Models\TemuanAudit;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AuditPelatihanStats extends BaseWidget
{
    protected function getStats(): array
    {
        $totalAudit = Audit::count();
        $auditOngoing = Audit::where('status', 'ongoing')->count();
        $temuanOpen = TemuanAudit::where('status_tindak_lanjut', 'open')->count();
        $totalPelatihan = PelatihanK3::count();
        $pesertaHadir = PesertaPelatihan::where('status_kehadiran', 'hadir')->count();

        return [
            Stat::make('Total Audit', $totalAudit)
                ->description($auditOngoing . ' sedang berjalan')
                ->descriptionIcon('heroicon-m-shield-check')
                ->color('info'),

            Stat::make('Temuan Belum Selesai', $temuanOpen)
                ->description($temuanOpen > 0 ? 'Perlu tindak lanjut' : 'Semua temuan selesai')
                ->descriptionIcon($temuanOpen > 0 ? 'heroicon-m-exclamation-triangle' : 'heroicon-m-check-circle')
                ->color($temuanOpen > 0 ? 'danger' : 'success'),

            Stat::make('Total Pelatihan K3', $totalPelatihan)
                ->description('Pelatihan yang telah dijadwalkan')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('warning'),

            Stat::make('Peserta Hadir', $pesertaHadir)
                ->description('Total kehadiran tercatat')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),
        ];
    }
}