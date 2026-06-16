<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([

                TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->required(fn (string $operation) => $operation === 'create')
                    ->dehydrated(fn ($state) => filled($state)),

                Select::make('departemen_id')
                    ->label('Departemen')
                    ->relationship('departemen', 'nama_departemen')
                    ->searchable()
                    ->preload(),

                TextInput::make('employee_id')
                    ->label('Employee ID'),

                TextInput::make('jabatan')
                    ->label('Jabatan'),

                Select::make('role')
                    ->label('Role')
                    ->options([
                        'admin' => 'Administrator',
                        'k3_manager' => 'K3 Manager',
                        'k3_officer' => 'K3 Officer',
                        'dept_head' => 'Kepala Departemen',
                        'employee' => 'Karyawan',
                        'auditor' => 'Auditor',
                        'viewer' => 'Viewer',
                    ])
                    ->required(),

                Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->default(true),

                FileUpload::make('avatar')
                    ->label('Foto Profil')
                    ->image()
                    ->directory('avatars')
                    ->columnSpanFull(),

            ]);
    }
}