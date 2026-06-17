<?php

namespace App\Filament\Resources\PenugasanForms\Pages;

use App\Filament\Resources\PenugasanForms\PenugasanFormResource;
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