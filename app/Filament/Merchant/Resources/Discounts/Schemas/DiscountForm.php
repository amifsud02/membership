<?php

namespace App\Filament\Merchant\Resources\Discounts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;

class DiscountForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Discount Details')
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('amount')
                            ->required()
                            ->prefix('$'),
                        Toggle::make('applied_globally')
                            ->label('Apply to all brands and outlets')
                            ->default(false)
                            ->live(),
                        Select::make('organisation_id')
                            ->relationship('organisation', 'name')
                            ->label('Limit to Organisation')
                            ->placeholder('Select an organisation to limit this discount to their members')
                            ->searchable()
                            ->preload(),
                    ])->columns(2),

                Section::make('Scope')
                    ->hidden(fn(Get $get) => $get('applied_globally'))
                    ->schema([
                        Select::make('brand_id')
                            ->relationship('brand', 'name', fn($query) => $query->where('merchant_id', auth()->user()->merchant_id))
                            ->searchable()
                            ->preload()
                            ->live(),
                        Select::make('outlet_id')
                            ->relationship('outlet', 'name', fn(Get $get, $query) => $query->where('brand_id', $get('brand_id')))
                            ->searchable()
                            ->preload()
                            ->hidden(fn(Get $get) => !$get('brand_id')),
                    ])->columns(2),
            ]);
    }
}
