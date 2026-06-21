<?php

namespace App\Filament\Resources\Audits\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AuditForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([

                TextInput::make('judul')
                    ->label('Judul Audit')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Select::make('jenis_audit')
                    ->label('Jenis Audit')
                    ->options([
                        'internal' => 'Internal',
                        'eksternal' => 'Eksternal',
                        'sertifikasi' => 'Sertifikasi',
                    ])
                    ->required(),

                Select::make('frekuensi_audit')
                    ->label('Frekuensi Audit')
                    ->options([
                        'tahunan' => 'Tahunan',
                        'eksternal_3_tahun' => 'Eksternal 3 Tahun',
                        'insidental' => 'Insidental',
                    ]),

                DatePicker::make('tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->required(),

                DatePicker::make('tanggal_selesai')
                    ->label('Tanggal Selesai')
                    ->after('tanggal_mulai'),

                TextInput::make('auditor_eksternal')
                    ->label('Nama Auditor (Eksternal)')
                    ->maxLength(255)
                    ->helperText('Isi jika auditor bukan dari sistem (misal auditor eksternal)'),

                Select::make('auditor_id')
                    ->label('Auditor (User Internal)')
                    ->relationship('auditor', 'name')
                    ->searchable()
                    ->preload(),

                Select::make('departemen_id')
                    ->label('Departemen')
                    ->relationship('departemen', 'nama_departemen')
                    ->searchable()
                    ->preload(),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'planned' => 'Planned',
                        'ongoing' => 'Ongoing',
                        'completed' => 'Completed',
                        'closed' => 'Closed',
                    ])
                    ->default('planned')
                    ->required(),

                Textarea::make('lingkup')
                    ->label('Lingkup Audit')
                    ->columnSpanFull(),

                Textarea::make('kesimpulan')
                    ->label('Kesimpulan')
                    ->columnSpanFull(),

            ]);
    }
}