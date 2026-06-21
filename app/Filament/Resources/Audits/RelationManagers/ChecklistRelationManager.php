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

class ChecklistRelationManager extends RelationManager
{
    protected static string $relationship = 'checklist';

    protected static ?string $title = 'Checklist Audit';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('kriteria')
                    ->label('Kriteria')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('referensi')
                    ->label('Referensi')
                    ->maxLength(255)
                    ->helperText('Contoh: ISO 45001 Klausul 8.1.1'),

                Select::make('hasil')
                    ->label('Hasil')
                    ->options([
                        'conform' => 'Conform',
                        'minor_nc' => 'Minor NC',
                        'major_nc' => 'Major NC',
                        'observation' => 'Observation',
                    ]),

                Select::make('bukti_dokumen_id')
                    ->label('Bukti Dokumen')
                    ->relationship('buktiDokumen', 'judul')
                    ->searchable()
                    ->preload(),

                Select::make('bukti_pengisian_id')
                    ->label('Bukti Pengisian Form')
                    ->relationship('buktiPengisian', 'id')
                    ->searchable()
                    ->preload(),

                Textarea::make('catatan')
                    ->label('Catatan')
                    ->columnSpanFull(),

            ])
            ->columns(2);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('kriteria')

            ->columns([

                TextColumn::make('kriteria')
                    ->label('Kriteria')
                    ->wrap()
                    ->searchable(),

                TextColumn::make('referensi')
                    ->label('Referensi')
                    ->placeholder('-'),

                TextColumn::make('hasil')
                    ->label('Hasil')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'conform' => 'success',
                        'minor_nc' => 'warning',
                        'major_nc' => 'danger',
                        'observation' => 'info',
                        default => 'gray',
                    })
                    ->placeholder('-'),

                TextColumn::make('catatan')
                    ->label('Catatan')
                    ->limit(40)
                    ->placeholder('-'),

            ])

            ->filters([

                SelectFilter::make('hasil')
                    ->options([
                        'conform' => 'Conform',
                        'minor_nc' => 'Minor NC',
                        'major_nc' => 'Major NC',
                        'observation' => 'Observation',
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