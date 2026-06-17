<?php

namespace App\Filament\Resources\TemplateForms\Pages;

use App\Filament\Resources\TemplateForms\TemplateFormResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTemplateForms extends ListRecords
{
    protected static string $resource = TemplateFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Buat Template Baru'),
        ];
    }
}