<x-guest-layout>

    <div class="mb-8">
        <div class="inline-flex items-center justify-center w-11 h-11 rounded-xl bg-emerald-100 mb-4">
            <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
            </svg>
        </div>
        <h2 class="text-3xl font-bold text-dark mb-2 font-heading">Register Organisation</h2>
        <p class="text-muted text-sm">Create your partner organisation account.</p>
    </div>

    @if (session('status'))
        <div class="mb-4 p-4 rounded-2xl bg-emerald-50 text-emerald-700 text-sm font-semibold border border-emerald-100">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('register.organisation') }}" class="space-y-4">
        @csrf

        <div class="space-y-1.5">
            <label for="name" class="text-xs font-semibold text-muted uppercase tracking-wider">Your Full Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                class="block w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none text-sm font-medium text-dark placeholder:text-gray-400"
                placeholder="John Doe">
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <div class="space-y-1.5">
            <label for="organisation_name" class="text-xs font-semibold text-muted uppercase tracking-wider">Organisation Name</label>
            <input id="organisation_name" type="text" name="organisation_name" value="{{ old('organisation_name') }}" required
                class="block w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none text-sm font-medium text-dark placeholder:text-gray-400"
                placeholder="e.g. Acme Corp">
            <x-input-error :messages="$errors->get('organisation_name')" class="mt-1" />
        </div>

        <div class="space-y-1.5">
            <label for="email" class="text-xs font-semibold text-muted uppercase tracking-wider">Business Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                class="block w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none text-sm font-medium text-dark placeholder:text-gray-400"
                placeholder="contact@yourorg.com">
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <div class="space-y-1.5">
            <label for="phone" class="text-xs font-semibold text-muted uppercase tracking-wider">Phone <span class="normal-case font-normal text-gray-400">(optional)</span></label>
            <input id="phone" type="tel" name="phone" value="{{ old('phone') }}"
                class="block w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none text-sm font-medium text-dark placeholder:text-gray-400"
                placeholder="+44 7700 900000">
            <x-input-error :messages="$errors->get('phone')" class="mt-1" />
        </div>

        <div class="space-y-1.5">
            <label for="password" class="text-xs font-semibold text-muted uppercase tracking-wider">Password</label>
            <input id="password" type="password" name="password" required
                class="block w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none text-sm font-medium text-dark placeholder:text-gray-400"
                placeholder="Minimum 8 characters">
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <div class="space-y-1.5">
            <label for="password_confirmation" class="text-xs font-semibold text-muted uppercase tracking-wider">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                class="block w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none text-sm font-medium text-dark placeholder:text-gray-400"
                placeholder="Repeat password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <div class="flex gap-3 p-4 rounded-2xl bg-amber-50 border border-amber-100">
            <svg class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
            </svg>
            <p class="text-xs text-amber-700 font-medium leading-relaxed">
                Your organisation account will be reviewed by an admin before you can access the full panel. You'll be notified once approved.
            </p>
        </div>

        <button type="submit"
            class="w-full py-4 bg-emerald-600 text-white font-bold rounded-2xl hover:bg-emerald-700 transition-all text-sm tracking-wide uppercase">
            Create Organisation Account
            <svg class="w-4 h-4 ml-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </button>

        <p class="text-center text-sm text-muted pt-2">
            Already have an account?
            <a href="{{ route('login') }}" class="font-semibold text-emerald-600 hover:underline">Sign in</a>
            &middot;
            Registering as a merchant?
            <a href="{{ route('register.merchant') }}" class="font-semibold text-amber-600 hover:underline">Merchant sign-up</a>
        </p>
    </form>

</x-guest-layout>
