<?php

namespace App\Filament\Resources\IdentifikasiBahayas\Pages;

use App\Filament\Resources\IdentifikasiBahayas\IdentifikasiBahayaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewIdentifikasiBahaya extends ViewRecord
{
    protected static string $resource = IdentifikasiBahayaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
