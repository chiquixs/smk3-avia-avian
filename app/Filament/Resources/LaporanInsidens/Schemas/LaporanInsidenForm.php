<?php

namespace App\Filament\Resources\LaporanInsidens\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LaporanInsidenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nomor_laporan')
                    ->required()
                    ->maxLength(255),

                TextInput::make('judul')
                    ->required()
                    ->maxLength(255),

                Select::make('tipe')
                    ->options([
                        'kecelakaan' => 'Kecelakaan',
                        'near_miss' => 'Near Miss',
                        'penyakit_kerja' => 'Penyakit Kerja',
                        'kebakaran' => 'Kebakaran',
                        'lainnya' => 'Lainnya',
                    ])
                    ->required(),

                Select::make('tingkat_keparahan')
                    ->options([
                        'ringan' => 'Ringan',
                        'sedang' => 'Sedang',
                        'berat' => 'Berat',
                        'fatal' => 'Fatal',
                    ]),

                DateTimePicker::make('tanggal_kejadian')
                    ->required(),

                TextInput::make('lokasi')
                    ->maxLength(255),

                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('penyebab_langsung')
                    ->columnSpanFull(),

                Textarea::make('penyebab_dasar')
                    ->columnSpanFull(),

                Textarea::make('tindakan_darurat')
                    ->columnSpanFull(),

                TextInput::make('korban_jiwa')
                    ->numeric()
                    ->default(0),

                TextInput::make('luka_ringan')
                    ->numeric()
                    ->default(0),

                TextInput::make('luka_berat')
                    ->numeric()
                    ->default(0),

                TextInput::make('kerugian_material')
                    ->numeric(),

                Select::make('status')
                    ->options([
                        'open' => 'Open',
                        'investigating' => 'Investigating',
                        'capa' => 'CAPA',
                        'closed' => 'Closed',
                    ])
                    ->default('open')
                    ->required(),
            ]);
    }
}