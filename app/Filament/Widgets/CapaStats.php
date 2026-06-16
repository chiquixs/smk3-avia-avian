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
            // OPEN CAPA
            Stat::make('CAPA Open', Capa::where('status', 'open')->count())
                ->description('Belum ditangani')
                ->color('danger'),

            // IN PROGRESS
            Stat::make('CAPA In Progress', Capa::where('status', 'in_progress')->count())
                ->description('Sedang proses perbaikan')
                ->color('warning'),

            // CLOSED
            Stat::make('CAPA Closed', Capa::where('status', 'closed')->count())
                ->description('Sudah selesai')
                ->color('success'),

            // OVERDUE
            Stat::make(
                'CAPA Overdue',
                Capa::whereIn('status', ['open', 'in_progress'])
                    ->whereNotNull('target_selesai')
                    ->whereDate('target_selesai', '<', Carbon::today())
                    ->count()
            )
                ->description('Melewati batas waktu')
                ->color('danger'),
        ];
    }
}