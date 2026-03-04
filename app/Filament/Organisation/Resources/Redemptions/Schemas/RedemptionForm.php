<?php

namespace App\Filament\Organisation\Resources\Redemptions\Schemas;

use App\Models\Discount;
use App\Models\Merchant;
use App\Models\Outlet;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

class RedemptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Redemption Information')
                    ->description('Manually record a discount redemption for a member.')
                    ->icon('heroicon-o-ticket')
                    ->schema([
                        Select::make('user_id')
                            ->label('Member / Customer')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('merchant_id')
                            ->label('Merchant')
                            ->relationship('merchant', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live(),

                        Select::make('discount_id')
                            ->label('Discount / Benefit')
                            ->options(
                                fn($get) => $get('merchant_id')
                                ? Discount::where('merchant_id', $get('merchant_id'))->pluck('name', 'id')
                                : Discount::pluck('name', 'id')
                            )
                            ->searchable()
                            ->required(),

                        Select::make('outlet_id')
                            ->label('Outlet')
                            ->options(
                                fn($get) => $get('merchant_id')
                                ? Outlet::whereHas('brand', fn($q) => $q->where('merchant_id', $get('merchant_id')))->pluck('name', 'id')
                                : []
                            )
                            ->placeholder('Select an outlet (optional)')
                            ->searchable(),

                        TextInput::make('amount_discounted')
                            ->label('Amount Discounted')
                            ->numeric()
                            ->prefix('$')
                            ->required()
                            ->default(0),

                    ])->columns(2),
            ]);
    }
}
