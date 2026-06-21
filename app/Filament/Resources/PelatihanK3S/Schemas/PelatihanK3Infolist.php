<?php

namespace App\Filament\Resources\PelatihanK3S\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PelatihanK3Infolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextEntry::make('nama_pelatihan')
                    ->label('Nama Pelatihan')
                    ->columnSpanFull(),

                TextEntry::make('penyelenggara')
                    ->label('Penyelenggara')
                    ->placeholder('-'),

                TextEntry::make('lokasi')
                    ->label('Lokasi')
                    ->placeholder('-'),

                TextEntry::make('tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->date('d M Y'),

                TextEntry::make('tanggal_selesai')
                    ->label('Tanggal Selesai')
                    ->date('d M Y')
                    ->placeholder('-'),

                TextEntry::make('deskripsi')
                    ->label('Deskripsi')
                    ->placeholder('-')
                    ->columnSpanFull(),

                TextEntry::make('materi')
                    ->label('Materi Pelatihan')
                    ->placeholder('-')
                    ->columnSpanFull(),

                TextEntry::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->placeholder('-'),

                TextEntry::make('updated_at')
                    ->label('Diubah')
                    ->dateTime('d M Y H:i')
                    ->placeholder('-'),

            ]);
    }
}