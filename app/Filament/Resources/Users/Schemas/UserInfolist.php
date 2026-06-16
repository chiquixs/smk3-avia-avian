<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\ImageEntry;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('role')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('departemen_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('employee_id')
                    ->placeholder('-'),
                TextEntry::make('jabatan')
                    ->placeholder('-'),
                IconEntry::make('is_active')
                    ->boolean()
                    ->placeholder('-'),
                TextEntry::make('last_login_at')
                    ->dateTime()
                    ->placeholder('-'),
                ImageEntry::make('avatar')
                    ->label('Avatar')
                    ->circular()
                    ->extraAttributes([
                        'style' => 'width:80px;height:80px;object-fit:cover;',
                    ])
            ]);
    }
}
