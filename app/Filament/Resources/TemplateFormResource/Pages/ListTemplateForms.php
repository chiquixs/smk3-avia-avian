<?php

namespace App\Filament\Resources\TemplateFormResource\Pages;

use App\Filament\Resources\TemplateFormResource;
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