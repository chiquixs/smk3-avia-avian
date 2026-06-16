<?php

namespace App\Filament\Resources\Departemens\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class DepartemensTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('nama_departemen')
                    ->label('Nama Departemen')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('kode_departemen')
                    ->label('Kode')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('divisi.nama_divisi')
                    ->label('Divisi')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('kepala_departemen_id')
                    ->label('Kepala Departemen')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),

            ])
            ->filters([

                SelectFilter::make('divisi_id')
                    ->relationship('divisi', 'nama_divisi')
                    ->label('Divisi'),

                TernaryFilter::make('is_active')
                    ->label('Status Aktif'),

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