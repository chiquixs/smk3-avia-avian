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

                // 🔥 FILE PREVIEW + DOWNLOAD (FIX FINAL)
                TextEntry::make('file_path')
                    ->label('Dokumen')
                    ->placeholder('-')
                    ->formatStateUsing(function ($state) {

                        if (!$state) return '-';

                        // penting: ubah path jadi aman untuk URL
                        $file = str_replace('/', '|', $state);

                        $previewUrl = route('dokumen.view', $file);
                        $downloadUrl = route('dokumen.download', $file);

                        return '
                            <div style="display:flex; flex-direction:column; gap:10px;">

                                <div style="display:flex; gap:10px;">
                                    <a href="'.$previewUrl.'" target="_blank" style="color:blue;">
                                        👁 Preview
                                    </a>
                                    |
                                    <a href="'.$downloadUrl.'" style="color:green;">
                                        ⬇ Download
                                    </a>
                                </div>

                                <iframe
                                    src="'.$previewUrl.'"
                                    width="100%"
                                    height="500px"
                                    style="border:1px solid #ddd; border-radius:8px;">
                                </iframe>

                            </div>
                        ';
                    })
                    ->html()
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