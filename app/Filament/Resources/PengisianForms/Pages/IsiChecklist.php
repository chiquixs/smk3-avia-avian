<?php

namespace App\Filament\Resources\PengisianForms\Pages;

use App\Filament\Resources\PengisianForms\PengisianFormResource;
use App\Models\JawabanForm;
use App\Models\PenugasanForm;
use App\Models\PengisianForm;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class IsiChecklist extends Page
{
    protected static string $resource = PengisianFormResource::class;
    protected string $view = 'filament.resources.pengisian-forms.pages.isi-checklist';

    public PenugasanForm $penugasan;

    public array $jawaban = [];
    public array $catatan = [];
    public string $catatanUmum = '';

    // ✅ Ubah dari int menjadi PenugasanForm langsung
    public function mount(PenugasanForm $penugasan): void
    {
        $this->penugasan = $penugasan->load([
            'template.pertanyaan' => fn($q) => $q->orderBy('urutan')
        ]);

        if ($this->penugasan->status !== 'pending') {
            Notification::make()
                ->title('Penugasan ini sudah diisi atau sudah lewat deadline.')
                ->warning()
                ->send();

            $this->redirect(PengisianFormResource::getUrl('index'));
            return;
        }

        foreach ($this->penugasan->template->pertanyaan as $pertanyaan) {
            $this->jawaban[$pertanyaan->id] = null;
            $this->catatan[$pertanyaan->id] = '';
        }
    }

    public function simpan(): void
    {
        $pengisian = PengisianForm::create([
            'penugasan_id'      => $this->penugasan->id,
            'template_id'       => $this->penugasan->template_id,
            'diisi_oleh'        => Auth::id(),
            'departemen_id'     => $this->penugasan->departemen_id,
            'tanggal_pengisian' => now(),
            'catatan'           => $this->catatanUmum ?: null,
            'status'            => 'submitted',
        ]);

        foreach ($this->penugasan->template->pertanyaan as $pertanyaan) {
            $nilaiJawaban   = $this->jawaban[$pertanyaan->id] ?? null;
            $catatanJawaban = $this->catatan[$pertanyaan->id] ?? null;
            $filePath       = null;

            if ($pertanyaan->tipe_field === 'photo' && $nilaiJawaban) {
                $filePath     = Storage::disk('public')->put('pengisian/foto', $nilaiJawaban);
                $nilaiJawaban = null;
            }

            JawabanForm::create([
                'pengisian_id'  => $pengisian->id,
                'pertanyaan_id' => $pertanyaan->id,
                'jawaban'       => is_array($nilaiJawaban)
                    ? json_encode($nilaiJawaban)
                    : $nilaiJawaban,
                'catatan'       => $catatanJawaban,
                'file_path'     => $filePath,
            ]);
        }

        $skor = $pengisian->hitungSkor();
        $pengisian->update(['skor_kepatuhan' => $skor]);

        $this->penugasan->update(['status' => 'submitted']);

        Notification::make()
            ->title('Checklist berhasil disimpan!')
            ->body('Skor kepatuhan: ' . number_format($skor, 1) . '%')
            ->success()
            ->send();

        $this->redirect(PengisianFormResource::getUrl('index'));
    }

    public function getTitle(): string
    {
        return 'Isi Checklist: ' . $this->penugasan->template->judul;
    }
}