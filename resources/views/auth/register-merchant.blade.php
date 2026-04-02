<x-guest-layout>

    <div class="mb-8">
        <div class="inline-flex items-center justify-center w-11 h-11 rounded-xl bg-amber-100 mb-4">
            <svg class="w-5 h-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
            </svg>
        </div>
        <h2 class="text-3xl font-bold text-dark mb-2 font-heading">Register as Merchant</h2>
        <p class="text-muted text-sm">List your business and start accepting members.</p>
    </div>

    @if (session('status'))
        <div class="mb-4 p-4 rounded-2xl bg-amber-50 text-amber-700 text-sm font-semibold border border-amber-100">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('register.merchant') }}" class="space-y-4">
        @csrf

        <div class="space-y-1.5">
            <label for="name" class="text-xs font-semibold text-muted uppercase tracking-wider">Your Full Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                class="block w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none text-sm font-medium text-dark placeholder:text-gray-400"
                placeholder="Jane Smith">
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <div class="space-y-1.5">
            <label for="business_name" class="text-xs font-semibold text-muted uppercase tracking-wider">Business / Brand Name</label>
            <input id="business_name" type="text" name="business_name" value="{{ old('business_name') }}" required
                class="block w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none text-sm font-medium text-dark placeholder:text-gray-400"
                placeholder="e.g. The Coffee Shop">
            <x-input-error :messages="$errors->get('business_name')" class="mt-1" />
        </div>

        <div class="space-y-1.5">
            <label for="email" class="text-xs font-semibold text-muted uppercase tracking-wider">Business Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                class="block w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none text-sm font-medium text-dark placeholder:text-gray-400"
                placeholder="hello@yourbusiness.com">
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

        <div class="flex gap-3 p-4 rounded-2xl bg-blue-50 border border-blue-100">
            <svg class="w-5 h-5 text-blue-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
            </svg>
            <p class="text-xs text-blue-700 font-medium leading-relaxed">
                Your merchant account will be reviewed and approved by an admin. Once approved, you can set up your outlets and discounts.
            </p>
        </div>

        <button type="submit"
            class="w-full py-4 bg-amber-500 text-white font-bold rounded-2xl hover:bg-amber-600 transition-all text-sm tracking-wide uppercase">
            Create Merchant Account
            <svg class="w-4 h-4 ml-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </button>

        <p class="text-center text-sm text-muted pt-2">
            Already have an account?
            <a href="{{ route('login') }}" class="font-semibold text-amber-600 hover:underline">Sign in</a>
            &middot;
            Registering as an organisation?
            <a href="{{ route('register.organisation') }}" class="font-semibold text-emerald-600 hover:underline">Organisation sign-up</a>
        </p>
    </form>

</x-guest-layout>
