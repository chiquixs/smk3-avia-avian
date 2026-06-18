<?php

namespace App\Filament\Widgets;

use App\Models\LaporanInsiden;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class IncidentByMonthChart extends ChartWidget
{
    protected ?string $heading = 'Incident Frequency by Month';

    protected function getData(): array
    {
        $labels = [];
        $data = [];

        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);

            $labels[] = $month->format('M Y');

            $data[] = LaporanInsiden::whereYear(
                'tanggal_kejadian',
                $month->year
            )
                ->whereMonth(
                    'tanggal_kejadian',
                    $month->month
                )
                ->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Incidents',
                    'data' => $data,

                    'fill' => true,
                    'tension' => 0.4,
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