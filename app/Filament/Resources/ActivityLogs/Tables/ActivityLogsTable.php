<?php

namespace App\Filament\Resources\ActivityLogs\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ActivityLogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('created_at')
                    ->label('Waktu')
                    ->dateTime('d M Y H:i:s')
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('User')
                    ->placeholder('Sistem')
                    ->searchable(),

                TextColumn::make('aksi')
                    ->label('Aksi')
                    ->badge()
                    ->color(fn (string $state): string => match (true) {
                        str_contains($state, 'create') || str_contains($state, 'tambah') => 'success',
                        str_contains($state, 'update') || str_contains($state, 'edit') => 'warning',
                        str_contains($state, 'delete') || str_contains($state, 'hapus') => 'danger',
                        default => 'gray',
                    })
                    ->searchable(),

                TextColumn::make('modul')
                    ->label('Modul')
                    ->badge()
                    ->color('info'),

                TextColumn::make('referensi_id')
                    ->label('ID Referensi')
                    ->numeric()
                    ->placeholder('-')
                    ->sortable(),

                TextColumn::make('ip_address')
                    ->label('IP Address')
                    ->placeholder('-')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([

                SelectFilter::make('modul')
                    ->label('Modul')
                    ->options([
                        'dokumen' => 'Dokumen',
                        'form' => 'Form',
                        'insiden' => 'Insiden',
                        'audit' => 'Audit',
                        'user' => 'User',
                        'capa' => 'CAPA',
                        'pelatihan' => 'Pelatihan',
                        'bahaya' => 'Bahaya',
                    ]),

                SelectFilter::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->searchable(),

            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}