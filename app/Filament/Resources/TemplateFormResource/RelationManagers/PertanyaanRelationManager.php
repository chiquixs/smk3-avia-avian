<?php

namespace App\Filament\Resources\TemplateFormResource\RelationManagers;

use App\Models\PertanyaanForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class PertanyaanRelationManager extends RelationManager
{
    protected static string $relationship = 'pertanyaan';
    protected static ?string $title = 'Daftar Pertanyaan';
    protected static ?string $modelLabel = 'Pertanyaan';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('urutan')
                ->label('Urutan')
                ->numeric()
                ->required()
                ->default(fn() => $this->getOwnerRecord()->pertanyaan()->count() + 1)
                ->columnSpan(1),

            Forms\Components\Select::make('tipe_field')
                ->label('Tipe Field')
                ->options(PertanyaanForm::TIPE_OPTIONS)
                ->required()
                ->live()
                ->columnSpan(2),

            Forms\Components\TextInput::make('label')
                ->label('Pertanyaan / Label')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            // Opsi jawaban — hanya muncul jika tipe = dropdown atau checklist
            Forms\Components\TagsInput::make('opsi_jawaban')
                ->label('Opsi Jawaban')
                ->placeholder('Ketik opsi lalu tekan Enter')
                ->helperText('Isi opsi jawaban yang tersedia')
                ->visible(fn(Get $get) => in_array($get('tipe_field'), ['dropdown', 'checklist']))
                ->columnSpanFull(),

            Forms\Components\Toggle::make('is_required')
                ->label('Wajib Diisi')
                ->default(true)
                ->columnSpan(1),
        ])->columns(3);
    }

    public function table(Table $table): Table
    {
        return $table
            ->reorderable('urutan')
            ->defaultSort('urutan')
            ->columns([
                Tables\Columns\TextColumn::make('urutan')
                    ->label('No.')
                    ->sortable()
                    ->width(50),

                Tables\Columns\TextColumn::make('label')
                    ->label('Pertanyaan')
                    ->wrap(),

                Tables\Columns\BadgeColumn::make('tipe_field')
                    ->label('Tipe')
                    ->formatStateUsing(fn($state) => PertanyaanForm::TIPE_OPTIONS[$state] ?? $state)
                    ->colors([
                        'success' => 'yes_no',
                        'info'    => 'text',
                        'warning' => ['dropdown', 'checklist'],
                        'gray'    => ['number', 'date', 'photo', 'rating'],
                    ]),

                Tables\Columns\IconColumn::make('is_required')
                    ->label('Wajib')
                    ->boolean(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Pertanyaan'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->emptyStateHeading('Belum ada pertanyaan')
            ->emptyStateDescription('Klik "Tambah Pertanyaan" untuk mulai membuat checklist')
            ->emptyStateIcon('heroicon-o-question-mark-circle');
    }
}