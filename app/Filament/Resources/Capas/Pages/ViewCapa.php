<?php

namespace App\Filament\Resources\Capas\Pages;

use App\Filament\Resources\Capas\CapaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCapa extends ViewRecord
{
    protected static string $resource = CapaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
