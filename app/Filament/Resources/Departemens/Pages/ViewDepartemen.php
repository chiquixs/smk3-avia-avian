<?php

namespace App\Filament\Resources\Departemens\Pages;

use App\Filament\Resources\Departemens\DepartemenResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDepartemen extends ViewRecord
{
    protected static string $resource = DepartemenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
