<?php

namespace App\Filament\Resources\ActivityLogs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ActivityLogInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextEntry::make('created_at')
                    ->label('Waktu')
                    ->dateTime('d M Y H:i:s'),

                TextEntry::make('user.name')
                    ->label('User')
                    ->placeholder('Sistem'),

                TextEntry::make('aksi')
                    ->label('Aksi')
                    ->badge(),

                TextEntry::make('modul')
                    ->label('Modul')
                    ->badge()
                    ->color('info'),

                TextEntry::make('referensi_id')
                    ->label('ID Referensi')
                    ->numeric()
                    ->placeholder('-'),

                TextEntry::make('ip_address')
                    ->label('IP Address')
                    ->placeholder('-'),

                TextEntry::make('detail')
                    ->label('Detail')
                    ->placeholder('-')
                    ->formatStateUsing(fn ($state) => $state ? json_encode($state, JSON_PRETTY_PRINT) : null)
                    ->columnSpanFull(),

                TextEntry::make('user_agent')
                    ->label('User Agent')
                    ->placeholder('-')
                    ->columnSpanFull(),

            ]);
    }
}