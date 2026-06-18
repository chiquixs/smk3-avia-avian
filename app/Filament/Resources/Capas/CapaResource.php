<?php

namespace App\Filament\Resources\Capas;

use App\Filament\Resources\Capas\Pages\CreateCapa;
use App\Filament\Resources\Capas\Pages\EditCapa;
use App\Filament\Resources\Capas\Pages\ListCapas;
use App\Filament\Resources\Capas\Pages\ViewCapa;
use App\Filament\Resources\Capas\Schemas\CapaForm;
use App\Filament\Resources\Capas\Schemas\CapaInfolist;
use App\Filament\Resources\Capas\Tables\CapasTable;
use App\Models\Capa;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CapaResource extends Resource
{
        protected static ?string $model = Capa::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'SMK3';

    protected static ?string $recordTitleAttribute = 'judul';

    public static function form(Schema $schema): Schema
    {
        return CapaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CapaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CapasTable::configure($table);
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
            'index' => ListCapas::route('/'),
            'create' => CreateCapa::route('/create'),
            'view' => ViewCapa::route('/{record}'),
            'edit' => EditCapa::route('/{record}/edit'),
        ];
    }
}
