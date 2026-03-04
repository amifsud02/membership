<?php

namespace App\Filament\Merchant\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\Brand;
use App\Models\Outlet;
use App\Models\Discount;

class MerchantStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $merchantId = auth()->user()->merchant_id;

        return [
            Stat::make('Total Brands', (string) Brand::where('merchant_id', $merchantId)->count()),
            Stat::make('Total Outlets', (string) Outlet::whereHas('brand', fn ($q) => $q->where('merchant_id', $merchantId))->count()),
            Stat::make('Total Discounts', (string) Discount::where('merchant_id', $merchantId)->count()),
            Stat::make('Discount Usage', '0') // Placeholder for Phase 1
                ->description('Coming in Phase 2')
                ->descriptionIcon('heroicon-m-chart-bar'),
        ];
    }
}
