<?php

namespace App\Filament\Resources\KategoriDokumens\Pages;

use App\Filament\Resources\KategoriDokumens\KategoriDokumenResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewKategoriDokumen extends ViewRecord
{
    protected static string $resource = KategoriDokumenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
