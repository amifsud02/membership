<?php

namespace App\Filament\Merchant\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Brand;
use App\Models\Outlet;
use App\Models\Discount;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $merchantId = auth()->user()->merchant_id;

        return [
            Stat::make('Total Brands', Brand::where('merchant_id', $merchantId)->count()),
            Stat::make('Total Outlets', Outlet::whereHas('brand', fn($q) => $q->where('merchant_id', $merchantId))->count()),
            Stat::make('Active Discounts', Discount::where('merchant_id', $merchantId)->count()),
        ];
    }
}
