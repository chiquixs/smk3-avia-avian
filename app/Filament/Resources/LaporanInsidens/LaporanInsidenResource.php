<?php

namespace App\Filament\Resources\LaporanInsidens;

use App\Filament\Resources\LaporanInsidens\Pages\CreateLaporanInsiden;
use App\Filament\Resources\LaporanInsidens\Pages\EditLaporanInsiden;
use App\Filament\Resources\LaporanInsidens\Pages\ListLaporanInsidens;
use App\Filament\Resources\LaporanInsidens\Pages\ViewLaporanInsiden;
use App\Filament\Resources\LaporanInsidens\Schemas\LaporanInsidenForm;
use App\Filament\Resources\LaporanInsidens\Schemas\LaporanInsidenInfolist;
use App\Filament\Resources\LaporanInsidens\Tables\LaporanInsidensTable;
use App\Models\LaporanInsiden;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LaporanInsidenResource extends Resource
{

    public static function canAccess(): bool
    {
        return auth()->user()?->hasRole([
            'system_admin',
            'k3_manager',
            'k3_officer',
            'department_head',
            'employee',
        ]);
    }

    protected static ?string $model = LaporanInsiden::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'SMK3';

    protected static ?string $recordTitleAttribute = 'judul';

    public static function form(Schema $schema): Schema
    {
        return LaporanInsidenForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LaporanInsidenInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LaporanInsidensTable::configure($table);
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
            'index' => ListLaporanInsidens::route('/'),
            'create' => CreateLaporanInsiden::route('/create'),
            'view' => ViewLaporanInsiden::route('/{record}'),
            'edit' => EditLaporanInsiden::route('/{record}/edit'),
        ];
    }
}
