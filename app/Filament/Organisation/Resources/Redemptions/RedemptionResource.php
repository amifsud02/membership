<?php

namespace App\Filament\Organisation\Resources\Redemptions;

use App\Filament\Organisation\Resources\Redemptions\Pages\CreateRedemption;
use App\Filament\Organisation\Resources\Redemptions\Pages\EditRedemption;
use App\Filament\Organisation\Resources\Redemptions\Pages\ListRedemptions;
use App\Filament\Organisation\Resources\Redemptions\Schemas\RedemptionForm;
use App\Filament\Organisation\Resources\Redemptions\Tables\RedemptionsTable;
use App\Models\Redemption;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RedemptionResource extends Resource
{
    protected static ?string $model = Redemption::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTicket;
    protected static ?string $navigationLabel = 'Discount Usage Stats';
    protected static ?string $modelLabel = 'Discount Redemption';

    public static function canCreate(): bool
    {
        return true;
    }

    public static function form(Schema $schema): Schema
    {
        return RedemptionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Redemption::query()->where('organisation_id', auth()->user()->organisation_id))
            ->columns([
                TextColumn::make('created_at')
                    ->label('Redeemed At')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Member')
                    ->searchable(),
                TextColumn::make('discount.name')
                    ->label('Benefit/Discount')
                    ->sortable(),
                TextColumn::make('merchant.name')
                    ->label('Merchant')
                    ->sortable(),
                TextColumn::make('outlet.name')
                    ->label('Outlet')
                    ->placeholder('Global Redemption'),
                TextColumn::make('amount_discounted')
                    ->money('USD')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRedemptions::route('/'),
        ];
    }
}
