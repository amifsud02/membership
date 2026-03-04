<?php

namespace App\Filament\Organisation\Resources\Redemptions\Pages;

use App\Filament\Organisation\Resources\Redemptions\RedemptionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRedemptions extends ListRecords
{
    protected static string $resource = RedemptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    $data['organisation_id'] = auth()->user()->organisation_id;
                    return $data;
                }),
        ];
    }
}
