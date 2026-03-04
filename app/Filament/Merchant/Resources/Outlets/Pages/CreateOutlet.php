<?php

namespace App\Filament\Merchant\Resources\Outlets\Pages;

use App\Filament\Merchant\Resources\Outlets\OutletResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOutlet extends CreateRecord
{
    protected static string $resource = OutletResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
