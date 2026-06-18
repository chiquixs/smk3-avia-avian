<?php

namespace App\Filament\Resources\Dokumens\Pages;

use App\Filament\Resources\Dokumens\DokumenResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditDokumen extends EditRecord
{
    protected static string $resource = DokumenResource::class;

    protected function getHeaderActions(): array
    {
        return [

            ViewAction::make(),

            DeleteAction::make()
                ->visible(fn () =>
                    in_array(Auth::user()?->role, [
                        'admin',
                        'k3_manager',
                    ])
                ),

        ];
    }
}