<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Select::make('package_id')
                    ->relationship('package', 'name')
                    ->required(),
                TextInput::make('invoice_number')
                    ->required(),
                TextInput::make('base_amount')
                    ->required()
                    ->numeric(),
                TextInput::make('unique_code')
                    ->required()
                    ->numeric(),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'paid' => 'Paid', 'failed' => 'Failed'])
                    ->default('pending')
                    ->required(),
                FileUpload::make('receipt_image')
    ->label('Bukti Transfer')
    ->disk('public')
    ->directory('receipts')
    ->image()
    ->openable()     // Admin bisa klik untuk membuka gambar ukuran penuh di tab baru
    ->downloadable() // Admin bisa download struk
    ->columnSpanFull(),
            ]);
    }
}
