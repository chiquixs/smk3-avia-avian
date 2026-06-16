<?php

namespace App\Filament\Resources\LaporanInsidens\Pages;

use App\Filament\Resources\LaporanInsidens\LaporanInsidenResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditLaporanInsiden extends EditRecord
{
    protected static string $resource = LaporanInsidenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
