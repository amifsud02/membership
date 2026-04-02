<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    // ─────────────────────────────────────────
    // Generic / Customer registration
    // ─────────────────────────────────────────

    public function create(): View
    {
        return view('auth.register');
    }

    public function createCustomer(): View
    {
        return view('auth.register-customer');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:customer,organisation,merchant'],
            'business_name' => ['required_if:role,organisation,merchant', 'nullable', 'string', 'max:255'],
        ]);

        $role = $request->role;
        $organisationId = null;
        $merchantId = null;

        if ($role === 'organisation') {
            $organisation = \App\Models\Organisation::create([
                'name' => $request->business_name,
                'email' => $request->email,
                'status' => 'pending',
                'transaction_fee' => 10,
            ]);
            $organisationId = $organisation->id;
            $role = \App\Enums\UserRole::ORGANISATION;
        } elseif ($role === 'merchant') {
            $merchant = \App\Models\Merchant::create([
                'name' => $request->business_name,
                'email' => $request->email,
                'status' => 'pending',
            ]);
            $merchantId = $merchant->id;
            $role = \App\Enums\UserRole::MERCHANT;
        } else {
            $role = \App\Enums\UserRole::CUSTOMER;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
            'organisation_id' => $organisationId,
            'merchant_id' => $merchantId,
        ]);

        event(new Registered($user));

        return redirect()->route('login')->with('status', 'Registration successful! Please log in with your credentials.');
    }

    // ─────────────────────────────────────────
    // Organisation registration
    // ─────────────────────────────────────────

    public function createOrganisation(): View
    {
        return view('auth.register-organisation');
    }

    public function storeOrganisation(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'organisation_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['nullable', 'string', 'max:30'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $organisation = \App\Models\Organisation::create([
            'name' => $request->organisation_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => 'pending',
            'transaction_fee' => 10,
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => \App\Enums\UserRole::ORGANISATION,
            'organisation_id' => $organisation->id,
        ]);

        event(new Registered($user));

        return redirect()->route('login')->with('status', 'Registration successful! Please log in with your credentials.');
    }

    // ─────────────────────────────────────────
    // Merchant registration
    // ─────────────────────────────────────────

    public function createMerchant(): View
    {
        return view('auth.register-merchant');
    }

    public function storeMerchant(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'business_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['nullable', 'string', 'max:30'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $merchant = \App\Models\Merchant::create([
            'name' => $request->business_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => 'pending',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => \App\Enums\UserRole::MERCHANT,
            'merchant_id' => $merchant->id,
        ]);

        event(new Registered($user));

        return redirect()->route('login')->with('status', 'Registration successful! Please log in with your credentials.');
    }
}
