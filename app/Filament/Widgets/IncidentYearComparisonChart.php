<?php

namespace App\Filament\Widgets;

use App\Models\LaporanInsiden;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class IncidentYearComparisonChart extends ChartWidget
{
    protected ?string $heading = 'Year-over-Year Incident Comparison';

    protected ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $currentYear = now()->year;
        $previousYear = $currentYear - 1;

        $labels = [];
        $currentYearData = [];
        $previousYearData = [];

        for ($month = 1; $month <= 12; $month++) {
            $labels[] = Carbon::create()->month($month)->format('M');

            $currentYearData[] = LaporanInsiden::query()
                ->whereYear('tanggal_kejadian', $currentYear)
                ->whereMonth('tanggal_kejadian', $month)
                ->count();

            $previousYearData[] = LaporanInsiden::query()
                ->whereYear('tanggal_kejadian', $previousYear)
                ->whereMonth('tanggal_kejadian', $month)
                ->count();
        }

        return [
            'datasets' => [
                [
                    'label' => (string) $previousYear,
                    'data' => $previousYearData,
                    'borderColor' => '#f59e0b',
                    'backgroundColor' => '#f59e0b',
                    'fill' => false,
                    'tension' => 0.3,
                ],
                [
                    'label' => (string) $currentYear,
                    'data' => $currentYearData,
                    'borderColor' => '#10b981',
                    'backgroundColor' => '#10b981',
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