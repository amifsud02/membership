<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Organisation;
use App\Models\Merchant;
use App\Models\MembershipPlan;
use App\Models\Brand;
use App\Models\Outlet;
use App\Models\Discount;
use App\Models\Transaction;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Hash;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Super Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@platform.com',
            'password' => Hash::make('password'),
            'role' => UserRole::SUPER_ADMIN,
        ]);

        // 2. Organisations
        $org1 = Organisation::create([
            'name' => 'Premium Fitness Hub',
            'email' => 'contact@fit-hub.com',
            'status' => 'approved',
            'transaction_fee' => 10.00,
        ]);

        $org2 = Organisation::create([
            'name' => 'Luxury Lifestyle Collective',
            'email' => 'hello@luxury-life.com',
            'status' => 'approved',
            'transaction_fee' => 12.50,
        ]);

        // 3. Organisation Users
        User::create([
            'name' => 'Fitness Org Admin',
            'email' => 'org1@platform.com',
            'password' => Hash::make('password'),
            'role' => UserRole::ORGANISATION,
            'organisation_id' => $org1->id,
        ]);

        // 4. Membership Plans
        $plan1 = MembershipPlan::create([
            'name' => 'Gold Membership',
            'tier' => 'Gold',
            'price' => 99.99,
            'benefits_text' => '<ul><li>Free Gym Access</li><li>Personal Trainer</li><li>Pool Access</li></ul>',
            'organisation_id' => $org1->id,
            'branding_colors' => ['primary' => '#FFD700', 'secondary' => '#000000'],
        ]);

        $plan2 = MembershipPlan::create([
            'name' => 'Silver Membership',
            'tier' => 'Silver',
            'price' => 49.99,
            'benefits_text' => '<ul><li>Gym Access</li><li>Sauna Access</li></ul>',
            'organisation_id' => $org1->id,
            'branding_colors' => ['primary' => '#C0C0C0', 'secondary' => '#333333'],
        ]);

        // 5. Merchants
        $merchant1 = Merchant::create([
            'name' => 'Healthy Bites cafe',
            'email' => 'orders@healthybites.com',
            'organisation_id' => $org1->id,
            'status' => 'approved'
        ]);

        User::create([
            'name' => 'Merchant Admin',
            'email' => 'merchant@platform.com',
            'password' => Hash::make('password'),
            'role' => UserRole::MERCHANT,
            'merchant_id' => $merchant1->id,
        ]);

        // 6. Brands & Outlets
        $brand1 = Brand::create([
            'name' => 'Healthy Bites',
            'organisation_id' => $org1->id,
            'merchant_id' => $merchant1->id,
        ]);

        Outlet::create(['name' => 'Downtown Branch', 'brand_id' => $brand1->id]);
        $outlet2 = Outlet::create(['name' => 'Westside Mall', 'brand_id' => $brand1->id]);

        // 7. Discounts
        Discount::create([
            'name' => 'Fitness Member Special',
            'amount' => 15.00, // 15% off
            'applied_globally' => true,
            'organisation_id' => $org1->id,
            'merchant_id' => $merchant1->id,
        ]);

        Discount::create([
            'name' => 'Branch Opening Offer',
            'amount' => 20.00,
            'applied_globally' => false,
            'brand_id' => $brand1->id,
            'outlet_id' => $outlet2->id,
            'merchant_id' => $merchant1->id,
        ]);

        // 8. Customers & Transactions
        $customer = User::create([
            'name' => 'John Doe',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'role' => UserRole::CUSTOMER,
        ]);

        Transaction::create([
            'user_id' => $customer->id,
            'membership_plan_id' => $plan1->id,
            'organisation_id' => $org1->id,
            'amount' => 99.99,
            'transaction_fee' => 10.00,
            'status' => 'completed',
            'stripe_session_id' => 'cs_test_mock_123',
        ]);

        Transaction::create([
            'user_id' => $customer->id,
            'membership_plan_id' => $plan2->id,
            'organisation_id' => $org1->id,
            'amount' => 49.99,
            'transaction_fee' => 5.00,
            'status' => 'completed',
            'stripe_session_id' => 'cs_test_mock_456',
        ]);
    }
}
