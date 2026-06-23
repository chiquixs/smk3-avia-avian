<?php

namespace App\Filament\Resources\PelatihanK3S\RelationManagers;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class PesertaRelationManager extends RelationManager
{
    protected static string $relationship = 'peserta';

    protected static ?string $title = 'Peserta Pelatihan';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('user_id')
                    ->label('Karyawan')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('status_kehadiran')
                    ->label('Status Kehadiran')
                    ->options([
                        'terdaftar' => 'Terdaftar',
                        'hadir' => 'Hadir',
                        'tidak_hadir' => 'Tidak Hadir',
                    ])
                    ->default('terdaftar')
                    ->required(),

                TextInput::make('nilai')
                    ->label('Nilai')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),

                FileUpload::make('sertifikat_path')
                    ->label('Sertifikat')
                    ->acceptedFileTypes(['application/pdf'])
                    ->disk('supabase')
                    ->directory('sertifikat-pelatihan'),

            ])
            ->columns(2);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('user.name')

            ->columns([

                TextColumn::make('user.name')
                    ->label('Nama Karyawan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('user.departemen.nama_departemen')
                    ->label('Departemen')
                    ->placeholder('-'),

                TextColumn::make('status_kehadiran')
                    ->label('Status Kehadiran')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'terdaftar' => 'gray',
                        'hadir' => 'success',
                        'tidak_hadir' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('nilai')
                    ->label('Nilai')
                    ->numeric()
                    ->placeholder('-')
                    ->sortable(),

                TextColumn::make('sertifikat_path')
                    ->label('Sertifikat')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state ? 'Tersedia' : 'Belum Ada')
                    ->color(fn ($state) => $state ? 'success' : 'gray'),

            ])

            ->filters([

                SelectFilter::make('status_kehadiran')
                    ->label('Status Kehadiran')
                    ->options([
                        'terdaftar' => 'Terdaftar',
                        'hadir' => 'Hadir',
                        'tidak_hadir' => 'Tidak Hadir',
                    ]),

            ])

            ->headerActions([
                CreateAction::make(),
            ])

            ->recordActions([

                Action::make('lihat_sertifikat')
                    ->label('Lihat')
                    ->icon('heroicon-o-document-text')
                    ->color('info')
                    ->visible(fn ($record) => filled($record->sertifikat_path))
                    ->url(fn ($record) => env('SUPABASE_PUBLIC_URL') . '/' . $record->sertifikat_path)
                    ->openUrlInNewTab(),

                Action::make('download_sertifikat')
                    ->label('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->visible(fn ($record) => filled($record->sertifikat_path))
                    ->url(fn ($record) => env('SUPABASE_PUBLIC_URL') . '/' . $record->sertifikat_path)
                    ->openUrlInNewTab(),

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