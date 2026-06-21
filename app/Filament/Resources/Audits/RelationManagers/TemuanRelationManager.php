<?php

namespace App\Filament\Resources\Audits\RelationManagers;

use App\Filament\Resources\Audits\AuditResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class TemuanRelationManager extends RelationManager
{
    protected static string $relationship = 'temuan';

    protected static ?string $relatedResource = AuditResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
