<?php

namespace App\Filament\Resources\KategoriDokumens\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class KategoriDokumenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([

                TextInput::make('nama_kategori')
                    ->label('Nama Kategori')
                    ->required()
                    ->maxLength(255),

                TextInput::make('kode')
                    ->label('Kode Kategori')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(50),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->columnSpanFull(),

            ]);
    }
}