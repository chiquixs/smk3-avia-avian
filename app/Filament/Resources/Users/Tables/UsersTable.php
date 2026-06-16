<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('avatar')
                    ->label('Foto')
                    ->circular(),

                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('departemen.nama_departemen')
                    ->label('Departemen')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('employee_id')
                    ->label('NIK')
                    ->searchable(),

                TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->searchable(),

                TextColumn::make('role')
                    ->badge(),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                TextColumn::make('last_login_at')
                    ->label('Login Terakhir')
                    ->dateTime('d M Y H:i'),

            ])
            ->filters([

                SelectFilter::make('departemen_id')
                    ->relationship('departemen', 'nama_departemen')
                    ->label('Departemen'),

                TernaryFilter::make('is_active')
                    ->label('Status Aktif'),

            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}