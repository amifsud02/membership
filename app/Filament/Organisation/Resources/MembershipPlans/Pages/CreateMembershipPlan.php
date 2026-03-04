<?php

namespace App\Filament\Organisation\Resources\MembershipPlans\Pages;

use App\Filament\Organisation\Resources\MembershipPlans\MembershipPlanResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMembershipPlan extends CreateRecord
{
    protected static string $resource = MembershipPlanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['organisation_id'] = auth()->user()->organisation_id;

        return $data;
    }
}
