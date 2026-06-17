<?php

namespace App\Filament\Resources\PenugasanForms\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PenugasanFormForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('template_id')
                    ->relationship('template', 'id')
                    ->required(),
                Select::make('departemen_id')
                    ->relationship('departemen', 'id'),
                Select::make('user_id')
                    ->relationship('user', 'name'),
                DatePicker::make('tanggal_mulai')
                    ->required(),
                DatePicker::make('tanggal_deadline')
                    ->required(),
                TextInput::make('status')
                    ->default('pending'),
                TextInput::make('judul_penugasan'),
            ]);
    }
}
