<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organisation;
use App\Models\Merchant;
use App\Models\MembershipPlan;
use App\Models\Brand;
use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Hash;

class InitialDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Default Admin
        User::updateOrCreate(
            ['email' => 'admin@membrs.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'role' => UserRole::SUPER_ADMIN,
            ]
        );

        // 2. Create Sample Organisation
        $org = Organisation::updateOrCreate(
            ['email' => 'contact@eliteclub.com'],
            [
                'name' => 'Elite Club',
                'approved' => true,
                'transaction_fee' => 10.00,
            ]
        );

        // 3. Create Org Admin User
        User::updateOrCreate(
            ['email' => 'admin@eliteclub.com'],
            [
                'name' => 'Elite Admin',
                'password' => Hash::make('password'),
                'role' => UserRole::ORGANISATION,
                'organisation_id' => $org->id,
            ]
        );

        // 4. Create Membership Plans
        $gold = MembershipPlan::updateOrCreate(
            ['name' => 'Gold Pass', 'organisation_id' => $org->id],
            [
                'price' => 99.00,
                'tier' => 'Gold',
                'benefits_text' => '<li>Access to all club facilities</li><li>10% discount on all merchants</li>',
                'branding_logo' => 'membership-logos/logo.webp',
                'branding_colors' => ['primary' => '#f59e0b', 'secondary' => '#92400e'],
            ]
        );

        $platinum = MembershipPlan::updateOrCreate(
            ['name' => 'Platinum Elite', 'organisation_id' => $org->id],
            [
                'price' => 199.00,
                'tier' => 'Platinum',
                'benefits_text' => '<li>24/7 VIP Access</li><li>25% discount on all merchants</li><li>Private Lounge Access</li>',
                'branding_logo' => 'membership-logos/logo.webp',
                'branding_colors' => ['primary' => '#4f46e5', 'secondary' => '#312e81'],
            ]
        );

        // 5. Create Sample Merchant
        $merchant = Merchant::updateOrCreate(
            ['email' => 'manager@luxuryretail.com'],
            [
                'name' => 'Luxury Retail Co',
                'organisation_id' => $org->id,
                'approved' => true,
            ]
        );

        // 6. Create Merchant User
        User::updateOrCreate(
            ['email' => 'admin@luxuryretail.com'],
            [
                'name' => 'Merchant Admin',
                'password' => Hash::make('password'),
                'role' => UserRole::MERCHANT,
                'merchant_id' => $merchant->id,
                'organisation_id' => $org->id,
            ]
        );

        // 7. Create Brand
        Brand::updateOrCreate(
            ['name' => 'Aura Luxury', 'merchant_id' => $merchant->id],
            [
                'organisation_id' => $org->id,
            ]
        );
    }
}
