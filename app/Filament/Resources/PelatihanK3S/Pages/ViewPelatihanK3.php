<?php

namespace App\Filament\Resources\PelatihanK3S\Pages;

use App\Filament\Resources\PelatihanK3S\PelatihanK3Resource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPelatihanK3 extends ViewRecord
{
    protected static string $resource = PelatihanK3Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
