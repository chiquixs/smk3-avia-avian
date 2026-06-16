<?php

namespace App\Filament\Resources\KategoriDokumens;

use App\Filament\Resources\KategoriDokumens\Pages\CreateKategoriDokumen;
use App\Filament\Resources\KategoriDokumens\Pages\EditKategoriDokumen;
use App\Filament\Resources\KategoriDokumens\Pages\ListKategoriDokumens;
use App\Filament\Resources\KategoriDokumens\Pages\ViewKategoriDokumen;
use App\Filament\Resources\KategoriDokumens\Schemas\KategoriDokumenForm;
use App\Filament\Resources\KategoriDokumens\Schemas\KategoriDokumenInfolist;
use App\Filament\Resources\KategoriDokumens\Tables\KategoriDokumensTable;
use App\Models\KategoriDokumen;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KategoriDokumenResource extends Resource
{
    protected static ?string $model = KategoriDokumen::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_kategori';

    public static function form(Schema $schema): Schema
    {
        return KategoriDokumenForm::configure($schema);
    }
    public static function getNavigationGroup(): ?string
    {
        return 'Document Management';
    }

    public static function getNavigationLabel(): string
    {
        return 'Kategori Dokumen';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getModelLabel(): string
    {
        return 'Kategori Dokumen';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Kategori Dokumen';
    }
    public static function infolist(Schema $schema): Schema
    {
        return KategoriDokumenInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KategoriDokumensTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKategoriDokumens::route('/'),
            'create' => CreateKategoriDokumen::route('/create'),
            'view' => ViewKategoriDokumen::route('/{record}'),
            'edit' => EditKategoriDokumen::route('/{record}/edit'),
        ];
    }
}
