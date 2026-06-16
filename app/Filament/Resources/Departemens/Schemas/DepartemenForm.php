<?php

namespace App\Filament\Resources\Departemens\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class DepartemenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([

                Select::make('divisi_id')
                    ->label('Divisi')
                    ->relationship('divisi', 'nama_divisi')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('nama_departemen')
                    ->label('Nama Departemen')
                    ->required()
                    ->maxLength(255),

                TextInput::make('kode_departemen')
                    ->label('Kode Departemen')
                    ->required()
                    ->maxLength(50),

                TextInput::make('kepala_departemen_id')
                    ->label('ID Kepala Departemen')
                    ->numeric(),

                Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->default(true),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->columnSpanFull(),

            ]);
    }
}