<?php

namespace App\Filament\Organisation\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\MembershipPlan;
use App\Models\Transaction;

class OrganisationStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $organisationId = auth()->user()->organisation_id;

        $totalPlans = MembershipPlan::where('organisation_id', $organisationId)->count();
        $totalSales = Transaction::where('organisation_id', $organisationId)
            ->where('status', 'completed')
            ->count();
        $totalRevenue = Transaction::where('organisation_id', $organisationId)
            ->where('status', 'completed')
            ->sum('amount');
        $totalFees = Transaction::where('organisation_id', $organisationId)
            ->where('status', 'completed')
            ->sum('transaction_fee');

        return [
            Stat::make('Membership Plans', (string) $totalPlans)
                ->description('Active plans')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->color('primary'),
            Stat::make('Total Sales', (string) $totalSales)
                ->description('Completed transactions')
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('success'),
            Stat::make('Total Revenue', '$' . number_format($totalRevenue, 2))
                ->description('Gross revenue')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),
            Stat::make('Transaction Fees', '$' . number_format($totalFees, 2))
                ->description('Platform fees paid')
                ->descriptionIcon('heroicon-m-receipt-percent')
                ->color('warning'),
        ];
    }
}
