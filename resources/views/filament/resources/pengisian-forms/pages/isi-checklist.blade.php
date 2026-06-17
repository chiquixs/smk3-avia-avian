<x-filament-panels::page>
    <div class="space-y-6">

        {{-- Info Penugasan --}}
        <x-filament::section>
            <x-slot name="heading">Informasi Penugasan</x-slot>
            <div class="grid grid-cols-2 gap-x-8 gap-y-4">
                <div>
                    <dt class="text-xs font-semibold uppercase tracking-wider" style="color: var(--gray-400)">Template</dt>
                    <dd class="mt-1 text-sm font-medium">{{ $this->penugasan->template->judul }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold uppercase tracking-wider" style="color: var(--gray-400)">Departemen</dt>
                    <dd class="mt-1 text-sm font-medium">{{ $this->penugasan->departemen?->nama_departemen ?? '-' }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold uppercase tracking-wider" style="color: var(--gray-400)">Deadline</dt>
                    <dd class="mt-1 text-sm font-medium">{{ $this->penugasan->tanggal_deadline->format('d M Y') }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold uppercase tracking-wider" style="color: var(--gray-400)">Frekuensi</dt>
                    <dd class="mt-1 text-sm font-medium">{{ ucfirst($this->penugasan->template->frekuensi ?? '-') }}</dd>
                </div>
            </div>
        </x-filament::section>

        {{-- Checklist --}}
        <x-filament::section>
            <x-slot name="heading">Checklist Pertanyaan</x-slot>
            <x-slot name="description">Isi setiap pertanyaan dengan jujur sesuai kondisi lapangan.</x-slot>

            <div class="space-y-4">
                @foreach ($this->penugasan->template->pertanyaan as $index => $pertanyaan)
                    <x-filament::section :compact="true">
                        {{-- Nomor + Label --}}
                        <div class="flex items-start gap-3 mb-4">
                            <x-filament::badge color="primary">
                                {{ $index + 1 }}
                            </x-filament::badge>
                            <div>
                                <p class="text-sm font-semibold">{{ $pertanyaan->label }}</p>
                                <div class="flex items-center gap-2 mt-1">
                                    <x-filament::badge color="gray" size="sm">
                                        {{ \App\Models\PertanyaanForm::TIPE_OPTIONS[$pertanyaan->tipe_field] ?? $pertanyaan->tipe_field }}
                                    </x-filament::badge>
                                    @if ($pertanyaan->is_required)
                                        <x-filament::badge color="danger" size="sm">Wajib</x-filament::badge>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Input --}}
                        <div class="pl-9">
                            @if ($pertanyaan->tipe_field === 'yes_no')
                                <div class="flex gap-3">
                                    <label class="flex items-center gap-2 px-4 py-2.5 rounded-lg border-2 cursor-pointer transition-colors
                                        {{ ($jawaban[$pertanyaan->id] ?? '') === 'ya' ? 'border-green-500 bg-green-50 dark:bg-green-950' : 'border-gray-200 dark:border-gray-700' }}">
                                        <input type="radio"
                                            wire:model.live="jawaban.{{ $pertanyaan->id }}"
                                            value="ya"
                                            class="accent-green-600">
                                        <span class="text-sm font-medium text-green-700 dark:text-green-400">Ya</span>
                                    </label>
                                    <label class="flex items-center gap-2 px-4 py-2.5 rounded-lg border-2 cursor-pointer transition-colors
                                        {{ ($jawaban[$pertanyaan->id] ?? '') === 'tidak' ? 'border-red-500 bg-red-50 dark:bg-red-950' : 'border-gray-200 dark:border-gray-700' }}">
                                        <input type="radio"
                                            wire:model.live="jawaban.{{ $pertanyaan->id }}"
                                            value="tidak"
                                            class="accent-red-600">
                                        <span class="text-sm font-medium text-red-700 dark:text-red-400">Tidak</span>
                                    </label>
                                </div>

                            @elseif ($pertanyaan->tipe_field === 'text')
                                <textarea
                                    wire:model="jawaban.{{ $pertanyaan->id }}"
                                    rows="3"
                                    placeholder="Tulis jawaban di sini..."
                                    class="w-full rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 text-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500"></textarea>

                            @elseif ($pertanyaan->tipe_field === 'number')
                                <input type="number"
                                    wire:model="jawaban.{{ $pertanyaan->id }}"
                                    placeholder="0"
                                    class="w-36 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 text-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">

                            @elseif ($pertanyaan->tipe_field === 'date')
                                <input type="date"
                                    wire:model="jawaban.{{ $pertanyaan->id }}"
                                    class="w-48 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 text-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">

                            @elseif ($pertanyaan->tipe_field === 'dropdown')
                                <select
                                    wire:model="jawaban.{{ $pertanyaan->id }}"
                                    class="w-64 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 text-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                                    <option value="">— Pilih jawaban —</option>
                                    @foreach ($pertanyaan->opsi_jawaban ?? [] as $opsi)
                                        <option value="{{ $opsi }}">{{ $opsi }}</option>
                                    @endforeach
                                </select>

                            @elseif ($pertanyaan->tipe_field === 'checklist')
                                <div class="grid grid-cols-2 gap-2">
                                    @foreach ($pertanyaan->opsi_jawaban ?? [] as $opsi)
                                        <label class="flex items-center gap-2 px-3 py-2 rounded-lg border border-gray-200 dark:border-gray-700 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-800">
                                            <input type="checkbox"
                                                wire:model="jawaban.{{ $pertanyaan->id }}"
                                                value="{{ $opsi }}"
                                                class="accent-primary-600 w-4 h-4 rounded">
                                            <span class="text-sm">{{ $opsi }}</span>
                                        </label>
                                    @endforeach
                                </div>

                            @elseif ($pertanyaan->tipe_field === 'rating')
                                <div class="flex items-center gap-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <label class="cursor-pointer">
                                            <input type="radio"
                                                wire:model.live="jawaban.{{ $pertanyaan->id }}"
                                                value="{{ $i }}"
                                                class="sr-only">
                                            <span class="text-2xl transition-opacity
                                                {{ ($jawaban[$pertanyaan->id] ?? 0) >= $i ? 'opacity-100' : 'opacity-25' }}">
                                                ⭐
                                            </span>
                                        </label>
                                    @endfor
                                    @if (!empty($jawaban[$pertanyaan->id]))
                                        <x-filament::badge color="warning">
                                            {{ $jawaban[$pertanyaan->id] }} / 5
                                        </x-filament::badge>
                                    @endif
                                </div>

                            @elseif ($pertanyaan->tipe_field === 'photo')
                                <label class="inline-flex items-center gap-2 px-4 py-2 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-600 cursor-pointer hover:border-primary-400 transition-colors">
                                    <span class="text-sm text-gray-500">📷 Pilih foto</span>
                                    <input type="file"
                                        wire:model="jawaban.{{ $pertanyaan->id }}"
                                        accept="image/*"
                                        class="sr-only">
                                </label>
                                @if (!empty($jawaban[$pertanyaan->id]))
                                    <x-filament::badge color="success" class="ml-2">✅ Foto dipilih</x-filament::badge>
                                @endif
                            @endif

                            {{-- Catatan per pertanyaan --}}
                            <div class="mt-3 pt-3 border-t border-gray-100 dark:border-gray-700">
                                <input type="text"
                                    wire:model="catatan.{{ $pertanyaan->id }}"
                                    placeholder=" Catatan untuk pertanyaan ini (opsional)..."
                                    class="w-full rounded-lg border border-gray-200 dark:border-gray-700 dark:bg-gray-800 text-xs px-3 py-2 text-gray-500 focus:outline-none focus:ring-1 focus:ring-primary-400">
                            </div>
                        </div>
                    </x-filament::section>
                @endforeach
            </div>
        </x-filament::section>

        {{-- Catatan Umum --}}
        <x-filament::section>
            <x-slot name="heading"> Catatan Umum</x-slot>
            <textarea
                wire:model="catatanUmum"
                rows="3"
                placeholder="Tambahkan catatan umum untuk pengisian checklist ini..."
                class="w-full rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 text-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500"></textarea>
        </x-filament::section>

        {{-- Tombol Aksi --}}
        <div class="flex items-center justify-between pb-6">
            <x-filament::button
                color="gray"
                tag="a"
                :href="$this->getResource()::getUrl('index')">
                ← Batal
            </x-filament::button>

            <x-filament::button
                wire:click="simpan"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-75"
                size="lg">
                <span wire:loading.remove wire:target="simpan">💾 Simpan Checklist</span>
                <span wire:loading wire:target="simpan">⏳ Menyimpan...</span>
            </x-filament::button>
        </div>

    </div>
</x-filament-panels::page>