<?php

namespace App\Filament\Merchant\Resources\Brands\Pages;

use App\Filament\Merchant\Resources\Brands\BrandResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBrand extends CreateRecord
{
    protected static string $resource = BrandResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['merchant_id'] = auth()->user()->merchant_id;
        $data['organisation_id'] = auth()->user()->organisation_id;

        return $data;
    }
}
