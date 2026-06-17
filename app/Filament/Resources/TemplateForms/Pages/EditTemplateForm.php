<?php

namespace App\Filament\Resources\TemplateForms\Pages;

use App\Filament\Resources\TemplateForms\TemplateFormResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTemplateForm extends EditRecord
{
    protected static string $resource = TemplateFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}