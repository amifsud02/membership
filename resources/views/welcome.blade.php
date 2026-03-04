<x-public-layout>
    <!-- Hero Section -->
    <div class="relative min-h-[90vh] flex items-center overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 -z-10 bg-slate-50/50">
            <div
                class="absolute top-0 right-0 w-[1000px] h-[1000px] bg-primary/10 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2 animate-pulse">
            </div>
            <div
                class="absolute bottom-0 left-0 w-[800px] h-[800px] bg-indigo-500/10 rounded-full blur-[120px] translate-y-1/2 -translate-x-1/2">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
            <div
                class="inline-flex items-center space-x-2 bg-white px-4 py-2 rounded-full shadow-xl shadow-slate-200/50 border border-slate-50 mb-10 transform scale-110">
                <span class="flex h-2 w-2 rounded-full bg-primary animate-ping"></span>
                <span class="text-xs font-black text-slate-900 uppercase tracking-[0.2em]">Next-Gen Loyalty
                    Platform</span>
            </div>

            <h1 class="text-6xl md:text-9xl font-black text-slate-900 leading-[0.9] tracking-tighter mb-10">
                The Elite <br>
                <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-primary via-indigo-600 to-indigo-900">Experience.</span>
            </h1>

            <p class="text-xl md:text-2xl text-slate-500 max-w-2xl mx-auto leading-relaxed mb-16 font-medium">
                Bridging the gap between premium organisations and their most valued members through exclusive digital
                memberships.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                <a href="{{ route('public.organisations.index') }}"
                    class="w-full sm:w-auto px-12 py-6 bg-slate-900 text-white rounded-[32px] text-xl font-bold hover:bg-primary transition-all shadow-[0_20px_50px_rgba(0,0,0,0.15)] hover:shadow-primary/40 transform hover:-translate-y-2 group">
                    Explore Partners
                    <svg class="inline-block ml-2 w-6 h-6 transform group-hover:translate-x-1 transition-transform"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                <a href="{{ route('register') }}"
                    class="w-full sm:w-auto px-12 py-6 bg-white text-slate-900 border-2 border-slate-100 rounded-[32px] text-xl font-bold hover:bg-slate-50 transition-all transform hover:-translate-y-1">
                    Join Today
                </a>
            </div>

            <!-- Brands Display -->
            <div class="mt-32 pt-20 border-t border-slate-100">
                <p class="text-xs font-black text-slate-400 uppercase tracking-[0.3em] mb-12 italic">Recognized by
                    Global Entities</p>
                <div
                    class="flex flex-wrap justify-center items-center gap-12 md:gap-24 opacity-30 grayscale hover:grayscale-0 transition-all duration-700">
                    <!-- Example Icons/Logos -->
                    <div class="h-8 w-24 bg-slate-400 rounded-md"></div>
                    <div class="h-8 w-32 bg-slate-400 rounded-md"></div>
                    <div class="h-8 w-16 bg-slate-400 rounded-md"></div>
                    <div class="h-8 w-28 bg-slate-400 rounded-md"></div>
                    <div class="h-8 w-20 bg-slate-400 rounded-md"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-32 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
                <div>
                    <span class="text-primary font-black uppercase tracking-[0.2em] text-xs mb-4 block">Unified
                        Ecosystem</span>
                    <h2 class="text-4xl md:text-6xl font-black text-slate-900 leading-tight mb-8">One Platform. <br>
                        Endless Benefits.</h2>
                    <p class="text-slate-500 text-lg leading-relaxed mb-12">Whether you are an organisation looking to
                        reward your community, or a merchant wanting to attract high-value customers, we provide the
                        infrastructure for growth.</p>

                    <ul class="space-y-6">
                        <li class="flex items-start space-x-4">
                            <div
                                class="flex-shrink-0 w-8 h-8 rounded-full bg-green-500 flex items-center justify-center text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 leading-none mb-1">Secure Transactions</h4>
                                <p class="text-slate-500 text-sm">Enterprise-grade security via Stripe integration.</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-4">
                            <div
                                class="flex-shrink-0 w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 leading-none mb-1">Global Coverage</h4>
                                <p class="text-slate-500 text-sm">Supporting multiple currencies and regions.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="grid grid-cols-2 gap-6 p-4">
                    <div
                        class="bg-slate-50 p-10 rounded-[40px] mt-12 transform hover:rotate-2 transition-transform shadow-2xl shadow-indigo-100/20">
                        <div class="text-4xl font-black text-slate-900 mb-2">99%</div>
                        <div class="text-slate-500 font-bold uppercase tracking-widest text-[10px]">Satisfaction</div>
                    </div>
                    <div class="bg-slate-900 p-10 rounded-[40px] text-white shadow-2xl shadow-slate-900/20">
                        <div class="text-4xl font-black mb-2">24h</div>
                        <div class="text-slate-400 font-bold uppercase tracking-widest text-[10px]">Settlement</div>
                    </div>
                    <div class="bg-primary p-10 rounded-[40px] text-white col-span-2 shadow-2xl shadow-primary/20">
                        <div class="text-4xl font-black mb-2">10k+</div>
                        <div class="text-primary-100/60 font-bold uppercase tracking-widest text-[10px]">Active Members
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>