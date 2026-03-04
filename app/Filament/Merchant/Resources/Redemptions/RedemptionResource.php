<?php

namespace App\Filament\Merchant\Resources\Redemptions;

use App\Models\Redemption;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RedemptionResource extends Resource
{
    protected static ?string $model = Redemption::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTicket;
    protected static ?string $navigationLabel = 'Discount Claims';
    protected static ?string $modelLabel = 'Discount Redemption';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Redemption::query()->where('merchant_id', auth()->user()->merchant_id))
            ->columns([
                TextColumn::make('created_at')
                    ->label('Redeemed At')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Member')
                    ->searchable(),
                TextColumn::make('discount.name')
                    ->label('Discount Applied')
                    ->sortable(),
                TextColumn::make('organisation.name')
                    ->label('Member Organisation')
                    ->sortable(),
                TextColumn::make('outlet.name')
                    ->label('Redeemed At Outlet')
                    ->placeholder('General Merchant Scope'),
                TextColumn::make('amount_discounted')
                    ->money('USD')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRedemptions::route('/'),
        ];
    }
}
