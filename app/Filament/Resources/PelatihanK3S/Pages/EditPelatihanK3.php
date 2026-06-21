<?php

namespace App\Filament\Resources\PelatihanK3S\Pages;

use App\Filament\Resources\PelatihanK3S\PelatihanK3Resource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPelatihanK3 extends EditRecord
{
    protected static string $resource = PelatihanK3Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
