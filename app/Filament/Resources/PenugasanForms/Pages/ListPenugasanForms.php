<?php

namespace App\Filament\Resources\PenugasanForms\Pages;

use App\Filament\Resources\PenugasanForms\PenugasanFormResource;
use App\Models\PenugasanForm;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenugasanForms extends ListRecords
{
    protected static string $resource = PenugasanFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Buat Penugasan Baru'),
        ];
    }

    // Auto-sync status overdue setiap kali halaman dibuka
    public function mount(): void
    {
        parent::mount();

        PenugasanForm::where('status', 'pending')
            ->where('tanggal_deadline', '<', now())
            ->update(['status' => 'overdue']);
    }
}