<?php

namespace App\Filament\Resources\TemplateFormResource\Pages;

use App\Filament\Resources\TemplateFormResource;
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