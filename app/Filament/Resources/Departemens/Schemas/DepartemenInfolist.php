<?php

namespace App\Filament\Resources\Departemens\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DepartemenInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('divisi.id')
                    ->label('Divisi')
                    ->placeholder('-'),
                TextEntry::make('nama_departemen'),
                TextEntry::make('kode_departemen')
                    ->placeholder('-'),
                TextEntry::make('kepala_departemen_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('deskripsi')
                    ->placeholder('-')
                    ->columnSpanFull(),
                IconEntry::make('is_active')
                    ->boolean()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
