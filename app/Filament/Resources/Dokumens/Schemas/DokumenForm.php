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
                    ->label('Kategori Dokumen')
                    ->relationship('kategori', 'nama_kategori')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('departemen_id')
                    ->label('Departemen')
                    ->relationship('departemen', 'nama_departemen')
                    ->searchable()
                    ->preload(),

                TextInput::make('nomor_dokumen')
                    ->label('Nomor Dokumen')
                    ->required(),

                TextInput::make('judul')
                    ->label('Judul Dokumen')
                    ->required(),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
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

                DatePicker::make('tanggal_berlaku')
                    ->label('Tanggal Berlaku'),

                DatePicker::make('tanggal_review')
                    ->label('Tanggal Review'),

                FileUpload::make('file_path')
                    ->label('Upload PDF')
                    ->acceptedFileTypes([
                        'application/pdf',
                    ])
                    ->directory('dokumen')
                    ->required()
                    ->columnSpanFull(),

                Select::make('dibuat_oleh')
                    ->label('Dibuat Oleh')
                    ->relationship('creator', 'name')
                    ->searchable()
                    ->preload(),

                Select::make('disetujui_oleh')
                    ->label('Disetujui Oleh')
                    ->relationship('approver', 'name')
                    ->searchable()
                    ->preload(),

                DatePicker::make('tanggal_disetujui')
                    ->label('Tanggal Disetujui'),

            ]);
    }
}