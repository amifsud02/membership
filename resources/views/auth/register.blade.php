<x-guest-layout>

    <div class="mb-10 text-center">
        <h2 class="text-3xl font-black text-slate-900 mb-2">Join MEMBRS</h2>
        <p class="text-slate-400 font-medium">Choose how you'd like to get started.</p>
    </div>

    <div class="space-y-4">

        {{-- Customer --}}
        <a href="{{ route('register') }}?role=customer"
            class="group flex items-center gap-5 p-5 rounded-2xl border border-slate-100 bg-slate-50 hover:border-indigo-300 hover:bg-indigo-50/60 transition-all">
            <div
                class="flex-shrink-0 w-12 h-12 rounded-xl bg-indigo-100 flex items-center justify-center group-hover:bg-indigo-200 transition-colors">
                <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <div class="flex-1">
                <p class="font-black text-slate-900 text-base">Customer</p>
                <p class="text-slate-400 text-sm font-medium">Access exclusive member benefits &amp; discounts</p>
            </div>
            <svg class="w-5 h-5 text-slate-300 group-hover:text-indigo-400 transition-colors" fill="none"
                viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </a>

        {{-- Organisation --}}
        <a href="{{ route('register.organisation') }}"
            class="group flex items-center gap-5 p-5 rounded-2xl border border-slate-100 bg-slate-50 hover:border-emerald-300 hover:bg-emerald-50/60 transition-all">
            <div
                class="flex-shrink-0 w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center group-hover:bg-emerald-200 transition-colors">
                <svg class="w-6 h-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                </svg>
            </div>
            <div class="flex-1">
                <p class="font-black text-slate-900 text-base">Organisation / Partnership</p>
                <p class="text-slate-400 text-sm font-medium">Offer membership plans &amp; manage members</p>
            </div>
            <svg class="w-5 h-5 text-slate-300 group-hover:text-emerald-400 transition-colors" fill="none"
                viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </a>

        {{-- Merchant --}}
        <a href="{{ route('register.merchant') }}"
            class="group flex items-center gap-5 p-5 rounded-2xl border border-slate-100 bg-slate-50 hover:border-amber-300 hover:bg-amber-50/60 transition-all">
            <div
                class="flex-shrink-0 w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center group-hover:bg-amber-200 transition-colors">
                <svg class="w-6 h-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                </svg>
            </div>
            <div class="flex-1">
                <p class="font-black text-slate-900 text-base">Merchant</p>
                <p class="text-slate-400 text-sm font-medium">List your business &amp; offer member discounts</p>
            </div>
            <svg class="w-5 h-5 text-slate-300 group-hover:text-amber-400 transition-colors" fill="none"
                viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </a>

    </div>

    <p class="text-center text-sm font-bold text-slate-400 mt-8">
        Already have an account?
        <a href="{{ route('login') }}" class="text-primary hover:underline">Sign in instead</a>
    </p>

</x-guest-layout>