<?php

namespace App\Filament\Resources\Dokumens;

use App\Filament\Resources\Dokumens\Pages\CreateDokumen;
use App\Filament\Resources\Dokumens\Pages\EditDokumen;
use App\Filament\Resources\Dokumens\Pages\ListDokumens;
use App\Filament\Resources\Dokumens\Pages\ViewDokumen;
use App\Filament\Resources\Dokumens\Schemas\DokumenForm;
use App\Filament\Resources\Dokumens\Schemas\DokumenInfolist;
use App\Filament\Resources\Dokumens\Tables\DokumensTable;
use App\Models\Dokumen;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Filament\Resources\Dokumens\RelationManagers\VersiRelationManager;
use Illuminate\Support\Facades\Auth;

class DokumenResource extends Resource
{
    protected static ?string $model = Dokumen::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_dokumen';

    public static function form(Schema $schema): Schema
    {
        return DokumenForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DokumenInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DokumensTable::configure($table);
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Document Management';
    }

    public static function getNavigationLabel(): string
    {
        return 'Dokumen';
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function getRelations(): array
    {
        return [
            VersiRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDokumens::route('/'),
            'create' => CreateDokumen::route('/create'),
            'view' => ViewDokumen::route('/{record}'),
            'edit' => EditDokumen::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return in_array(Auth::user()?->role, [
            'admin',
            'k3_manager',
            'k3_officer',
        ]);
    }

    public static function canEdit($record): bool
    {
        return in_array(Auth::user()?->role, [
            'admin',
            'k3_manager',
            'k3_officer',
        ]);
    }

    public static function canDelete($record): bool
    {
        return in_array(Auth::user()?->role, [
            'admin',
            'k3_manager',
        ]);
    }
}
