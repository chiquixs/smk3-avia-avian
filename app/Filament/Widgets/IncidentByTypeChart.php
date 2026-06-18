<?php

namespace App\Filament\Widgets;

use App\Models\LaporanInsiden;
use Filament\Widgets\ChartWidget;

class IncidentByTypeChart extends ChartWidget
{
    protected ?string $heading = 'Incident Frequency by Type';

    protected function getData(): array
    {
        $data = LaporanInsiden::query()
            ->selectRaw('tipe, COUNT(*) as total')
            ->groupBy('tipe')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Insiden',
                    'data' => $data->pluck('total')->toArray(),
                ],
            ],

            'labels' => $data->pluck('tipe')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}