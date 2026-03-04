<?php

namespace App\Filament\Organisation\Resources\Transactions\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('membershipPlan.branding_logo')
                    ->label('Plan Logo')
                    ->disk('public')
                    ->size(32)
                    ->square()
                    ->placeholder('None'),
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('M d, Y H:i')
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.email')
                    ->label('Email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('membershipPlan.name')
                    ->label('Plan')
                    ->badge()
                    ->color('primary'),
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
                    ->label('Stripe ID')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->copyable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                        'refunded' => 'Refunded',
                    ]),
            ]);
    }
}
