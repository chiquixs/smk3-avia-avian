<?php

namespace App\Filament\Resources\TemplateForms\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TemplateFormForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                Select::make('departemen_id')
                    ->relationship('departemen', 'id'),
                TextInput::make('dibuat_oleh')
                    ->numeric(),
                TextInput::make('frekuensi'),
                Toggle::make('is_active'),
            ]);
    }
}
