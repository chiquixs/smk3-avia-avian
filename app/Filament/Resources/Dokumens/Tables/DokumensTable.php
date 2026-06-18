<?php

namespace App\Filament\Resources\Dokumens\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class DokumensTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('nomor_dokumen')
                    ->label('Nomor')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('kategori.nama_kategori')
                    ->label('Kategori'),

                TextColumn::make('departemen.nama_departemen')
                    ->label('Departemen'),

                TextColumn::make('versi')
                    ->badge(),

                TextColumn::make('status')
                    ->badge(),

                TextColumn::make('tanggal_review')
                    ->label('Review')
                    ->date('d M Y'),

                TextColumn::make('creator.name')
                    ->label('Dibuat Oleh'),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i'),

            ])

            ->filters([

                SelectFilter::make('kategori_id')
                    ->relationship('kategori', 'nama_kategori')
                    ->label('Kategori'),

                SelectFilter::make('departemen_id')
                    ->relationship('departemen', 'nama_departemen')
                    ->label('Departemen'),

            ])

            ->recordActions([

                ViewAction::make(),

                EditAction::make()
                    ->visible(fn () =>
                        in_array(Auth::user()?->role, [
                            'admin',
                            'k3_manager',
                            'k3_officer',
                        ])
                    ),

            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}