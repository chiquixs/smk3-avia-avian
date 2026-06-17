<?php

namespace App\Filament\Resources\PengisianForms\Pages;

use App\Filament\Resources\PengisianForms\PengisianFormResource;
use App\Models\PenugasanForm;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePengisianForm extends CreateRecord
{
    protected static string $resource = PengisianFormResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['diisi_oleh']        = Auth::id();
        $data['tanggal_pengisian'] = now();
        $data['status']            = 'submitted';
        return $data;
    }

    protected function afterCreate(): void
    {
        $pengisian = $this->getRecord();

        // Hitung skor kepatuhan otomatis
        $skor = $pengisian->hitungSkor();
        $pengisian->update(['skor_kepatuhan' => $skor]);

        // Update status penugasan jadi submitted
        if ($pengisian->penugasan_id) {
            PenugasanForm::where('id', $pengisian->penugasan_id)
                ->update(['status' => 'submitted']);
        }
    }
}