<?php

namespace App\Filament\Customer\Pages;

use Filament\Pages\Page;

class Home extends Page
{
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-home';

    protected string $view = 'filament.customer.pages.home';

    protected static ?string $title = 'Dashboard';

    protected static ?string $navigationLabel = 'Dashboard';

    protected static ?int $navigationSort = -1;

    public function getHeaderWidgets(): array
    {
        return [];
    }

    public function getFooterWidgets(): array
    {
        return [];
    }
}
