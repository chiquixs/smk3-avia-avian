<?php

namespace App\Filament\Resources\Capas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CapaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextEntry::make('nomor_capa'),

                TextEntry::make('sumber')
                    ->badge(),

                TextEntry::make('status')
                    ->badge(),

                TextEntry::make('penanggungJawab.name')
                    ->label('Penanggung Jawab'),

                TextEntry::make('departemen.nama_departemen')
                    ->label('Departemen'),

                TextEntry::make('laporanInsiden.nomor_laporan')
                    ->label('Laporan Insiden'),

                TextEntry::make('identifikasiBahaya.deskripsi_bahaya')
                    ->label('Bahaya Terkait'),

                TextEntry::make('deskripsi_masalah')
                    ->columnSpanFull(),

                TextEntry::make('tindakan_perbaikan')
                    ->columnSpanFull(),

                TextEntry::make('tindakan_pencegahan')
                    ->columnSpanFull(),

                TextEntry::make('target_selesai')
                    ->date(),

                TextEntry::make('tanggal_selesai')
                    ->date(),

                TextEntry::make('efektivitas')
                    ->columnSpanFull(),
            ]);
    }
}