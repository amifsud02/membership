<x-filament-panels::page>
    <!-- Temporary Tailwind CDN (Preflight Disabled) to avoid Filament CSS conflicts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            corePlugins: { preflight: false }
        }
    </script>
    <div class="space-y-12 pb-24">
        @if(request()->has('payment') && request()->get('payment') === 'success')
            <div
                class="bg-emerald-600 rounded-[32px] p-8 text-white relative overflow-hidden shadow-2xl shadow-emerald-200 animate-in fade-in slide-in-from-top-4 duration-700">
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2">
                </div>
                <div class="relative z-10 flex items-center gap-6">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center shrink-0">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-black mb-1">Payment Successful! 🎉</h2>
                        <p class="text-emerald-50 font-medium">Your new membership has been activated and added to your
                            digital wallet below.</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Hero Welcome Section --}}
        <div
            class="relative bg-slate-900 rounded-[40px] p-8 md:p-12 overflow-hidden shadow-2xl shadow-slate-200 ring-1 ring-white/10">
            <div
                class="absolute top-0 right-0 w-[400px] h-[400px] bg-amber-500/20 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2">
            </div>
            <div
                class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-indigo-500/10 rounded-full blur-[80px] translate-y-1/2 -translate-x-1/2">
            </div>

            <div class="relative z-10">
                <div
                    class="inline-flex items-center px-4 py-2 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md mb-6 transition-all hover:bg-white/10">
                    <span class="w-2 h-2 bg-amber-500 rounded-full animate-pulse mr-2"></span>
                    <span class="text-white/60 text-xs font-black uppercase tracking-widest leading-none">Active Status:
                        Elite Member</span>
                </div>

                <h1 class="text-4xl md:text-6xl font-black text-white leading-tight mb-4 tracking-tighter">
                    Hello, <span class="text-amber-500">{{ explode(' ', auth()->user()->name)[0] }}!</span> 👋
                </h1>
                <p class="text-slate-400 text-lg max-w-xl leading-relaxed mb-4 font-medium">
                    Your active memberships unlock exclusive world-class benefits across all our partner locations.
                    Explore your dashboard to maximize your advantages.
                </p>

                @php
                    $activePlansCount = auth()->user()->transactions()->where('status', 'completed')->count();
                    $estSavings = $activePlansCount * 45; // Mock calculation: $45 per active plan
                    $tier = match (true) {
                        $activePlansCount >= 5 => 'PLATINUM',
                        $activePlansCount >= 2 => 'GOLD',
                        default => 'SILVER',
                    };
                    $tierColor = match ($tier) {
                        'PLATINUM' => 'text-indigo-400',
                        'GOLD' => 'text-amber-500',
                        default => 'text-slate-300',
                    };
                @endphp

                <div class="mt-12 flex flex-wrap gap-6">
                    <div
                        class="flex-1 min-w-[140px] bg-white/5 backdrop-blur-md border border-white/10 px-8 py-6 rounded-[32px] hover:bg-white/10 transition-all border-b-4 border-b-amber-500/30 group">
                        <div
                            class="text-white font-black text-3xl leading-none mb-2 group-hover:scale-110 transition-transform">
                            {{ $activePlansCount }}
                        </div>
                        <div class="text-slate-500 text-[10px] font-black uppercase tracking-widest">Active Plans</div>
                    </div>
                    <div
                        class="flex-1 min-w-[140px] bg-white/5 backdrop-blur-md border border-white/10 px-8 py-6 rounded-[32px] hover:bg-white/10 transition-all border-b-4 border-b-indigo-500/30 group">
                        <div
                            class="text-white font-black text-3xl leading-none mb-2 group-hover:scale-110 transition-transform">
                            ${{ number_format($estSavings, 2) }}</div>
                        <div class="text-slate-500 text-[10px] font-black uppercase tracking-widest">Est. Savings</div>
                    </div>
                    <div
                        class="flex-1 min-w-[140px] bg-white/5 backdrop-blur-md border border-white/10 px-8 py-6 rounded-[32px] hover:bg-white/10 transition-all border-b-4 border-b-emerald-500/30 group">
                        <div
                            class="{{ $tierColor }} font-black text-3xl leading-none mb-2 group-hover:scale-110 transition-transform">
                            {{ $tier }}
                        </div>
                        <div class="text-slate-500 text-[10px] font-black uppercase tracking-widest">Tier Level</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Digital Wallet Section --}}
        <div class="space-y-8">
            <div class="flex items-center justify-between px-2">
                <div>
                    <h2 class="text-3xl font-black text-slate-900 tracking-tight">Digital<span
                            class="text-amber-600">Wallet</span></h2>
                    <p class="text-slate-500 text-sm font-medium mt-1">Manage your active subscription cards and
                        benefits.</p>
                </div>
                <a href="{{ url('/organisations') }}"
                    class="inline-flex items-center px-6 py-3 rounded-2xl bg-white border border-slate-200 text-sm font-bold text-slate-600 hover:text-amber-600 hover:border-amber-600 hover:bg-amber-50 transition-all shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Memberships
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @php
                    $transactions = auth()->user()->transactions()->with(['membershipPlan', 'organisation'])->where('status', 'completed')->latest()->get();
                @endphp

                @forelse($transactions as $tx)
                    <div
                        class="bg-white rounded-[48px] shadow-xl shadow-slate-100 border border-slate-100 overflow-hidden flex flex-col md:flex-row group hover:shadow-2xl hover:shadow-amber-600/5 transition-all duration-500 transform hover:-translate-y-1">
                        <!-- Card UI -->
                        <div class="w-full md:w-64 p-8 flex flex-col justify-end relative overflow-hidden shrink-0"
                            style="background: linear-gradient(135deg, {{ $tx->membershipPlan->branding_colors['primary'] ?? '#1e293b' }}, {{ $tx->membershipPlan->branding_colors['secondary'] ?? '#0f172a' }})">
                            <div class="absolute inset-0 opacity-10">
                                <svg viewBox="0 0 200 200" class="w-full h-full">
                                    <path fill="#FFF"
                                        d="M40,-64.7C52.4,-58.5,63.4,-48.9,70.6,-37.1C77.7,-25.2,81,-11.1,81.1,3.1C81.2,17.2,78.2,31.4,70.4,43.2C62.6,55.1,50.1,64.6,36.5,70.9C22.9,77.3,8.2,80.4,-6,78.2C-20.2,76.1,-33.9,68.7,-46.5,59.3C-59.1,49.9,-70.6,38.6,-77.1,25.2C-83.6,11.8,-85.1,-3.6,-81.4,-17.7C-77.8,-31.8,-68.9,-44.6,-57.2,-52.1C-45.5,-59.6,-31,-61.8,-17.8,-65.3C-4.6,-68.8,7.3,-73.6,19.3,-72.4C31.3,-71.2,43.3,-64,40,-64.7Z"
                                        transform="translate(100 100)" />
                                </svg>
                            </div>
                            <div class="relative z-10">
                                @if($tx->membershipPlan->branding_logo)
                                    <div
                                        class="h-14 w-auto max-w-[180px] bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center p-3 mb-10 border border-white/20 shadow-lg shrink-0 overflow-hidden">
                                        <img src="{{ asset('storage/' . $tx->membershipPlan->branding_logo) }}" alt="Logo"
                                            class="max-h-full max-w-full object-contain filter brightness-0 invert">
                                    </div>
                                @else
                                    <div class="w-14 h-14 bg-white/10 rounded-2xl mb-10 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-white/40" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                @endif
                                <h4 class="text-white font-black text-2xl uppercase tracking-tighter leading-tight">
                                    {{ $tx->membershipPlan->name }}
                                </h4>
                                <p class="text-white/50 text-xs font-black uppercase tracking-[0.2em] mt-2">
                                    {{ $tx->organisation->name }}
                                </p>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex-1 p-10 flex flex-col justify-between bg-white relative">
                            <div>
                                <div class="flex justify-between items-start mb-8">
                                    <div>
                                        <span
                                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Membership
                                            Status</span>
                                        <div
                                            class="flex items-center space-x-2 bg-emerald-50 px-3 py-1.5 rounded-full border border-emerald-100">
                                            <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                                            <span class="text-xs font-black text-emerald-600 leading-none">ACTIVE &
                                                VERIFIED</span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span
                                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Purchase
                                            Value</span>
                                        <span
                                            class="text-xl font-black text-slate-900 tracking-tighter">${{ number_format($tx->amount, 2) }}</span>
                                    </div>
                                </div>
                                <div
                                    class="text-slate-500 text-sm leading-relaxed mb-10 line-clamp-3 bg-slate-50 p-4 rounded-2xl italic border border-slate-100 font-medium">
                                    "{!! strip_tags($tx->membershipPlan->benefits_text) !!}"
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <a href="{{ url('/organisations/' . $tx->organisation->id) }}"
                                    class="flex-1 inline-flex justify-center items-center py-4 bg-slate-900 text-white rounded-[24px] text-xs font-black hover:bg-amber-600 transition-all shadow-xl shadow-slate-200 hover:shadow-amber-600/20 active:scale-95 uppercase">
                                    ACCESS BENEFITS
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div
                        class="col-span-full py-20 text-center bg-white rounded-[48px] border-2 border-dashed border-slate-200 px-8">
                        <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <p class="text-slate-400 font-bold mb-8 italic text-lg">Your digital wallet is currently empty.</p>
                        <a href="{{ url('/organisations') }}"
                            class="px-10 py-5 bg-amber-600 text-white font-black rounded-3xl shadow-2xl shadow-amber-600/30 hover:scale-105 transition-all inline-block active:scale-95">
                            Explore Partners & Plans
                        </a>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Recommended Partners / Discovery Section --}}
        <div class="space-y-8">
            <div class="flex items-center justify-between px-2">
                <div>
                    <h2 class="text-3xl font-black text-slate-900 tracking-tight">Recommended <span
                            class="text-primary">Partners</span></h2>
                    <p class="text-slate-500 text-sm font-medium mt-1">New organisations recently joined our elite
                        network.</p>
                </div>
                <a href="{{ url('/organisations') }}"
                    class="text-sm font-bold text-slate-400 hover:text-primary transition-colors">View All</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $joinedOrgIds = auth()->user()->transactions()->where('status', 'completed')->pluck('organisation_id')->toArray();
                    $recommended = \App\Models\Organisation::where('status', 'approved')
                        ->whereNotIn('id', $joinedOrgIds)
                        ->latest()
                        ->take(3)
                        ->get();
                @endphp

                @forelse($recommended as $org)
                    @php
                        $cheapestPlan = $org->membershipPlans()->orderBy('price', 'asc')->first();
                    @endphp
                    <div
                        class="bg-white rounded-3xl p-8 border border-slate-100 shadow-xl shadow-slate-100/50 hover:shadow-2xl transition-all group flex flex-col justify-between">
                        <div>
                            <div
                                class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center mb-6 text-slate-400 group-hover:bg-primary/5 group-hover:text-primary transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">{{ $org->name }}</h3>
                            <p class="text-slate-500 text-sm mb-6 line-clamp-2">Exclusive partnership offering premium
                                membership plans with verified benefits.</p>
                        </div>

                        <div class="space-y-4">
                            @if($cheapestPlan)
                                <a href="{{ route('public.membership.purchase', $cheapestPlan) }}"
                                    class="w-full inline-flex items-center justify-center px-4 py-3 bg-slate-900 text-white text-xs font-black rounded-xl hover:bg-primary transition-all shadow-lg hover:shadow-primary/30">
                                    JOIN FROM ${{ number_format($cheapestPlan->price, 2) }}
                                </a>
                            @endif
                            <a href="{{ route('public.organisations.show', $org) }}"
                                class="w-full inline-flex items-center justify-center px-4 py-3 bg-slate-50 text-slate-500 text-xs font-black rounded-xl hover:bg-slate-100 transition-all">
                                VIEW ALL PLANS
                            </a>
                        </div>
                    </div>
                @empty
                    <div
                        class="col-span-full py-12 text-center bg-slate-50 rounded-3xl border border-dashed border-slate-200">
                        <p class="text-slate-400 font-medium">Join more organisations to unlock tailored recommendations.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Featured Merchants Section --}}
        <div class="space-y-8 pt-8">
            <div class="flex items-center justify-between px-2">
                <div>
                    <h2 class="text-3xl font-black text-slate-900 tracking-tight">Verified <span
                            class="text-emerald-600">Merchants</span></h2>
                    <p class="text-slate-500 text-sm font-medium mt-1">Accepting memberships and offering exclusive
                        benefits today.</p>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                @php
                    $merchants = \App\Models\Merchant::where('status', 'approved')->latest()->take(6)->get();
                @endphp

                @forelse($merchants as $merchant)
                    <div
                        class="bg-white rounded-[32px] p-6 border border-slate-100 shadow-lg shadow-slate-100/50 flex flex-col items-center text-center group hover:border-emerald-200 transition-all">
                        <div
                            class="w-16 h-16 bg-emerald-50 rounded-2xl flex items-center justify-center mb-4 text-emerald-500 group-hover:bg-emerald-500 group-hover:text-white transition-all">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <h4 class="text-sm font-black text-slate-900 leading-tight">{{ $merchant->name }}</h4>
                        <p class="text-[10px] font-bold text-slate-400 mt-2 uppercase tracking-widest">
                            {{ $merchant?->organisation?->name ?? 'N/A' }}
                        </p>
                    </div>
                @empty
                    <div
                        class="col-span-full py-10 text-center bg-slate-50 rounded-3xl border border-dashed border-slate-200">
                        <p class="text-slate-400 font-medium">Coming soon: Our network of verified merchants.</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Member Marketplace Section --}}
        <div id="marketplace" class="space-y-8 pt-8">
            <div class="flex items-center justify-between px-2">
                <div>
                    <h2 class="text-3xl font-black text-slate-900 tracking-tight">Member <span
                            class="text-indigo-600">Marketplace</span></h2>
                    <p class="text-slate-500 text-sm font-medium mt-1">Exclusive deals and discounts for our verified
                        community.</p>
                </div>
                <span
                    class="px-5 py-2.5 bg-indigo-50 text-indigo-600 rounded-2xl text-[10px] font-black uppercase tracking-widest border border-indigo-100 shadow-sm flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    Verified Partner Offers
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $activeOrgIds = auth()->user()->transactions()->where('status', 'completed')->pluck('organisation_id')->unique();
                    $discounts = \App\Models\Discount::where('applied_globally', true)
                        ->orWhereIn('organisation_id', $activeOrgIds)
                        ->with(['brand', 'outlet', 'organisation'])
                        ->latest()
                        ->take(3)
                        ->get();
                @endphp

                @forelse($discounts as $discount)
                    <div
                        class="group bg-white rounded-[40px] p-8 border border-slate-100 shadow-xl shadow-slate-100/50 flex flex-col h-full transform transition-all duration-500 hover:border-indigo-200 hover:shadow-indigo-500/10 hover:-translate-y-2">
                        <div class="flex justify-between items-start mb-10">
                            <div
                                class="w-16 h-16 bg-slate-50 rounded-[24px] flex items-center justify-center text-slate-400 group-hover:bg-indigo-50 group-hover:text-indigo-600 transition-colors shadow-inner">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                                </svg>
                            </div>
                            <div class="flex flex-col items-end">
                                <span
                                    class="px-5 py-2 bg-emerald-50 text-emerald-600 rounded-full text-[11px] font-black uppercase tracking-widest border border-emerald-100 shadow-sm mb-2">
                                    {{ $discount->amount }}% OFF
                                </span>
                                <span class="text-[9px] font-bold text-slate-400 px-2 uppercase tracking-tighter">Limited
                                    Time</span>
                            </div>
                        </div>

                        <h3
                            class="text-2xl font-black text-slate-900 leading-tight mb-3 group-hover:text-indigo-600 transition-colors">
                            {{ $discount->name }}
                        </h3>
                        <p class="text-slate-500 text-sm mb-10 flex-1 leading-relaxed font-medium">
                            Redeemable at <span
                                class="text-slate-900 font-black">{{ $discount->brand->name ?? 'All Luxury Brands' }}</span>
                            @if($discount->outlet)
                                <span class="block text-[11px] mt-1 text-slate-400">Exclusive to:
                                    {{ $discount->outlet->name }}</span>
                            @endif
                        </p>

                        @if($discount->organisation)
                            <div class="pt-8 border-t border-slate-50 flex items-center justify-between">
                                <div class="flex items-center space-x-3 overflow-hidden">
                                    <div class="w-8 h-8 rounded-lg bg-indigo-50 flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div class="overflow-hidden">
                                        <span
                                            class="text-[9px] font-black text-slate-400 uppercase tracking-widest block leading-none mb-1">Exclusive
                                            For</span>
                                        <span
                                            class="text-xs font-black text-indigo-600 truncate block uppercase tracking-tight">{{ $discount->organisation->name }}</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="pt-8 border-t border-slate-50 flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                        </svg>
                                    </div>
                                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Global Network
                                        Offer</span>
                                </div>
                            </div>
                        @endif
                    </div>
                @empty
                    <div
                        class="col-span-full py-16 text-center bg-white rounded-[40px] border border-dashed border-slate-200 px-8">
                        <p class="text-slate-400 font-bold mb-4 italic">No active marketplace deals found.</p>
                        <p class="text-slate-300 text-sm">Join more organisations to unlock exclusive partner discounts
                            here.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-filament-panels::page>