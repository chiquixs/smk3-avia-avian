<?php

namespace App\Filament\Resources\PengisianForms\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PengisianFormForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('penugasan_id')
                    ->relationship('penugasan', 'id')
                    ->required(),
                Select::make('template_id')
                    ->relationship('template', 'id')
                    ->required(),
                TextInput::make('diisi_oleh')
                    ->numeric(),
                Select::make('departemen_id')
                    ->relationship('departemen', 'id'),
                DateTimePicker::make('tanggal_pengisian'),
                Textarea::make('catatan')
                    ->columnSpanFull(),
                TextInput::make('status')
                    ->default('draft'),
                TextInput::make('skor_kepatuhan')
                    ->numeric(),
            ]);
    }
}
