<?php

namespace App\Filament\Resources\Dokumens\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DokumenInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('kategori.nama_kategori')
                    ->label('Kategori'),

                TextEntry::make('departemen.nama_departemen')
                    ->label('Departemen')
                    ->placeholder('-'),
                TextEntry::make('nomor_dokumen'),
                TextEntry::make('judul'),
                TextEntry::make('deskripsi')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('nomor_revisi')
                    ->placeholder('-'),
                TextEntry::make('versi')
                    ->placeholder('-'),
                TextEntry::make('status')
                    ->placeholder('-'),
                TextEntry::make('tanggal_berlaku')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('tanggal_review')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('file_path')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('creator.name')
                    ->label('Dibuat Oleh')
                    ->placeholder('-'),

                TextEntry::make('approver.name')
                    ->label('Disetujui Oleh')
                    ->placeholder('-'),
                TextEntry::make('tanggal_disetujui')
                    ->dateTime()
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
