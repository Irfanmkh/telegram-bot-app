<?php

namespace App\Filament\Resources\Packages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('original_price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                    TextInput::make('telegram_group_id')
    ->label('ID Grup / Channel Telegram')
    ->placeholder('-1001234567890')
    ->helperText('Diawali -100. Kosongkan jika ingin memakai ID grup default dari Settings.')
    ->maxLength(50),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
