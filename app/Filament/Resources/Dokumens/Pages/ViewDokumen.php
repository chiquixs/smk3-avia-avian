<?php

namespace App\Filament\Resources\Dokumens\Pages;

use App\Filament\Resources\Dokumens\DokumenResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Auth;

class ViewDokumen extends ViewRecord
{
    protected static string $resource = DokumenResource::class;

    protected function getHeaderActions(): array
    {
        return [

            EditAction::make()
                ->visible(fn () =>
                    in_array(Auth::user()?->role, [
                        'admin',
                        'k3_manager',
                        'k3_officer',
                    ])
                ),

            Action::make('approve')
                ->label('Approve')
                ->icon('heroicon-o-check-circle')

                ->visible(fn () =>
                    in_array(Auth::user()?->role, [
                        'admin',
                        'k3_manager',
                    ])
                    &&
                    $this->record->status !== 'approved'
                )

                ->requiresConfirmation()

                ->action(function () {

                    $this->record->update([
                        'status' => 'approved',
                        'disetujui_oleh' => Auth::id(),
                        'tanggal_disetujui' => now(),
                    ]);

                    Notification::make()
                        ->title('Dokumen berhasil disetujui')
                        ->success()
                        ->send();
                }),

        ];
    }
}