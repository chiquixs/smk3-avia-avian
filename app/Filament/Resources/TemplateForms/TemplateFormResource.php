<?php

namespace App\Filament\Resources\TemplateForms;

use App\Filament\Resources\TemplateForms\Pages;
use App\Filament\Resources\TemplateForms\RelationManagers;
use App\Models\TemplateForm;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Illuminate\Support\Facades\Auth;

class TemplateFormResource extends Resource
{
    protected static ?string $model = TemplateForm::class;

    // Hapus navigationIcon dan navigationGroup dari sini
    // Pindahkan ke method getNavigationIcon() dan getNavigationGroup()

    protected static ?string $navigationLabel = 'Template Form';
    protected static ?int $navigationSort = 1;
    protected static ?string $modelLabel = 'Template Form';
    protected static ?string $pluralModelLabel = 'Template Form';

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-clipboard-document-list';
    }

    public static function getNavigationGroup(): string
    {
        return 'Monitoring K3';
    }


    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Informasi Template')
                ->schema([
                    TextInput::make('judul')
                        ->label('Judul Template')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Textarea::make('deskripsi')
                        ->label('Deskripsi')
                        ->rows(3)
                        ->columnSpanFull(),

                    Select::make('departemen_id')
                        ->label('Departemen')
                        ->relationship('departemen', 'nama_departemen')
                        ->searchable()
                        ->preload()
                        ->placeholder('Semua Departemen'),

                    Select::make('frekuensi')
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

                    Hidden::make('dibuat_oleh')
                        ->default(fn() => Auth::id()),

                    Toggle::make('is_active')
                        ->label('Aktif')
                        ->default(true),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->label('Judul Template')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('departemen.nama_departemen')
                    ->label('Departemen')
                    ->placeholder('Semua Departemen')
                    ->badge()
                    ->color('info'),

                TextColumn::make('frekuensi')
                    ->label('Frekuensi')
                    ->badge()
                    ->formatStateUsing(fn($state) => match ($state) {
                        'harian'     => 'Harian',
                        'mingguan'   => 'Mingguan',
                        'bulanan'    => 'Bulanan',
                        'triwulan'   => 'Triwulanan',
                        'tahunan'    => 'Tahunan',
                        'insidental' => 'Insidental',
                        default      => $state,
                    }),

                TextColumn::make('pertanyaan_count')
                    ->label('Jumlah Pertanyaan')
                    ->counts('pertanyaan')
                    ->badge()
                    ->color('gray'),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('frekuensi')
                    ->options([
                        'harian'     => 'Harian',
                        'mingguan'   => 'Mingguan',
                        'bulanan'    => 'Bulanan',
                        'triwulan'   => 'Triwulanan',
                        'tahunan'    => 'Tahunan',
                        'insidental' => 'Insidental',
                    ]),
                TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
