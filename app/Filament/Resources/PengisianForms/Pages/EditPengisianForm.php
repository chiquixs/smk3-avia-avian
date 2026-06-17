<?php

namespace App\Filament\Resources\PengisianForms\Pages;

use App\Filament\Resources\PengisianForms\PengisianFormResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPengisianForm extends EditRecord
{
    protected static string $resource = PengisianFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $pengisian = $this->getRecord();
        $skor = $pengisian->hitungSkor();
        $pengisian->update(['skor_kepatuhan' => $skor]);
    }
}