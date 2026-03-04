<?php

namespace App\Filament\Merchant\Resources\Outlets\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OutletForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                \Filament\Forms\Components\Select::make('brand_id')
                    ->relationship('brand', 'name', fn ($query) => $query->where('merchant_id', auth()->user()->merchant_id))
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}
