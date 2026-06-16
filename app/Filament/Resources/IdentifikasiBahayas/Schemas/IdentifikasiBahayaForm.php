<?php

namespace App\Filament\Resources\IdentifikasiBahayas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class IdentifikasiBahayaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('lokasi')
                    ->required()
                    ->maxLength(255),

                Textarea::make('deskripsi_bahaya')
                    ->required()
                    ->columnSpanFull(),

                Select::make('kategori_bahaya')
                    ->options([
                        'fisik' => 'Fisik',
                        'kimia' => 'Kimia',
                        'biologi' => 'Biologi',
                        'ergonomi' => 'Ergonomi',
                        'psikologi' => 'Psikologi',
                    ])
                    ->required(),

                Select::make('kemungkinan')
                    ->options([
                        1 => '1 - Sangat Jarang',
                        2 => '2 - Jarang',
                        3 => '3 - Sedang',
                        4 => '4 - Sering',
                        5 => '5 - Sangat Sering',
                    ])
                    ->required(),

                Select::make('keparahan')
                    ->options([
                        1 => '1 - Sangat Ringan',
                        2 => '2 - Ringan',
                        3 => '3 - Sedang',
                        4 => '4 - Berat',
                        5 => '5 - Fatal',
                    ])
                    ->required(),

                Textarea::make('tindakan_pengendalian')
                    ->columnSpanFull(),

                Select::make('status')
                    ->options([
                        'open' => 'Open',
                        'mitigated' => 'Mitigated',
                        'closed' => 'Closed',
                    ])
                    ->default('open')
                    ->required(),
            ]);
    }
}