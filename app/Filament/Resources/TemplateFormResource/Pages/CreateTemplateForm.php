<?php

namespace App\Filament\Resources\TemplateFormResource\Pages;

use App\Filament\Resources\TemplateFormResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTemplateForm extends CreateRecord
{
    protected static string $resource = TemplateFormResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->getRecord()]);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['dibuat_oleh'] = auth()->id();
        return $data;
    }
}