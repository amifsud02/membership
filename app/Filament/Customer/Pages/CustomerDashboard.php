<?php

namespace App\Filament\Customer\Pages;

class CustomerDashboard extends \Filament\Pages\Dashboard
{
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-home';
    protected string $view = 'dashboard';
}
