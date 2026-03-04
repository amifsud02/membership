<?php

namespace App\Filament\Merchant\Resources\Discounts\Pages;

use App\Filament\Merchant\Resources\Discounts\DiscountResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDiscount extends CreateRecord
{
    protected static string $resource = DiscountResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['merchant_id'] = auth()->user()->merchant_id;

        return $data;
    }
}
