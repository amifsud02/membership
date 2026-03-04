<?php

namespace App\Filament\Resources\Organisations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class OrganisationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\FileUpload::make('logo')
                    ->image()
                    ->directory('partner-logos')
                    ->disk('public')
                    ->disabled(),
                TextInput::make('name')
                    ->required()
                    ->disabled(),
                \Filament\Forms\Components\Textarea::make('description')
                    ->rows(3)
                    ->placeholder('Enter a brief description for the public listing...')
                    ->disabled(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required()
                    ->disabled(),
                \Filament\Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->required(),
                TextInput::make('transaction_fee')
                    ->required()
                    ->minValue(5)
                    ->maxValue(15)
                    ->suffix('%')
                    ->default(10)
                    ->disabled(),
            ]);
    }
}
