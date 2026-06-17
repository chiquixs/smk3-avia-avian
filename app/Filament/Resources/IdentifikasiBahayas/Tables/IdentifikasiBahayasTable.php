<?php

namespace App\Filament\Resources\IdentifikasiBahayas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class IdentifikasiBahayasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('lokasi')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('kategori_bahaya')
                    ->badge(),

                TextColumn::make('kemungkinan')
                    ->sortable(),

                TextColumn::make('keparahan')
                    ->sortable(),

                TextColumn::make('tingkat_risiko')
                    ->label('Tingkat Risiko')
                    ->badge()
                    ->color(fn ($state) => match (true) {
                        $state >= 16 => 'danger',
                        $state >= 10 => 'warning',
                        $state >= 5 => 'info',
                        default => 'success',
                    }),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'open' => 'danger',
                        'mitigated' => 'warning',
                        'closed' => 'success',
                        default => 'gray',
                    }),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'open' => 'Open',
                        'mitigated' => 'Mitigated',
                        'closed' => 'Closed',
                    ]),

                SelectFilter::make('kategori_bahaya')
                    ->options([
                        'fisik' => 'Fisik',
                        'kimia' => 'Kimia',
                        'biologi' => 'Biologi',
                        'ergonomi' => 'Ergonomi',
                        'psikologi' => 'Psikologi',
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