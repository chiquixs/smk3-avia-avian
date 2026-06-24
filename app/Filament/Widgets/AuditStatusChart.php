<?php

namespace App\Filament\Widgets;

use App\Models\Audit;
use Filament\Widgets\ChartWidget;

class AuditStatusChart extends ChartWidget
{
    protected ?string $heading = 'Distribusi Status Audit';

    protected function getData(): array
    {
        $data = Audit::query()
            ->selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->get();

        $labelMap = [
            'planned' => 'Planned',
            'ongoing' => 'Ongoing',
            'completed' => 'Completed',
            'closed' => 'Closed',
        ];

        $colorMap = [
            'planned' => '#9ca3af',
            'ongoing' => '#f59e0b',
            'completed' => '#3b82f6',
            'closed' => '#10b981',
        ];

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Audit',
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => $data->pluck('status')->map(fn ($s) => $colorMap[$s] ?? '#9ca3af')->toArray(),
                ],
            ],
            'labels' => $data->pluck('status')->map(fn ($s) => $labelMap[$s] ?? $s)->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}