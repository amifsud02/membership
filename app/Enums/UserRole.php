<?php

namespace App\Enums;

enum UserRole: string
{
    case SUPER_ADMIN = 'super_admin';
    case ORGANISATION = 'organisation';
    case MERCHANT = 'merchant';
    case CUSTOMER = 'customer';

    public function getLabel(): string
    {
        return match ($this) {
            self::SUPER_ADMIN => 'Super Admin',
            self::ORGANISATION => 'Organisation',
            self::MERCHANT => 'Merchant',
            self::CUSTOMER => 'Customer',
        };
    }
}
