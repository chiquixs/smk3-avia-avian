<?php

namespace App\Filament\Resources\PelatihanK3S;

use App\Filament\Resources\PelatihanK3S\Pages\CreatePelatihanK3;
use App\Filament\Resources\PelatihanK3S\Pages\EditPelatihanK3;
use App\Filament\Resources\PelatihanK3S\Pages\ListPelatihanK3S;
use App\Filament\Resources\PelatihanK3S\Pages\ViewPelatihanK3;
use App\Filament\Resources\PelatihanK3S\Schemas\PelatihanK3Form;
use App\Filament\Resources\PelatihanK3S\Schemas\PelatihanK3Infolist;
use App\Filament\Resources\PelatihanK3S\Tables\PelatihanK3STable;
use App\Models\PelatihanK3;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PelatihanK3Resource extends Resource
{
    protected static ?string $model = PelatihanK3::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAcademicCap;

    protected static ?string $recordTitleAttribute = 'nama_pelatihan';

    public static function getNavigationGroup(): ?string
    {
        return 'Pelatihan K3';
    }

    public static function getNavigationLabel(): string
    {
        return 'Daftar Pelatihan';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getModelLabel(): string
    {
        return 'Pelatihan K3';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Pelatihan K3';
    }

    public static function form(Schema $schema): Schema
    {
        return PelatihanK3Form::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PelatihanK3Infolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PelatihanK3STable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            \App\Filament\Resources\PelatihanK3S\RelationManagers\PesertaRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPelatihanK3S::route('/'),
            'create' => CreatePelatihanK3::route('/create'),
            'view' => ViewPelatihanK3::route('/{record}'),
            'edit' => EditPelatihanK3::route('/{record}/edit'),
        ];
    }
}