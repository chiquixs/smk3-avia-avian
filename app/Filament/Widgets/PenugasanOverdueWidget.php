<?php

namespace App\Filament\Widgets;

use App\Models\PenugasanForm;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class PenugasanOverdueWidget extends BaseWidget
{
    protected static ?int $sort = 3;
    protected int|string|array $columnSpan = 'full';

    public function getHeading(): string
    {
        return 'Penugasan Belum Diisi';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                PenugasanForm::query()
                    ->where('status', 'pending')
                    ->orderBy('tanggal_deadline', 'asc')
            )
            ->columns([
                Tables\Columns\TextColumn::make('template.judul')
                    ->label('Template')
                    ->searchable(),

                Tables\Columns\TextColumn::make('departemen.nama_departemen')
                    ->label('Departemen')
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Ditugaskan ke')
                    ->placeholder('Seluruh Departemen'),

                Tables\Columns\TextColumn::make('tanggal_deadline')
                    ->label('Deadline')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('sisa_hari')
                    ->label('Sisa Waktu')
                    ->getStateUsing(fn($record) => now()->diffInDays($record->tanggal_deadline, false))
                    ->formatStateUsing(fn($state) => $state < 0
                        ? abs($state) . ' hari terlambat'
                        : $state . ' hari lagi')
                    ->badge()
                    ->color(fn($state) => $state < 0 ? 'danger' : ($state <= 3 ? 'warning' : 'success')),
            ])
            ->emptyStateHeading('Tidak ada penugasan pending')
            ->emptyStateIcon('heroicon-o-check-circle')
            ->emptyStateDescription('Semua penugasan sudah diisi.');
    }
}