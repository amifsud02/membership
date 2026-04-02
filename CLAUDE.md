# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

MEMBRS is a membership/loyalty platform built with Laravel 12 and Filament v5. Organisations create membership plans that customers purchase via Stripe. Merchants belong to organisations and offer brands, outlets, and discounts redeemable by members.

## Commands

```bash
# Full project setup (install deps, generate key, migrate, build assets)
composer setup

# Development (runs server, queue, logs, and Vite concurrently)
composer dev

# Run tests
composer test                           # full suite
php artisan test --filter=TestName      # single test

# Lint PHP
./vendor/bin/pint                       # Laravel Pint (PSR-12 style)

# Build frontend assets
npm run build
npm run dev                             # Vite dev server only
```

## Architecture

### Multi-Panel Filament App

Four Filament panels, each at its own path with role-gated access (`User::canAccessPanel`):

| Panel | Path | Role | Namespace |
|-------|------|------|-----------|
| Admin | `/admin` | `super_admin` (any role can access) | `App\Filament\Resources` |
| Organisation | `/organisation` | `organisation` | `App\Filament\Organisation` |
| Merchant | `/merchant` | `merchant` | `App\Filament\Merchant` |
| Customer | `/customer` | `customer` | `App\Filament\Customer` |

Roles are defined in `App\Enums\UserRole`. The `/dashboard` route redirects users to their role-appropriate panel.

### Filament Resource Convention

Each resource is organized into subdirectories:
```
app/Filament/{Panel}/Resources/{Entity}/
├── {Entity}Resource.php      # resource definition
├── Pages/                    # Create, Edit, List pages
├── Schemas/                  # form schemas
└── Tables/                   # table definitions
```

### Domain Model

- **Organisation** has many Merchants, MembershipPlans, Transactions
- **Merchant** belongs to Organisation; has many Brands, Discounts
- **Brand** belongs to Merchant; has many Outlets
- **User** belongs to Organisation or Merchant (via `organisation_id`/`merchant_id`)
- **Transaction** records Stripe payments; tracks `amount` and `transaction_fee` (percentage from Organisation's `transaction_fee` field)
- **Redemption** tracks discount usage by customers

### Middleware

- `EnsureAccountIsApproved` — applied to Merchant and Organisation panels (organisations/merchants have a `status` field)
- `RedirectIfNotAdmin` — guards the Admin panel

### Payments

Stripe Checkout integration in `StripeController`. Webhook at `/webhooks/stripe` handles `checkout.session.completed` events to create Transaction records.

### Public Pages

- `/organisations` — list approved organisations
- `/organisations/{organisation}` — show org with membership plans
- `/merchants` — list approved merchants
- `/p/{slug}` — CMS pages (Page model)
- `/login` redirects to `/admin/login`

### Testing

Uses Pest with SQLite in-memory database (configured in `phpunit.xml`). Tests are in `tests/Feature` and `tests/Unit`.

### Seeding

`php artisan db:seed` runs `DemoSeeder` for development data.
