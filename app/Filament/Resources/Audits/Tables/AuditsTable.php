<?php

namespace App\Filament\Resources\Audits\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AuditsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('judul')
                    ->label('Judul Audit')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jenis_audit')
                    ->label('Jenis')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'internal' => 'info',
                        'eksternal' => 'warning',
                        'sertifikasi' => 'success',
                        default => 'gray',
                    }),

                TextColumn::make('departemen.nama_departemen')
                    ->label('Departemen')
                    ->placeholder('-'),

                TextColumn::make('auditor.name')
                    ->label('Auditor')
                    ->placeholder('-'),

                TextColumn::make('tanggal_mulai')
                    ->label('Mulai')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('tanggal_selesai')
                    ->label('Selesai')
                    ->date('d M Y')
                    ->sortable()
                    ->placeholder('-'),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'planned' => 'gray',
                        'ongoing' => 'warning',
                        'completed' => 'info',
                        'closed' => 'success',
                        default => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([

                SelectFilter::make('jenis_audit')
                    ->label('Jenis Audit')
                    ->options([
                        'internal' => 'Internal',
                        'eksternal' => 'Eksternal',
                        'sertifikasi' => 'Sertifikasi',
                    ]),

                SelectFilter::make('status')
                    ->options([
                        'planned' => 'Planned',
                        'ongoing' => 'Ongoing',
                        'completed' => 'Completed',
                        'closed' => 'Closed',
                    ]),

                SelectFilter::make('departemen_id')
                    ->label('Departemen')
                    ->relationship('departemen', 'nama_departemen'),

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