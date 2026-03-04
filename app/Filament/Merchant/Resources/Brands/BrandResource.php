<?php

namespace App\Filament\Merchant\Resources\Brands;

use App\Filament\Merchant\Resources\Brands\Pages\CreateBrand;
use App\Filament\Merchant\Resources\Brands\Pages\EditBrand;
use App\Filament\Merchant\Resources\Brands\Pages\ListBrands;
use App\Filament\Merchant\Resources\Brands\Schemas\BrandForm;
use App\Filament\Merchant\Resources\Brands\Tables\BrandsTable;
use App\Models\Brand;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return BrandForm::configure($schema);
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()
            ->where('merchant_id', auth()->user()->merchant_id);
    }

    public static function table(Table $table): Table
    {
        return BrandsTable::configure($table);
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
            'index' => ListBrands::route('/'),
            'create' => CreateBrand::route('/create'),
            'edit' => EditBrand::route('/{record}/edit'),
        ];
    }
}
