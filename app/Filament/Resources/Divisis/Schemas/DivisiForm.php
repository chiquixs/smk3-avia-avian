<?php

namespace App\Filament\Resources\Divisis\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class DivisiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([

                TextInput::make('nama_divisi')
                    ->label('Nama Divisi')
                    ->required()
                    ->maxLength(255),

                TextInput::make('kode')
                    ->label('Kode Divisi')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(20),

                Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->default(true),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->columnSpanFull(),

            ]);
    }
}