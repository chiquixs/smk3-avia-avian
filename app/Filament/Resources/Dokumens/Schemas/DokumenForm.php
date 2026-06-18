<?php

namespace App\Filament\Resources\Dokumens\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DokumenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([

                Select::make('kategori_id')
                    ->relationship('kategori', 'nama_kategori')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('departemen_id')
                    ->relationship('departemen', 'nama_departemen')
                    ->searchable()
                    ->preload(),

                TextInput::make('nomor_dokumen')
                    ->required(),

                TextInput::make('judul')
                    ->required(),

                Textarea::make('deskripsi')
                    ->columnSpanFull(),

                TextInput::make('versi')
                    ->default('1.0')
                    ->required(),

                TextInput::make('nomor_revisi')
                    ->default('0')
                    ->required(),

                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'review' => 'Review',
                        'approved' => 'Approved',
                        'published' => 'Published',
                        'obsolete' => 'Obsolete',
                    ])
                    ->default('draft')
                    ->required(),

                DatePicker::make('tanggal_berlaku'),

                DatePicker::make('tanggal_review'),

                FileUpload::make('file_path')
                    ->directory('dokumen')
                    ->acceptedFileTypes([
                        'application/pdf',
                    ])
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}