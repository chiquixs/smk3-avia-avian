<?php

namespace App\Filament\Widgets;

use App\Models\PelatihanK3;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class PelatihanByMonthChart extends ChartWidget
{
    protected ?string $heading = 'Tren Pelatihan K3 per Bulan';

    protected function getData(): array
    {
        $labels = [];
        $data = [];

        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);

            $labels[] = $month->format('M Y');

            $data[] = PelatihanK3::whereYear('tanggal_mulai', $month->year)
                ->whereMonth('tanggal_mulai', $month->month)
                ->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pelatihan',
                    'data' => $data,
                    'borderColor' => '#f59e0b',
                    'backgroundColor' => '#f59e0b',
                    'fill' => false,
                    'tension' => 0.3,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}