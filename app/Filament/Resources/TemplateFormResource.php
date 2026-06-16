<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TemplateFormResource\Pages;
use App\Filament\Resources\TemplateFormResource\RelationManagers;
use App\Models\TemplateForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TemplateFormResource extends Resource
{
    protected static ?string $model = TemplateForm::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Monitoring K3';
    protected static ?string $navigationLabel = 'Template Form';
    protected static ?int $navigationSort = 1;
    protected static ?string $modelLabel = 'Template Form';
    protected static ?string $pluralModelLabel = 'Template Form';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Template')
                ->schema([
                    Forms\Components\TextInput::make('judul')
                        ->label('Judul Template')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Forms\Components\Textarea::make('deskripsi')
                        ->label('Deskripsi')
                        ->rows(3)
                        ->columnSpanFull(),

                    Forms\Components\Select::make('departemen_id')
                        ->label('Departemen')
                        ->relationship('departemen', 'nama_departemen')
                        ->searchable()
                        ->preload()
                        ->placeholder('Semua Departemen'),

                    Forms\Components\Select::make('frekuensi')
                        ->label('Frekuensi')
                        ->options([
                            'harian'     => 'Harian',
                            'mingguan'   => 'Mingguan',
                            'bulanan'    => 'Bulanan',
                            'triwulan'   => 'Triwulanan',
                            'tahunan'    => 'Tahunan',
                            'insidental' => 'Insidental',
                        ])
                        ->required(),

                    Forms\Components\Hidden::make('dibuat_oleh')
                        ->default(fn() => auth()->id()),

                    Forms\Components\Toggle::make('is_active')
                        ->label('Aktif')
                        ->default(true),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul Template')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('departemen.nama_departemen')
                    ->label('Departemen')
                    ->placeholder('Semua Departemen')
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('frekuensi')
                    ->label('Frekuensi')
                    ->badge()
                    ->formatStateUsing(fn($state) => match($state) {
                        'harian'     => 'Harian',
                        'mingguan'   => 'Mingguan',
                        'bulanan'    => 'Bulanan',
                        'triwulan'   => 'Triwulanan',
                        'tahunan'    => 'Tahunan',
                        'insidental' => 'Insidental',
                        default      => $state,
                    }),

                Tables\Columns\TextColumn::make('pertanyaan_count')
                    ->label('Jumlah Pertanyaan')
                    ->counts('pertanyaan')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('frekuensi')
                    ->options([
                        'harian'     => 'Harian',
                        'mingguan'   => 'Mingguan',
                        'bulanan'    => 'Bulanan',
                        'triwulan'   => 'Triwulanan',
                        'tahunan'    => 'Tahunan',
                        'insidental' => 'Insidental',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\PertanyaanRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListTemplateForms::route('/'),
            'create' => Pages\CreateTemplateForm::route('/create'),
            'edit'   => Pages\EditTemplateForm::route('/{record}/edit'),
        ];
    }
}