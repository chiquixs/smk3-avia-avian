<?php

namespace App\Filament\Resources\Capas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;

class CapaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('nomor_capa')
                    ->required()
                    ->maxLength(50)
                    ->unique(),

                Select::make('sumber')
                    ->options([
                        'insiden' => 'Insiden',
                        'bahaya' => 'Bahaya',
                        'audit' => 'Audit',
                        'inspeksi' => 'Inspeksi',
                        'lainnya' => 'Lainnya',
                    ])
                    ->required(),

                Textarea::make('deskripsi_masalah')
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('tindakan_perbaikan')
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('tindakan_pencegahan')
                    ->required()
                    ->columnSpanFull(),

                Select::make('penanggung_jawab')
                    ->relationship('penanggungJawab', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('departemen_id')
                    ->relationship('departemen', 'nama_departemen')
                    ->searchable()
                    ->preload()
                    ->required(),

                DatePicker::make('target_selesai')
                    ->required(),

                Select::make('status')
                    ->options([
                        'open' => 'Open',
                        'in_progress' => 'In Progress',
                        'verifikasi' => 'Verifikasi',
                        'closed' => 'Closed',
                    ])
                    ->default('open')
                    ->required(),

                DatePicker::make('tanggal_selesai'),

                Select::make('efektivitas')
                    ->options([
                        'efektif' => 'Efektif',
                        'tidak_efektif' => 'Tidak Efektif',
                        'perlu_tindak_lanjut' => 'Perlu Tindak Lanjut',
                    ]),

                Select::make('insiden_id')
                    ->relationship('laporanInsiden', 'nomor_laporan')
                    ->searchable()
                    ->preload(),

                Select::make('identifikasi_bahaya_id')
                    ->relationship(
                        'identifikasiBahaya',
                        'deskripsi_bahaya'
                    )
                    ->searchable()
                    ->preload(),
            ]);
    }
}