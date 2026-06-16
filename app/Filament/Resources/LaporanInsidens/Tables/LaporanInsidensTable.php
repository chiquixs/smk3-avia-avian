<?php

namespace App\Filament\Resources\LaporanInsidens\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LaporanInsidensTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor_laporan')
                    ->searchable(),

                TextColumn::make('judul')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tipe')
                    ->badge(),

                TextColumn::make('tingkat_keparahan')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'ringan' => 'success',
                        'sedang' => 'warning',
                        'berat' => 'danger',
                        'fatal' => 'gray',
                        default => 'gray',
                    }),

                TextColumn::make('lokasi')
                    ->searchable(),

                TextColumn::make('tanggal_kejadian')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'open' => 'danger',
                        'investigating' => 'warning',
                        'capa' => 'info',
                        'closed' => 'success',
                        default => 'gray',
                    }),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'open' => 'Open',
                        'investigating' => 'Investigating',
                        'capa' => 'CAPA',
                        'closed' => 'Closed',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}