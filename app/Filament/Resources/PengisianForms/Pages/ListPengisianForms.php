<?php

namespace App\Filament\Resources\PengisianForms\Pages;

use App\Filament\Resources\PengisianForms\PengisianFormResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPengisianForms extends ListRecords
{
    protected static string $resource = PengisianFormResource::class;

    protected function getHeaderActions(): array
    {
        return [];
        // Tidak ada tombol Create di sini
        // Pengisian dilakukan dari menu Penugasan → Isi Checklist
    }
}