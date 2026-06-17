<?php

namespace App\Filament\Resources\PenugasanForms;

use App\Filament\Resources\PenugasanForms\Pages;
use App\Models\PenugasanForm;
use Carbon\Carbon;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\Action;
use App\Filament\Resources\PengisianForms\PengisianFormResource;

class PenugasanFormResource extends Resource
{
    protected static ?string $model = PenugasanForm::class;
    protected static ?string $navigationLabel = 'Penugasan Form';
    protected static ?int $navigationSort = 2;
    protected static ?string $modelLabel = 'Penugasan Form';
    protected static ?string $pluralModelLabel = 'Penugasan Form';

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-clipboard-document-check';
    }

    public static function getNavigationGroup(): string
    {
        return 'Monitoring K3';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Detail Penugasan')
                ->schema([
                    Select::make('template_id')
                        ->label('Template Form')
                        ->relationship('template', 'judul')
                        ->searchable()
                        ->preload()
                        ->required(),

                    Select::make('departemen_id')
                        ->label('Departemen')
                        ->relationship('departemen', 'nama_departemen')
                        ->searchable()
                        ->preload()
                        ->placeholder('Pilih Departemen'),

                    Select::make('user_id')
                        ->label('Ditugaskan ke (User)')
                        ->relationship('user', 'name')
                        ->searchable()
                        ->preload()
                        ->placeholder('Pilih User (opsional)'),

                    Select::make('status')
                        ->label('Status')
                        ->options([
                            'pending'   => 'Pending',
                            'submitted' => 'Submitted',
                            'overdue'   => 'Overdue',
                        ])
                        ->default('pending')
                        ->required(),

                    DatePicker::make('tanggal_mulai')
                        ->label('Tanggal Mulai')
                        ->required()
                        ->default(Carbon::today()),

                    DatePicker::make('tanggal_deadline')
                        ->label('Tanggal Deadline')
                        ->required()
                        ->after('tanggal_mulai'),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('template.judul')
                    ->label('Template')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('departemen.nama_departemen')
                    ->label('Departemen')
                    ->placeholder('-')
                    ->badge()
                    ->color('info'),

                TextColumn::make('user.name')
                    ->label('Ditugaskan ke')
                    ->placeholder('Seluruh Departemen')
                    ->searchable(),

                TextColumn::make('tanggal_mulai')
                    ->label('Mulai')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('tanggal_deadline')
                    ->label('Deadline')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'submitted' => 'success',
                        'overdue'   => 'danger',
                        default     => 'warning',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'pending'   => 'Pending',
                        'submitted' => 'Submitted',
                        'overdue'   => 'Overdue',
                        default     => $state,
                    }),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending'   => 'Pending',
                        'submitted' => 'Submitted',
                        'overdue'   => 'Overdue',
                    ]),

                SelectFilter::make('departemen_id')
                    ->label('Departemen')
                    ->relationship('departemen', 'nama_departemen'),

                SelectFilter::make('template_id')
                    ->label('Template')
                    ->relationship('template', 'judul'),
            ])
            ->actions([
                Action::make('isi_checklist')
                    ->label('Isi Checklist')
                    ->icon('heroicon-o-pencil-square')
                    ->color('success')
                    ->visible(fn($record) => $record->status === 'pending')
                    ->url(fn($record) => PengisianFormResource::getUrl(
                        'isi-checklist',
                        ['penugasan' => $record->id]
                    )),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('tanggal_deadline', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPenugasanForms::route('/'),
            'create' => Pages\CreatePenugasanForm::route('/create'),
            'edit'   => Pages\EditPenugasanForm::route('/{record}/edit'),
        ];
    }
}
