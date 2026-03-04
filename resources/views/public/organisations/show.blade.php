<x-public-layout>
    <!-- Background Accents -->
    <div class="fixed inset-0 pointer-events-none -z-10">
        <div
            class="absolute top-0 right-0 w-[800px] h-[800px] bg-primary/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2">
        </div>
        <div
            class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-indigo-500/5 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2">
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12">

        @if(request()->has('session_id'))
            <div
                class="mb-12 bg-green-500 rounded-[32px] p-8 text-white relative overflow-hidden shadow-2xl shadow-green-200">
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2">
                </div>
                <div
                    class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
                    <div>
                        <h2 class="text-3xl font-black mb-2">🎉 Payment Successful!</h2>
                        <p class="text-green-50 font-medium">Welcome to the family. Your membership is now active and your
                            digital card is ready.</p>
                    </div>
                    <a href="{{ route('dashboard') }}"
                        class="px-8 py-4 bg-white text-green-600 font-black rounded-2xl hover:bg-green-50 transition-all shadow-xl shadow-green-900/10">
                        View My Dashboard
                    </a>
                </div>
            </div>
        @endif

        <div class="flex flex-col lg:flex-row gap-12">

            <!-- Sidebar / Organisation Info -->
            <aside class="w-full lg:w-1/3 space-y-8">
                <div
                    class="bg-white rounded-[40px] p-10 shadow-2xl shadow-slate-200/50 border border-slate-50 sticky top-32">
                    <a href="{{ route('public.organisations.index') }}"
                        class="inline-flex items-center text-sm font-bold text-slate-400 hover:text-primary transition-colors mb-10 group">
                        <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M15 19l-7-7 7-7" />
                        </svg>
                        All Organisations
                    </a>

                    <div
                        class="w-24 h-24 bg-gradient-to-br from-slate-50 to-slate-100 rounded-3xl flex items-center justify-center mb-8 border border-slate-100">
                        <svg class="w-12 h-12 text-slate-400 font-bold" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>

                    <h1 class="text-4xl font-black text-slate-900 leading-tight mb-4">{{ $organisation->name }}</h1>
                    <p class="text-slate-500 leading-relaxed mb-10 text-lg">Official partner of the Membrs Network.
                        Explore their exclusive tiered membership plans below.</p>

                    <div class="space-y-4 pt-10 border-t border-slate-50">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 rounded-xl bg-orange-50 flex items-center justify-center">
                                <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">
                                    Contact Email</p>
                                <p class="font-bold text-slate-700">{{ $organisation->email }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">
                                    Verification</p>
                                <p class="font-bold text-slate-700">Verified Platform Partner</p>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Membership Plans Grid -->
            <main class="flex-1 space-y-10">
                <div class="flex items-center justify-between">
                    <h2 class="text-3xl font-black text-slate-900">Membership <span class="text-primary">Plans</span>
                    </h2>
                    <span class="text-sm font-bold text-slate-400">{{ count($organisation->membershipPlans) }} Plan(s)
                        Available</span>
                </div>

                <div class="grid grid-cols-1 gap-10">
                    @forelse($organisation->membershipPlans as $plan)
                        <div
                            class="group bg-white rounded-[48px] overflow-hidden shadow-2xl shadow-slate-200/40 border border-slate-50 flex flex-col md:flex-row hover:shadow-primary/5 hover:border-primary/10 transition-all duration-500 transform hover:-translate-y-1">
                            <!-- Card Design Preview -->
                            <div class="w-full md:w-80 p-8 flex flex-col justify-end relative overflow-hidden"
                                style="background: linear-gradient(135deg, {{ $plan->branding_colors['primary'] ?? '#1e293b' }}, {{ $plan->branding_colors['secondary'] ?? '#0f172a' }})">
                                <!-- Abstract Card Shapes -->
                                <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none">
                                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                                        <path fill="#FFF"
                                            d="M44.7,-76.4C58.8,-69.2,71.8,-59.1,79.6,-46.2C87.4,-33.3,90.1,-17.6,88.7,-2.4C87.3,12.8,81.9,27.5,73.5,40.4C65.1,53.3,53.8,64.4,40.6,71.2C27.4,78.1,12.3,80.6,-2.4,84.7C-17,88.8,-31.2,94.5,-44.3,90.1C-57.4,85.6,-69.3,71,-77.8,55.5C-86.4,40,-91.6,23.6,-92.3,7.2C-93.1,-9.3,-89.4,-25.7,-81.1,-40.1C-72.7,-54.5,-59.6,-66.8,-45.1,-73.8C-30.6,-80.8,-15.3,-82.5,0.1,-82.7C15.5,-82.9,30.6,-83.6,44.7,-76.4Z"
                                            transform="translate(100 100)" />
                                    </svg>
                                </div>

                                <div class="relative z-10 space-y-4">
                                    @if($plan->branding_logo)
                                        <div
                                            class="w-16 h-16 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center p-3">
                                            <img src="{{ asset('storage/' . $plan->branding_logo) }}" alt="Logo"
                                                class="w-full h-full object-contain filter brightness-0 invert">
                                        </div>
                                    @else
                                        <div class="w-12 h-8 bg-white/20 backdrop-blur-md rounded-lg mb-8"></div>
                                    @endif

                                    <div>
                                        <h4 class="text-white font-black text-2xl uppercase tracking-tighter">
                                            {{ $plan->name }}
                                        </h4>
                                        <div class="flex items-center space-x-2">
                                            <span
                                                class="text-white/60 text-xs font-bold uppercase tracking-widest">{{ $plan->tier ?? 'Member' }}</span>
                                            <div class="w-1 h-1 bg-white/40 rounded-full"></div>
                                            <span class="text-white/60 text-xs font-bold uppercase tracking-widest">Digital
                                                Card</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Plan Details -->
                            <div class="flex-1 p-10 md:p-14 flex flex-col justify-between">
                                <div>
                                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-10">
                                        <div>
                                            <span
                                                class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 block">Monthly
                                                Fee</span>
                                            <div class="flex items-baseline space-x-1">
                                                <span
                                                    class="text-4xl font-black text-slate-900 leading-none">${{ number_format($plan->price, 2) }}</span>
                                                <span class="text-slate-400 font-bold">/mo</span>
                                            </div>
                                        </div>
                                        <div class="mt-6 md:mt-0 flex space-x-2">
                                            <div class="h-4 w-4 rounded-full border border-slate-100 shadow-sm"
                                                style="background-color: {{ $plan->branding_colors['primary'] ?? '#eee' }}">
                                            </div>
                                            <div class="h-4 w-4 rounded-full border border-slate-100 shadow-sm"
                                                style="background-color: {{ $plan->branding_colors['secondary'] ?? '#ddd' }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="prose prose-slate prose-sm text-slate-500 leading-loose mb-10">
                                        <p class="font-bold text-slate-900 mb-2">Member Benefits:</p>
                                        {!! $plan->benefits_text !!}
                                    </div>
                                </div>

                                <div class="pt-10 border-t border-slate-50 flex flex-col sm:flex-row gap-4">
                                    <a href="{{ route('public.membership.purchase', $plan) }}"
                                        class="flex-1 inline-flex items-center justify-center px-10 py-5 bg-slate-900 text-white font-black rounded-[24px] hover:bg-primary transition-all shadow-xl shadow-slate-200 hover:shadow-primary/30">
                                        Join Now
                                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </a>
                                    <button
                                        class="px-10 py-5 bg-slate-50 text-slate-600 font-bold rounded-[24px] hover:bg-slate-100 transition-all border border-slate-100">
                                        Compare
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="py-20 text-center bg-white rounded-[48px] border border-dashed border-slate-200">
                            <p class="text-slate-500 font-medium italic">No membership plans are currently active for this
                                organisation.</p>
                        </div>
                    @endforelse
                </div>
            </main>

        </div>
    </div>
</x-public-layout>