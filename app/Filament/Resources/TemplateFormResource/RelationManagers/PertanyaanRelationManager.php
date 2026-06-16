<?php

namespace App\Filament\Resources\TemplateFormResource\RelationManagers;

use App\Models\PertanyaanForm;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TagsInput;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class PertanyaanRelationManager extends RelationManager
{
    protected static string $relationship = 'pertanyaan';
    protected static ?string $title = 'Daftar Pertanyaan';
    protected static ?string $modelLabel = 'Pertanyaan';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('urutan')
                ->label('Urutan')
                ->numeric()
                ->required()
                ->default(fn() => $this->getOwnerRecord()->pertanyaan()->count() + 1)
                ->columnSpan(1),

            Select::make('tipe_field')
                ->label('Tipe Field')
                ->options(PertanyaanForm::TIPE_OPTIONS)
                ->required()
                ->live()
                ->columnSpan(2),

            TextInput::make('label')
                ->label('Pertanyaan / Label')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            TagsInput::make('opsi_jawaban')
                ->label('Opsi Jawaban')
                ->placeholder('Ketik opsi lalu tekan Enter')
                ->helperText('Isi opsi jawaban yang tersedia')
                ->visible(fn(Get $get) => in_array($get('tipe_field'), ['dropdown', 'checklist']))
                ->columnSpanFull(),

            Toggle::make('is_required')
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
                TextColumn::make('urutan')
                    ->label('No.')
                    ->sortable()
                    ->width(50),

                TextColumn::make('label')
                    ->label('Pertanyaan')
                    ->wrap(),

                TextColumn::make('tipe_field')
                    ->label('Tipe')
                    ->badge()
                    ->formatStateUsing(fn($state) => PertanyaanForm::TIPE_OPTIONS[$state] ?? $state)
                    ->color(fn($state) => match($state) {
                        'yes_no'                => 'success',
                        'text'                  => 'info',
                        'dropdown', 'checklist' => 'warning',
                        default                 => 'gray',
                    }),

                IconColumn::make('is_required')
                    ->label('Wajib')
                    ->boolean(),
            ])
            ->headerActions([
                CreateAction::make()->label('Tambah Pertanyaan'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->emptyStateHeading('Belum ada pertanyaan')
            ->emptyStateDescription('Klik "Tambah Pertanyaan" untuk mulai membuat checklist')
            ->emptyStateIcon('heroicon-o-question-mark-circle');
    }
}