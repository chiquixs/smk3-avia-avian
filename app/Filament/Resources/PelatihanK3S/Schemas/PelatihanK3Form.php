<?php

namespace App\Filament\Resources\PelatihanK3S\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PelatihanK3Form
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([

                TextInput::make('nama_pelatihan')
                    ->label('Nama Pelatihan')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                DatePicker::make('tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->required(),

                DatePicker::make('tanggal_selesai')
                    ->label('Tanggal Selesai')
                    ->after('tanggal_mulai'),

                TextInput::make('penyelenggara')
                    ->label('Penyelenggara')
                    ->maxLength(255)
                    ->helperText('Contoh: Internal K3, Disnaker, Lembaga Sertifikasi'),

                TextInput::make('lokasi')
                    ->label('Lokasi')
                    ->maxLength(255),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->columnSpanFull(),

                Textarea::make('materi')
                    ->label('Materi Pelatihan')
                    ->columnSpanFull()
                    ->helperText('Rangkuman topik/materi yang akan disampaikan'),

            ]);
    }
}