<?php

namespace App\Filament\Resources\Audits\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AuditInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextEntry::make('judul')
                    ->label('Judul Audit')
                    ->columnSpanFull(),

                TextEntry::make('jenis_audit')
                    ->label('Jenis Audit')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'internal' => 'info',
                        'eksternal' => 'warning',
                        'sertifikasi' => 'success',
                        default => 'gray',
                    }),

                TextEntry::make('frekuensi_audit')
                    ->label('Frekuensi Audit')
                    ->placeholder('-'),

                TextEntry::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'planned' => 'gray',
                        'ongoing' => 'warning',
                        'completed' => 'info',
                        'closed' => 'success',
                        default => 'gray',
                    }),

                TextEntry::make('departemen.nama_departemen')
                    ->label('Departemen')
                    ->placeholder('-'),

                TextEntry::make('auditor.name')
                    ->label('Auditor (User Internal)')
                    ->placeholder('-'),

                TextEntry::make('auditor_eksternal')
                    ->label('Auditor (Eksternal)')
                    ->placeholder('-'),

                TextEntry::make('tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->date('d M Y'),

                TextEntry::make('tanggal_selesai')
                    ->label('Tanggal Selesai')
                    ->date('d M Y')
                    ->placeholder('-'),

                TextEntry::make('lingkup')
                    ->label('Lingkup Audit')
                    ->placeholder('-')
                    ->columnSpanFull(),

                TextEntry::make('kesimpulan')
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