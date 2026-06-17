<?php

namespace App\Filament\Widgets;

use App\Models\PengisianForm;
use Filament\Widgets\ChartWidget;

class SkorKepatuhanChartWidget extends ChartWidget
{
    // ❌ Hapus ini — konflik dengan parent class di v5
    // protected static ?string $heading = '...';
    // protected static ?string $maxHeight = '300px';

    protected static ?int $sort = 2;

    // ✅ Pakai method, bukan property
    public function getHeading(): string
    {
        return 'Skor Kepatuhan per Departemen';
    }

    public function getMaxHeight(): string
    {
        return '300px';
    }

    public ?string $filter = 'bulan_ini';

    protected function getFilters(): ?array
    {
        return [
            'bulan_ini'  => 'Bulan Ini',
            'bulan_lalu' => 'Bulan Lalu',
            'tahun_ini'  => 'Tahun Ini',
        ];
    }

    protected function getData(): array
    {
        $query = PengisianForm::query()
            ->whereNotNull('skor_kepatuhan')
            ->whereNotNull('departemen_id');

        match($this->filter) {
            'bulan_ini'  => $query->whereMonth('tanggal_pengisian', now()->month)
                                  ->whereYear('tanggal_pengisian', now()->year),
            'bulan_lalu' => $query->whereMonth('tanggal_pengisian', now()->subMonth()->month)
                                  ->whereYear('tanggal_pengisian', now()->subMonth()->year),
            'tahun_ini'  => $query->whereYear('tanggal_pengisian', now()->year),
            default      => $query,
        };

        $data = $query->with('departemen')
            ->get()
            ->groupBy('departemen_id')
            ->map(fn($items) => [
                'nama' => $items->first()->departemen?->nama_departemen ?? 'Unknown',
                'skor' => round($items->avg('skor_kepatuhan'), 1),
            ])
            ->values();

        return [
            'datasets' => [
                [
                    'label'           => 'Rata-rata Skor Kepatuhan (%)',
                    'data'            => $data->pluck('skor')->toArray(),
                    'backgroundColor' => $data->map(fn($d) => match(true) {
                        $d['skor'] >= 85 => 'rgba(34, 197, 94, 0.7)',
                        $d['skor'] >= 70 => 'rgba(234, 179, 8, 0.7)',
                        $d['skor'] >= 50 => 'rgba(239, 68, 68, 0.7)',
                        default          => 'rgba(156, 163, 175, 0.7)',
                    })->toArray(),
                    'borderColor'     => $data->map(fn($d) => match(true) {
                        $d['skor'] >= 85 => 'rgb(34, 197, 94)',
                        $d['skor'] >= 70 => 'rgb(234, 179, 8)',
                        $d['skor'] >= 50 => 'rgb(239, 68, 68)',
                        default          => 'rgb(156, 163, 175)',
                    })->toArray(),
                    'borderWidth'  => 2,
                    'borderRadius' => 6,
                ],
            ],
            'labels' => $data->pluck('nama')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}