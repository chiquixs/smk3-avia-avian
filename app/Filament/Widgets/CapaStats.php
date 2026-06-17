<?php

namespace App\Filament\Widgets;

use App\Models\Capa;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CapaStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('CAPA Open', Capa::where('status', 'open')->count())
                ->description('Belum ditangani')
                ->color('danger'),

            Stat::make('CAPA In Progress', Capa::where('status', 'in_progress')->count())
                ->description('Sedang proses perbaikan')
                ->color('warning'),

            Stat::make('CAPA Verifikasi', Capa::where('status', 'verifikasi')->count())
                ->description('Menunggu verifikasi')
                ->color('info'),

            Stat::make('CAPA Closed', Capa::where('status', 'closed')->count())
                ->description('Sudah selesai')
                ->color('success'),

            Stat::make(
                'CAPA Overdue',
                Capa::whereIn('status', [
                    'open',
                    'in_progress',
                    'verifikasi',
                ])
                    ->whereNotNull('target_selesai')
                    ->whereDate('target_selesai', '<', Carbon::today())
                    ->count()
            )
                ->description('Melewati batas waktu')
                ->color('danger'),
        ];
    }
}