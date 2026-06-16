<?php

namespace App\Filament\Resources\LaporanInsidens\Pages;

use App\Filament\Resources\LaporanInsidens\LaporanInsidenResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLaporanInsiden extends ViewRecord
{
    protected static string $resource = LaporanInsidenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
