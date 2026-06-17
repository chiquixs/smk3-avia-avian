<?php

namespace App\Filament\Resources\PengisianForms;

use App\Filament\Resources\PengisianForms\Pages;
use App\Models\PengisianForm;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\Action;


class PengisianFormResource extends Resource
{
    protected static ?string $model = PengisianForm::class;
    protected static ?string $navigationLabel = 'Pengisian Form';
    protected static ?int $navigationSort = 3;
    protected static ?string $modelLabel = 'Pengisian Form';
    protected static ?string $pluralModelLabel = 'Pengisian Form';

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-pencil-square';
    }

    public static function getNavigationGroup(): string
    {
        return 'Monitoring K3';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Informasi Pengisian')
                ->schema([
                    Textarea::make('catatan')
                        ->label('Catatan Umum')
                        ->rows(3)
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('penugasan.template.judul')
                    ->label('Template')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('departemen.nama_departemen')
                    ->label('Departemen')
                    ->badge()
                    ->color('info'),

                TextColumn::make('pengisi.name')
                    ->label('Diisi Oleh')
                    ->searchable(),

                TextColumn::make('tanggal_pengisian')
                    ->label('Tanggal Isi')
                    ->dateTime('d M Y H:i')
                    ->sortable(),

                TextColumn::make('skor_kepatuhan')
                    ->label('Skor Kepatuhan')
                    ->formatStateUsing(fn($state) => $state
                        ? number_format($state, 1) . '%'
                        : '-')
                    ->badge()
                    ->color(fn($state) => match (true) {
                        $state >= 85 => 'success',
                        $state >= 70 => 'warning',
                        $state >= 50 => 'danger',
                        default      => 'gray',
                    }),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'submitted' => 'success',
                        'reviewed'  => 'info',
                        default     => 'warning',
                    })
                    ->formatStateUsing(fn($state) => match ($state) {
                        'draft'     => 'Draft',
                        'submitted' => 'Submitted',
                        'reviewed'  => 'Reviewed',
                        default     => $state,
                    }),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'draft'     => 'Draft',
                        'submitted' => 'Submitted',
                        'reviewed'  => 'Reviewed',
                    ]),
                SelectFilter::make('departemen_id')
                    ->label('Departemen')
                    ->relationship('departemen', 'nama_departemen'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index'         => Pages\ListPengisianForms::route('/'),
            'create'        => Pages\CreatePengisianForm::route('/create'),
            'edit'          => Pages\EditPengisianForm::route('/{record}/edit'),
            'isi-checklist' => Pages\IsiChecklist::route('/isi/{penugasan}'),
        ];
    }
}
