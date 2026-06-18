<?php

namespace App\Filament\Resources\Dokumens\Pages;

use App\Filament\Resources\Dokumens\DokumenResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListDokumens extends ListRecords
{
    protected static string $resource = DokumenResource::class;

    protected function getHeaderActions(): array
    {
        return [

            CreateAction::make()

                ->visible(fn () =>
                    in_array(Auth::user()?->role, [
                        'admin',
                        'k3_manager',
                        'k3_officer',
                    ])
                ),

        ];
    }
}