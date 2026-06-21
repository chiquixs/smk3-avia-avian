<?php

namespace App\Filament\Resources\PelatihanK3S\Pages;

use App\Filament\Resources\PelatihanK3S\PelatihanK3Resource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPelatihanK3S extends ListRecords
{
    protected static string $resource = PelatihanK3Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
