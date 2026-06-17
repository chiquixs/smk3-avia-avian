<?php

namespace App\Filament\Widgets;

use App\Models\PengisianForm;
use App\Models\PenugasanForm;
use App\Models\TemplateForm;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MonitoringOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $bulanIni = now()->startOfMonth();

        // Total pengisian bulan ini
        $totalPengisian = PengisianForm::whereMonth('tanggal_pengisian', now()->month)
            ->whereYear('tanggal_pengisian', now()->year)
            ->count();

        // Rata-rata skor kepatuhan bulan ini
        $rataSkor = PengisianForm::whereMonth('tanggal_pengisian', now()->month)
            ->whereYear('tanggal_pengisian', now()->year)
            ->whereNotNull('skor_kepatuhan')
            ->avg('skor_kepatuhan');

        $rataSkor = $rataSkor ? round($rataSkor, 1) : 0;

        // Penugasan masih pending
        $pendingCount = PenugasanForm::where('status', 'pending')->count();

        // Penugasan overdue
        $overdueCount = PenugasanForm::where('status', 'pending')
            ->where('tanggal_deadline', '<', now())
            ->count();

        // Warna skor
        $skorColor = match(true) {
            $rataSkor >= 85 => 'success',
            $rataSkor >= 70 => 'warning',
            $rataSkor >= 50 => 'danger',
            default         => 'gray',
        };

        // Deskripsi skor
        $skorLabel = match(true) {
            $rataSkor >= 85 => 'Kepatuhan Baik ✅',
            $rataSkor >= 70 => 'Kepatuhan Cukup ⚠️',
            $rataSkor >= 50 => 'Kepatuhan Kurang ❌',
            default         => 'Belum ada data',
        };

        return [
            Stat::make('Checklist Bulan Ini', $totalPengisian)
                ->description('Total pengisian ' . now()->format('F Y'))
                ->descriptionIcon('heroicon-m-clipboard-document-check')
                ->color('info')
                ->chart(
                    PengisianForm::selectRaw('DATE(tanggal_pengisian) as date, COUNT(*) as count')
                        ->whereMonth('tanggal_pengisian', now()->month)
                        ->groupBy('date')
                        ->orderBy('date')
                        ->pluck('count')
                        ->toArray()
                ),

            Stat::make('Rata-rata Skor Kepatuhan', $rataSkor . '%')
                ->description($skorLabel)
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color($skorColor),

            Stat::make('Penugasan Pending', $pendingCount)
                ->description($overdueCount > 0
                    ? $overdueCount . ' sudah melewati deadline!'
                    : 'Semua dalam batas waktu')
                ->descriptionIcon($overdueCount > 0
                    ? 'heroicon-m-exclamation-triangle'
                    : 'heroicon-m-check-circle')
                ->color($overdueCount > 0 ? 'danger' : 'success'),
        ];
    }
}