<?php

namespace App\Filament\Organisation\Resources\MembershipPlans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MembershipPlansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('branding_logo')
                    ->label('Logo')
                    ->disk(fn ($state) => str_starts_with($state ?? '', 'http') ? null : 'public')
                    ->size(40)
                    ->square()
                    ->placeholder('No Logo'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('tier')
                    ->searchable()
                    ->badge()
                    ->color(fn(?string $state): string => match (strtolower($state ?? '')) {
                        'gold' => 'warning',
                        'silver' => 'gray',
                        'platinum' => 'info',
                        'bronze' => 'danger',
                        default => 'primary',
                    }),
                TextColumn::make('price')
                    ->money('USD')
                    ->sortable(),
                TextColumn::make('benefits_text')
                    ->label('Benefits')
                    ->html()
                    ->limit(80)
                    ->tooltip(fn($record) => strip_tags($record->benefits_text ?? '')),
                TextColumn::make('transactions_count')
                    ->label('Sales')
                    ->counts('transactions')
                    ->sortable()
                    ->badge()
                    ->color('success'),
                TextColumn::make('created_at')
                    ->formatStateUsing(fn($state) => $state?->format('Y-m-d H:i'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->formatStateUsing(fn($state) => $state?->format('Y-m-d H:i'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
