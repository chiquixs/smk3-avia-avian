<?php

namespace App\Filament\Widgets;

use App\Models\LaporanInsiden;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class IncidentByDepartmentChart extends ChartWidget
{
    protected ?string $heading = 'Incident Frequency by Department';

    protected function getData(): array
    {
        $data = LaporanInsiden::query()
            ->join('departemen', 'laporan_insiden.departemen_id', '=', 'departemen.id')
            ->select(
                'departemen.nama_departemen',
                DB::raw('count(*) as total')
            )
            ->groupBy('departemen.nama_departemen')
            ->orderByDesc('total')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Total Incidents',
                    'data' => $data->pluck('total')->toArray(),
                ],
            ],
            'labels' => $data->pluck('nama_departemen')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}