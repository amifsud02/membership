<?php

namespace App\Filament\Organisation\Pages;

use App\Models\Transaction;
use App\Models\MembershipPlan;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use BackedEnum;
use Filament\Support\Icons\Heroicon;

class SalesHistory extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationLabel = 'Sales History';
    protected static ?string $title = 'Sales & Transaction History';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartBar;
    protected static ?int $navigationSort = 10;

    protected string $view = 'filament.organisation.pages.sales-history';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Transaction::query()
                    ->where('organisation_id', auth()->user()->organisation_id)
                    ->with(['user', 'membershipPlan'])
            )
            ->columns([
                Tables\Columns\ImageColumn::make('membershipPlan.branding_logo')
                    ->label('Plan Logo')
                    ->disk('public')
                    ->size(32)
                    ->square()
                    ->placeholder('None'),
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Transaction Date')
                    ->dateTime('M d, Y H:i')
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Customer')
                    ->searchable(),
                TextColumn::make('user.email')
                    ->label('Email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('membershipPlan.name')
                    ->label('Plan'),
                TextColumn::make('membershipPlan.tier')
                    ->label('Tier')
                    ->badge()
                    ->color(fn(?string $state): string => match (strtolower($state ?? '')) {
                        'gold' => 'warning',
                        'silver' => 'gray',
                        'platinum' => 'info',
                        default => 'primary',
                    }),
                TextColumn::make('amount')
                    ->money('USD')
                    ->sortable(),
                TextColumn::make('transaction_fee')
                    ->label('Platform Fee')
                    ->money('USD'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'completed' => 'success',
                        'failed' => 'danger',
                        'refunded' => 'info',
                        default => 'gray',
                    }),
                TextColumn::make('stripe_session_id')
                    ->label('Stripe Session')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->copyable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                        'refunded' => 'Refunded',
                    ]),
                Tables\Filters\SelectFilter::make('membership_plan_id')
                    ->label('Membership Plan')
                    ->options(fn() => MembershipPlan::where('organisation_id', auth()->user()->organisation_id)
                        ->pluck('name', 'id')
                        ->toArray()),
            ]);
    }
}
