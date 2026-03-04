<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\Organisation;
use App\Models\Merchant;
use App\Models\User;
use App\Enums\UserRole;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Organisations', (string) Organisation::count()),
            Stat::make('Total Merchants', (string) Merchant::count()),
            Stat::make('Total Customers', (string) User::where('role', UserRole::CUSTOMER)->count()),
        ];
    }
}
