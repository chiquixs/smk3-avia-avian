<?php

namespace App\Filament\Resources\Dokumens\Pages;

use App\Filament\Resources\Dokumens\DokumenResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateDokumen extends CreateRecord
{
    protected static string $resource = DokumenResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['dibuat_oleh'] = Auth::id();
        $data['status'] = 'draft';

        return $data;
    }
}