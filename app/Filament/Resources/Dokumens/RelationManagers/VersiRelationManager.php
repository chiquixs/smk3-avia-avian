<?php

namespace App\Filament\Resources\Dokumens\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VersiRelationManager extends RelationManager
{
    protected static string $relationship = 'versi';

    protected static ?string $title = 'Versi Dokumen';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('nomor_versi')
                    ->label('Nomor Versi')
                    ->required(),

                TextInput::make('nomor_revisi')
                    ->label('Nomor Revisi'),

                FileUpload::make('file_path')
                    ->label('File PDF')
                    ->acceptedFileTypes([
                        'application/pdf',
                    ])
                    ->directory('dokumen-versi')
                    ->required(),

                Textarea::make('catatan_perubahan')
                    ->label('Catatan Perubahan')
                    ->columnSpanFull(),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nomor_versi')

            ->columns([

                TextColumn::make('nomor_versi')
                    ->label('Versi')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('nomor_revisi')
                    ->label('Revisi'),

                TextColumn::make('catatan_perubahan')
                    ->label('Perubahan')
                    ->limit(50),

                TextColumn::make('uploader.name')
                    ->label('Uploader'),

                TextColumn::make('created_at')
                    ->label('Tanggal Upload')
                    ->dateTime('d M Y H:i'),

            ])

            ->filters([])

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