<x-public-layout>
    <section class="max-w-7xl mx-auto px-6 lg:px-8 pt-12 pb-24">

        @if(request()->has('session_id'))
            <div class="mb-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-3xl p-8 text-white relative overflow-hidden shadow-xl">
                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                    <div>
                        <h2 class="text-2xl font-bold mb-1 font-heading">Payment Successful!</h2>
                        <p class="text-white/70 text-sm">Welcome to the family. Your membership is now active and your digital card is ready.</p>
                    </div>
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex items-center px-6 py-3 bg-white text-green-600 font-bold rounded-full text-sm hover:bg-green-50 transition-all">
                        View My Dashboard
                    </a>
                </div>
            </div>
        @endif

        <div class="flex flex-col lg:flex-row gap-10">
            <!-- Sidebar -->
            <aside class="w-full lg:w-80 shrink-0">
                <div class="bg-white rounded-3xl p-8 border border-gray-100 sticky top-28">
                    <a href="{{ route('public.organisations.index') }}"
                        class="inline-flex items-center text-xs font-semibold text-muted hover:text-dark transition-colors mb-8 group uppercase tracking-wider">
                        <svg class="w-3.5 h-3.5 mr-1.5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        All Organisations
                    </a>

                    <div class="w-20 h-20 bg-gray-50 rounded-2xl flex items-center justify-center mb-6 overflow-hidden">
                        @if($organisation->logo)
                            <img src="{{ Storage::disk('public')->url($organisation->logo) }}" alt="{{ $organisation->name }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        @endif
                    </div>

                    <h1 class="text-2xl font-bold text-dark leading-tight mb-3 font-heading">{{ $organisation->name }}</h1>
                    <p class="text-sm text-muted leading-relaxed mb-8">Official partner of the MEMBRS Network. Explore their exclusive tiered membership plans below.</p>

                    <div class="space-y-4 pt-6 border-t border-gray-50">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-semibold text-muted uppercase tracking-wider leading-none mb-0.5">Contact Email</p>
                                <p class="text-sm font-semibold text-dark">{{ $organisation->email }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-semibold text-muted uppercase tracking-wider leading-none mb-0.5">Verification</p>
                                <p class="text-sm font-semibold text-dark">Verified Platform Partner</p>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Membership Plans -->
            <main class="flex-1 space-y-8">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-dark font-heading">Membership <span class="text-primary">Plans</span></h2>
                    <span class="text-xs font-semibold text-muted uppercase tracking-wider">{{ count($organisation->membershipPlans) }} Plan(s)</span>
                </div>

                <div class="grid grid-cols-1 gap-6">
                    @forelse($organisation->membershipPlans as $plan)
                        <div class="card-hover bg-white rounded-3xl overflow-hidden border border-gray-100 flex flex-col md:flex-row">
                            <!-- Card Preview -->
                            <div class="w-full md:w-72 p-8 flex flex-col justify-end relative overflow-hidden"
                                style="background: linear-gradient(135deg, {{ $plan->branding_colors['primary'] ?? '#1e293b' }}, {{ $plan->branding_colors['secondary'] ?? '#0f172a' }})">
                                <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none">
                                    <div class="w-48 h-48 bg-white rounded-full -translate-x-1/4 -translate-y-1/4"></div>
                                </div>
                                <div class="relative z-10 space-y-3">
                                    @if($plan->branding_logo)
                                        <div class="w-12 h-12 bg-white/10 backdrop-blur-md rounded-xl flex items-center justify-center p-2">
                                            <img src="{{ asset('storage/' . $plan->branding_logo) }}" alt="Logo" class="w-full h-full object-contain filter brightness-0 invert">
                                        </div>
                                    @endif
                                    <div>
                                        <h4 class="text-white font-bold text-xl">{{ $plan->name }}</h4>
                                        <div class="flex items-center gap-2 mt-1">
                                            <span class="text-white/50 text-xs font-semibold uppercase tracking-wider">{{ $plan->tier ?? 'Member' }}</span>
                                            <div class="w-1 h-1 bg-white/30 rounded-full"></div>
                                            <span class="text-white/50 text-xs font-semibold uppercase tracking-wider">Digital Card</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Plan Details -->
                            <div class="flex-1 p-8 md:p-10 flex flex-col justify-between">
                                <div>
                                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8">
                                        <div>
                                            <span class="text-[10px] font-semibold text-muted uppercase tracking-wider mb-1 block">Monthly Fee</span>
                                            <div class="flex items-baseline gap-1">
                                                <span class="text-3xl font-bold text-dark">${{ number_format($plan->price, 2) }}</span>
                                                <span class="text-sm text-muted">/mo</span>
                                            </div>
                                        </div>
                                        <div class="mt-4 md:mt-0 flex gap-1.5">
                                            <div class="h-4 w-4 rounded-full border border-gray-100" style="background-color: {{ $plan->branding_colors['primary'] ?? '#eee' }}"></div>
                                            <div class="h-4 w-4 rounded-full border border-gray-100" style="background-color: {{ $plan->branding_colors['secondary'] ?? '#ddd' }}"></div>
                                        </div>
                                    </div>

                                    <div class="prose prose-sm text-muted leading-relaxed mb-8 max-w-none">
                                        <p class="font-semibold text-dark text-sm mb-2">Member Benefits:</p>
                                        {!! $plan->benefits_text !!}
                                    </div>
                                </div>

                                <div class="pt-6 border-t border-gray-50 flex flex-col sm:flex-row gap-3">
                                    <a href="{{ route('public.membership.purchase', $plan) }}"
                                        class="flex-1 inline-flex items-center justify-center px-6 py-3.5 bg-dark text-white font-bold rounded-full text-sm hover:bg-primary transition-all tracking-wide uppercase">
                                        Join Now
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                                    </a>
                                    <button class="px-6 py-3.5 bg-gray-50 text-dark font-semibold rounded-full text-sm hover:bg-gray-100 transition-all border border-gray-100">
                                        Compare
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="py-16 text-center bg-white rounded-3xl border border-dashed border-gray-200">
                            <p class="text-muted text-sm">No membership plans are currently active for this organisation.</p>
                        </div>
                    @endforelse
                </div>
            </main>
        </div>
    </section>
</x-public-layout>
