<?php

namespace App\Filament\Resources\IdentifikasiBahayas\Pages;

use App\Filament\Resources\IdentifikasiBahayas\IdentifikasiBahayaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIdentifikasiBahayas extends ListRecords
{
    protected static string $resource = IdentifikasiBahayaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
