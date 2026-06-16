<?php

namespace App\Filament\Resources\IdentifikasiBahayas\Pages;

use App\Filament\Resources\IdentifikasiBahayas\IdentifikasiBahayaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditIdentifikasiBahaya extends EditRecord
{
    protected static string $resource = IdentifikasiBahayaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
