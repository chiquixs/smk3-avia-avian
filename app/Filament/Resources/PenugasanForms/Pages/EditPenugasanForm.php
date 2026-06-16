<?php

namespace App\Filament\Resources\PenugasanFormResource\Pages;

use App\Filament\Resources\PenugasanFormResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenugasanForm extends EditRecord
{
    protected static string $resource = PenugasanFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}