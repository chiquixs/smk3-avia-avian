<?php

namespace App\Filament\Widgets;

use App\Models\TemuanAudit;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TemuanOpenWidget extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    public function getHeading(): string
    {
        return 'Temuan Audit Belum Selesai';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                TemuanAudit::query()
                    ->where('status_tindak_lanjut', '!=', 'closed')
                    ->orderBy('created_at', 'desc')
            )
            ->columns([
                Tables\Columns\TextColumn::make('nomor_temuan')
                    ->label('Nomor')
                    ->placeholder('-'),

                Tables\Columns\TextColumn::make('audit.judul')
                    ->label('Audit')
                    ->limit(30),

                Tables\Columns\TextColumn::make('tipe')
                    ->label('Tipe')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'conform' => 'success',
                        'minor_nc' => 'warning',
                        'major_nc' => 'danger',
                        'observation' => 'info',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('status_tindak_lanjut')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'open' => 'danger',
                        'in_progress' => 'warning',
                        default => 'gray',
                    }),
            ])
            ->emptyStateHeading('Tidak ada temuan terbuka')
            ->emptyStateIcon('heroicon-o-check-circle')
            ->emptyStateDescription('Semua temuan sudah ditindaklanjuti.');
    }
}