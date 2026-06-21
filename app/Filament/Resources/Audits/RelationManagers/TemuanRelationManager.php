<?php

namespace App\Filament\Resources\Audits\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TemuanRelationManager extends RelationManager
{
    protected static string $relationship = 'temuan';

    protected static ?string $title = 'Temuan Audit';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('nomor_temuan')
                    ->label('Nomor Temuan')
                    ->maxLength(255)
                    ->helperText('Contoh: TEMU-2026-001'),

                Select::make('tipe')
                    ->label('Tipe Temuan')
                    ->options([
                        'conform' => 'Conform',
                        'minor_nc' => 'Minor NC',
                        'major_nc' => 'Major NC',
                        'observation' => 'Observation',
                    ])
                    ->required(),

                Select::make('status_tindak_lanjut')
                    ->label('Status Tindak Lanjut')
                    ->options([
                        'open' => 'Open',
                        'in_progress' => 'In Progress',
                        'closed' => 'Closed',
                    ])
                    ->default('open')
                    ->required(),

                Textarea::make('deskripsi_temuan')
                    ->label('Deskripsi Temuan')
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('bukti')
                    ->label('Bukti')
                    ->columnSpanFull(),

                Textarea::make('rekomendasi')
                    ->label('Rekomendasi')
                    ->columnSpanFull(),

                Select::make('capa_id')
                    ->label('CAPA Terkait')
                    ->relationship('capa', 'nomor_capa')
                    ->searchable()
                    ->preload()
                    ->helperText('Hubungkan ke CAPA jika sudah ada tindak lanjut perbaikan'),

            ])
            ->columns(2);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nomor_temuan')

            ->columns([

                TextColumn::make('nomor_temuan')
                    ->label('Nomor')
                    ->placeholder('-')
                    ->searchable(),

                TextColumn::make('tipe')
                    ->label('Tipe')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'conform' => 'success',
                        'minor_nc' => 'warning',
                        'major_nc' => 'danger',
                        'observation' => 'info',
                        default => 'gray',
                    }),

                TextColumn::make('deskripsi_temuan')
                    ->label('Deskripsi')
                    ->limit(40)
                    ->wrap(),

                TextColumn::make('capa.nomor_capa')
                    ->label('CAPA')
                    ->placeholder('-'),

                TextColumn::make('status_tindak_lanjut')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'open' => 'danger',
                        'in_progress' => 'warning',
                        'closed' => 'success',
                        default => 'gray',
                    }),

            ])

            ->filters([

                SelectFilter::make('tipe')
                    ->options([
                        'conform' => 'Conform',
                        'minor_nc' => 'Minor NC',
                        'major_nc' => 'Major NC',
                        'observation' => 'Observation',
                    ]),

                SelectFilter::make('status_tindak_lanjut')
                    ->label('Status')
                    ->options([
                        'open' => 'Open',
                        'in_progress' => 'In Progress',
                        'closed' => 'Closed',
                    ]),

            ])

            ->headerActions([
                CreateAction::make(),
            ])

            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}