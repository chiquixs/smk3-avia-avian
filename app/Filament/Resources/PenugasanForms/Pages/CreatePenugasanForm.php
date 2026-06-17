<?php

namespace App\Filament\Resources\PenugasanForms\Pages;

use App\Filament\Resources\PenugasanForms\PenugasanFormResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePenugasanForm extends CreateRecord
{
    protected static string $resource = PenugasanFormResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}