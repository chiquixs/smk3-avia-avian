<?php

namespace App\Filament\Resources\IdentifikasiBahayas;

use App\Filament\Resources\IdentifikasiBahayas\Pages\CreateIdentifikasiBahaya;
use App\Filament\Resources\IdentifikasiBahayas\Pages\EditIdentifikasiBahaya;
use App\Filament\Resources\IdentifikasiBahayas\Pages\ListIdentifikasiBahayas;
use App\Filament\Resources\IdentifikasiBahayas\Pages\ViewIdentifikasiBahaya;
use App\Filament\Resources\IdentifikasiBahayas\Schemas\IdentifikasiBahayaForm;
use App\Filament\Resources\IdentifikasiBahayas\Schemas\IdentifikasiBahayaInfolist;
use App\Filament\Resources\IdentifikasiBahayas\Tables\IdentifikasiBahayasTable;
use App\Models\IdentifikasiBahaya;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IdentifikasiBahayaResource extends Resource
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

    protected static ?string $model = IdentifikasiBahaya::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'SMK3';

    protected static ?string $recordTitleAttribute = 'lokasi';

    public static function form(Schema $schema): Schema
    {
        return IdentifikasiBahayaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return IdentifikasiBahayaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IdentifikasiBahayasTable::configure($table);
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
            'index' => ListIdentifikasiBahayas::route('/'),
            'create' => CreateIdentifikasiBahaya::route('/create'),
            'view' => ViewIdentifikasiBahaya::route('/{record}'),
            'edit' => EditIdentifikasiBahaya::route('/{record}/edit'),
        ];
    }
}
