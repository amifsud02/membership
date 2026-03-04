<?php

namespace App\Filament\Merchant\Resources\Discounts;

use App\Filament\Merchant\Resources\Discounts\Pages\CreateDiscount;
use App\Filament\Merchant\Resources\Discounts\Pages\EditDiscount;
use App\Filament\Merchant\Resources\Discounts\Pages\ListDiscounts;
use App\Filament\Merchant\Resources\Discounts\Schemas\DiscountForm;
use App\Filament\Merchant\Resources\Discounts\Tables\DiscountsTable;
use App\Models\Discount;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DiscountResource extends Resource
{
    protected static ?string $model = Discount::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return DiscountForm::configure($schema);
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()
            ->where('merchant_id', auth()->user()->merchant_id);
    }

    public static function table(Table $table): Table
    {
        return DiscountsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDiscounts::route('/'),
            'create' => CreateDiscount::route('/create'),
            'edit' => EditDiscount::route('/{record}/edit'),
        ];
    }
}
