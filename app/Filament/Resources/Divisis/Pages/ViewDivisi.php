<?php

namespace App\Filament\Resources\Divisis\Pages;

use App\Filament\Resources\Divisis\DivisiResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDivisi extends ViewRecord
{
    protected static string $resource = DivisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
