<?php

namespace App\Filament\Resources\TemplateForms\Pages;

use App\Filament\Resources\TemplateForms\TemplateFormResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateTemplateForm extends CreateRecord
{
    protected static string $resource = TemplateFormResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->getRecord()]);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['dibuat_oleh'] = Auth::id();
        return $data;
    }
}