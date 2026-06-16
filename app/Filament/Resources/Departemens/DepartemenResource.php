<?php

namespace App\Filament\Resources\Departemens;

use App\Filament\Resources\Departemens\Pages\CreateDepartemen;
use App\Filament\Resources\Departemens\Pages\EditDepartemen;
use App\Filament\Resources\Departemens\Pages\ListDepartemens;
use App\Filament\Resources\Departemens\Pages\ViewDepartemen;
use App\Filament\Resources\Departemens\Schemas\DepartemenForm;
use App\Filament\Resources\Departemens\Schemas\DepartemenInfolist;
use App\Filament\Resources\Departemens\Tables\DepartemensTable;
use App\Models\Departemen;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DepartemenResource extends Resource
{
    protected static ?string $model = Departemen::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_departemen';

    public static function form(Schema $schema): Schema
    {
        return DepartemenForm::configure($schema);
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Organization';
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function infolist(Schema $schema): Schema
    {
        return DepartemenInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DepartemensTable::configure($table);
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
            'index' => ListDepartemens::route('/'),
            'create' => CreateDepartemen::route('/create'),
            'view' => ViewDepartemen::route('/{record}'),
            'edit' => EditDepartemen::route('/{record}/edit'),
        ];
    }
}
