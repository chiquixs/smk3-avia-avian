<?php

namespace App\Filament\Resources\Capas\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;

class CapasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('nomor_capa')
                    ->label('Nomor CAPA')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('sumber')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'insiden' => 'danger',
                        'bahaya' => 'warning',
                        'audit' => 'info',
                        'inspeksi' => 'success',
                        default => 'gray',
                    }),

                TextColumn::make('deskripsi_masalah')
                    ->limit(50)
                    ->searchable(),

                TextColumn::make('target_selesai')
                    ->date()
                    ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'open' => 'danger',
                        'in_progress' => 'warning',
                        'verifikasi' => 'info',
                        'closed' => 'success',
                        default => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Dibuat')
                    ->toggleable(isToggledHiddenByDefault: true),
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