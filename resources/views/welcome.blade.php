<x-public-layout>
    {{-- ============================================================
         HERO SECTION — Blue sky gradient with floating cards
    ============================================================ --}}
    <section class="relative overflow-hidden">
        <!-- Sky gradient background -->
        <div class="absolute inset-0 bg-gradient-to-b from-[#5b9bd5] via-[#7db8e8] to-[#b5daf5]"></div>
        <!-- Cloud-like soft shapes -->
        <div class="absolute top-10 left-[10%] w-[500px] h-[200px] bg-white/30 rounded-full blur-3xl"></div>
        <div class="absolute top-20 right-[5%] w-[400px] h-[180px] bg-white/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white to-transparent"></div>

        <div class="relative z-10 max-w-5xl mx-auto px-6 lg:px-8 pt-24 pb-56 text-center">
            <h1 class="text-5xl md:text-7xl font-bold text-dark leading-[1.1] mb-6 font-heading">
                Building the future with<br>
                <span class="text-dark/80">loyalty and strategy</span>
            </h1>
            <p class="text-dark/60 text-base md:text-lg max-w-2xl mx-auto mb-10 leading-relaxed">
                We help organisations unlock growth and efficiency through data-driven membership platforms and intelligent loyalty automation.
            </p>
            <div class="flex items-center justify-center gap-4 flex-wrap">
                <a href="{{ route('public.organisations.index') }}"
                    class="inline-flex items-center px-6 py-3 border-2 border-dark/20 text-dark text-sm font-semibold rounded-full hover:bg-dark/5 transition-all tracking-wide uppercase">
                    View Demo
                </a>
                <a href="{{ route('register') }}"
                    class="inline-flex items-center px-7 py-3 bg-accent text-dark text-sm font-bold rounded-full hover:bg-accent-dark transition-all tracking-wide uppercase">
                    Get Started
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

        <!-- Floating cards row -->
        <div class="relative z-10 -mt-40 max-w-7xl mx-auto px-6 lg:px-8 pb-16">
            <div class="flex justify-center gap-5 overflow-hidden">
                <!-- Card 1: Stats card -->
                <div class="float-card w-56 h-72 bg-white rounded-3xl shadow-xl shadow-black/5 p-6 flex flex-col justify-between -rotate-6 shrink-0" style="--rotate: -6deg">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-semibold text-muted uppercase tracking-wider">Members</span>
                        <span class="text-xs font-bold text-green-500">+12%</span>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-dark mb-1">$4,900</div>
                        <div class="text-xs text-muted">Monthly Revenue</div>
                    </div>
                    <div class="flex gap-1 mt-3">
                        <div class="flex-1 h-8 bg-primary/20 rounded-lg"></div>
                        <div class="flex-1 h-12 bg-primary/40 rounded-lg"></div>
                        <div class="flex-1 h-6 bg-primary/20 rounded-lg"></div>
                        <div class="flex-1 h-10 bg-primary/60 rounded-lg"></div>
                        <div class="flex-1 h-14 bg-primary rounded-lg"></div>
                    </div>
                </div>

                <!-- Card 2: Membership -->
                <div class="float-card w-56 h-72 bg-white rounded-3xl shadow-xl shadow-black/5 p-6 flex flex-col justify-between -rotate-2 shrink-0" style="--rotate: -2deg">
                    <span class="text-xs font-semibold text-muted uppercase tracking-wider">Membership</span>
                    <div class="flex items-center gap-3 my-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-2xl"></div>
                        <div>
                            <div class="text-sm font-bold text-dark">Premium Plan</div>
                            <div class="text-xs text-muted">Active since Jan</div>
                        </div>
                    </div>
                    <div class="flex items-baseline gap-1">
                        <span class="text-2xl font-bold text-dark">$2,870</span>
                        <span class="text-xs text-muted">/mo</span>
                    </div>
                </div>

                <!-- Card 3: User card -->
                <div class="float-card w-56 h-72 bg-white rounded-3xl shadow-xl shadow-black/5 p-6 flex flex-col justify-between rotate-1 shrink-0" style="--rotate: 1deg">
                    <span class="text-xs font-semibold text-muted uppercase tracking-wider">Top Member</span>
                    <div class="w-16 h-16 bg-gradient-to-br from-amber-300 to-orange-400 rounded-2xl mx-auto"></div>
                    <div class="text-center">
                        <div class="text-sm font-bold text-dark">Sarah Johnson</div>
                        <div class="text-xs text-muted">Enterprise Tier</div>
                    </div>
                </div>

                <!-- Card 4: Insights -->
                <div class="float-card w-56 h-72 bg-white rounded-3xl shadow-xl shadow-black/5 p-6 flex flex-col justify-between rotate-3 shrink-0" style="--rotate: 3deg">
                    <div class="flex items-center gap-2">
                        <span class="inline-block px-2 py-1 bg-green-100 text-green-700 text-[10px] font-bold rounded-full uppercase">Live</span>
                        <span class="text-xs font-semibold text-muted">Insights</span>
                    </div>
                    <div>
                        <div class="text-xs text-muted mb-1">Data Points</div>
                        <div class="text-2xl font-bold text-dark">520k+</div>
                    </div>
                    <!-- Mini chart -->
                    <svg viewBox="0 0 200 60" class="w-full h-12 text-primary">
                        <polyline fill="none" stroke="currentColor" stroke-width="2" points="0,50 30,40 60,45 90,20 120,30 150,10 180,25 200,15" />
                    </svg>
                </div>

                <!-- Card 5: Dark card -->
                <div class="float-card w-56 h-72 bg-dark rounded-3xl shadow-xl shadow-black/10 p-6 flex flex-col justify-between rotate-6 shrink-0" style="--rotate: 6deg">
                    <div class="flex items-center gap-2">
                        <span class="inline-block px-2 py-1 bg-accent text-dark text-[10px] font-bold rounded-full uppercase">Expertise</span>
                    </div>
                    <div class="text-white/60 text-xs leading-relaxed">
                        Combines <span class="text-white font-semibold">Strategy</span>,
                        <span class="text-white font-semibold">Data</span>,
                        and <span class="text-white font-semibold">Artificial Intelligence</span>
                    </div>
                    <div class="text-white text-lg font-bold">Intelligence</div>
                </div>
            </div>

            <!-- Trust badge -->
            <div class="text-center mt-12">
                <p class="text-sm text-dark/50 mb-2">Rated 4.9/5 by 900+ clients</p>
                <div class="flex justify-center gap-1">
                    @for($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-amber-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         LOGO MARQUEE
    ============================================================ --}}
    <section class="py-12 border-b border-gray-100 bg-white overflow-hidden">
        <div class="flex marquee-left whitespace-nowrap">
            @for($i = 0; $i < 2; $i++)
                <div class="flex items-center gap-16 px-8">
                    <span class="text-xl font-bold text-gray-300 tracking-wider">LogoIpsum</span>
                    <span class="text-xl font-bold text-gray-300 tracking-wider">LogoIpsum</span>
                    <span class="text-xl font-bold text-gray-300 tracking-wider">LogoIpsum</span>
                    <span class="text-xl font-bold text-gray-300 tracking-wider">LogoIpsum</span>
                    <span class="text-xl font-bold text-gray-300 tracking-wider">LogoIpsum</span>
                    <span class="text-xl font-bold text-gray-300 tracking-wider">LogoIpsum</span>
                    <span class="text-xl font-bold text-gray-300 tracking-wider">LogoIpsum</span>
                    <span class="text-xl font-bold text-gray-300 tracking-wider">LogoIpsum</span>
                </div>
            @endfor
        </div>
    </section>

    {{-- ============================================================
         ABOUT SECTION — Stats + testimonial
    ============================================================ --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <!-- Section headline -->
            <div class="text-center mb-20 fade-up">
                <span class="section-label mb-4 block">About Us</span>
                <h2 class="text-4xl md:text-6xl font-bold text-dark leading-tight font-heading">
                    A global loyalty partner<br>
                    dedicated to building <span class="inline-block w-7 h-7 bg-primary rounded-full align-middle"></span> smarter<br>
                    <span class="text-dark/40">and <span class="inline-block w-7 h-7 bg-accent rounded-full align-middle"></span> more adaptive</span>
                </h2>
            </div>

            <!-- Stats row -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 fade-up">
                <!-- Stat card 1 -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-3xl p-8 relative overflow-hidden">
                    <div class="flex items-center justify-between mb-8">
                        <span class="text-sm font-semibold text-dark/40 uppercase tracking-wider">MEMBRS</span>
                        <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        </div>
                    </div>
                    <div class="text-5xl font-bold text-dark mb-3">120+</div>
                    <p class="text-sm text-dark/50 leading-relaxed">Collaborating with leading organisations and technology providers.</p>
                </div>

                <!-- Stat card 2 -->
                <div class="bg-white rounded-3xl p-8 border border-gray-100">
                    <div class="mb-4">
                        <span class="text-xs font-semibold text-dark/40 uppercase tracking-wider">Commitment to excellence</span>
                    </div>
                    <div class="text-5xl font-bold text-dark mb-6">100%</div>
                    <div class="flex items-center gap-2 mb-6">
                        <div class="flex -space-x-2">
                            <div class="w-8 h-8 bg-gradient-to-br from-pink-300 to-rose-400 rounded-full border-2 border-white"></div>
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-300 to-indigo-400 rounded-full border-2 border-white"></div>
                            <div class="w-8 h-8 bg-gradient-to-br from-amber-300 to-orange-400 rounded-full border-2 border-white"></div>
                        </div>
                    </div>
                    <p class="text-sm text-dark/40 italic leading-relaxed">"Their membership strategy completely reshaped how we work. It's efficient, intelligent, and seamless."</p>
                </div>

                <!-- Stat card 3 -->
                <div class="bg-accent/20 rounded-3xl p-8">
                    <div class="mb-4">
                        <span class="text-xs font-semibold text-dark/40 uppercase tracking-wider">Data Points</span>
                    </div>
                    <div class="text-5xl font-bold text-dark mb-3">520k+</div>
                    <p class="text-sm text-dark/50 leading-relaxed">Analyzed monthly to power smarter strategies and insights.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         SERVICES SECTION — 3 Column Grid
    ============================================================ --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16 fade-up">
                <span class="section-label mb-4 block">Services</span>
                <h2 class="text-4xl md:text-6xl font-bold text-dark leading-tight mb-6 font-heading">
                    Comprehensive loyalty and<br>intelligent innovation
                </h2>
                <p class="text-muted text-base max-w-2xl mx-auto mb-8">
                    Whether you're optimizing today or building for tomorrow, we help you move faster with confidence.
                </p>
                <a href="{{ route('register') }}"
                    class="inline-flex items-center px-7 py-3 bg-accent text-dark text-sm font-bold rounded-full hover:bg-accent-dark transition-all tracking-wide uppercase">
                    Get Started
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 fade-up">
                <!-- Service 1 -->
                <div class="card-hover bg-white rounded-3xl p-8 border border-gray-100 group">
                    <div class="w-12 h-12 bg-accent rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3 font-heading">Membership Strategy</h3>
                    <p class="text-sm text-muted leading-relaxed mb-6">
                        We help you identify opportunities for membership adoption and implement the right solutions.
                    </p>
                    <div class="w-full h-48 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl overflow-hidden">
                        <div class="w-full h-full flex items-end justify-center p-4">
                            <div class="flex gap-2 items-end">
                                <div class="w-8 h-16 bg-primary/20 rounded-lg"></div>
                                <div class="w-8 h-24 bg-primary/40 rounded-lg"></div>
                                <div class="w-8 h-20 bg-primary/30 rounded-lg"></div>
                                <div class="w-8 h-32 bg-primary/60 rounded-lg"></div>
                                <div class="w-8 h-28 bg-primary rounded-lg"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="card-hover bg-white rounded-3xl p-8 border border-gray-100 group">
                    <div class="w-12 h-12 bg-dark rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3 font-heading">Business Consulting</h3>
                    <p class="text-sm text-muted leading-relaxed mb-6">
                        We help you identify opportunities for top growth and implement the right strategies.
                    </p>
                    <div class="w-full h-48 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl overflow-hidden">
                        <div class="w-full h-full flex items-center justify-center">
                            <div class="w-24 h-24 bg-gradient-to-br from-emerald-200 to-teal-400 rounded-3xl rotate-12"></div>
                        </div>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="card-hover bg-white rounded-3xl p-8 border border-gray-100 group">
                    <div class="w-12 h-12 bg-primary rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3 font-heading">Data & Insights</h3>
                    <p class="text-sm text-muted leading-relaxed mb-6">
                        We help you identify opportunities for Big Data use and implement the right analytics.
                    </p>
                    <div class="w-full h-48 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl overflow-hidden">
                        <div class="w-full h-full flex items-center justify-center">
                            <div class="w-32 h-20 bg-gradient-to-r from-primary/20 via-primary/50 to-primary rounded-xl"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         EXPERTISE SECTION — 2x2 Grid
    ============================================================ --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16 fade-up">
                <span class="section-label mb-4 block">Expertise</span>
                <h2 class="text-4xl md:text-6xl font-bold text-dark leading-tight mb-6 font-heading">
                    Where human insight meets<br>intelligent technology
                </h2>
                <p class="text-muted text-base max-w-2xl mx-auto">
                    We help businesses harness technology not to replace human creativity, but to amplify it &mdash; enabling smarter decisions and faster growth.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 fade-up">
                <!-- Expertise 1 -->
                <div class="bg-gray-50 rounded-3xl p-10 card-hover">
                    <h3 class="text-2xl font-bold text-dark mb-3 font-heading">Automation & optimization</h3>
                    <p class="text-sm text-muted leading-relaxed mb-8">Streamline your operations through intelligent workflow automation that saves time, reduces errors, and boosts productivity.</p>
                    <div class="flex items-end gap-3">
                        <div class="bg-dark rounded-2xl p-5 text-white w-44">
                            <div class="text-xs text-white/50 mb-1">Performance</div>
                            <div class="text-2xl font-bold">49%</div>
                            <span class="text-xs text-green-400">+2.5%</span>
                        </div>
                        <div class="bg-white rounded-2xl p-5 border border-gray-100 flex-1">
                            <div class="flex gap-3 text-[10px] text-muted font-semibold uppercase tracking-wider">
                                <span>Strategic</span><span>AI-Focused</span><span>Scalable</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Expertise 2 -->
                <div class="bg-gray-50 rounded-3xl p-10 card-hover">
                    <h3 class="text-2xl font-bold text-dark mb-3 font-heading">Data analytics & insights</h3>
                    <p class="text-sm text-muted leading-relaxed mb-8">Transform raw data into strategic insight using advanced analytics, dashboards, and predictive modeling.</p>
                    <div class="flex items-center justify-center h-32">
                        <div class="relative w-40 h-40">
                            <div class="absolute inset-0 border-2 border-dashed border-gray-200 rounded-full"></div>
                            <div class="absolute top-2 left-1/2 -translate-x-1/2 w-8 h-8 bg-gradient-to-br from-blue-300 to-blue-500 rounded-full border-2 border-white shadow"></div>
                            <div class="absolute bottom-4 right-2 w-8 h-8 bg-gradient-to-br from-amber-300 to-orange-400 rounded-full border-2 border-white shadow"></div>
                            <div class="absolute bottom-4 left-2 w-8 h-8 bg-gradient-to-br from-emerald-300 to-green-500 rounded-full border-2 border-white shadow"></div>
                        </div>
                    </div>
                </div>

                <!-- Expertise 3 -->
                <div class="bg-gray-50 rounded-3xl p-10 card-hover">
                    <h3 class="text-2xl font-bold text-dark mb-3 font-heading">Digital transformation</h3>
                    <p class="text-sm text-muted leading-relaxed mb-8">We guide organizations through full-scale digital evolution &mdash; modernizing systems, processes, and decision-making frameworks.</p>
                    <div class="flex items-end gap-3">
                        <div class="bg-dark rounded-2xl p-5 text-white">
                            <div class="text-xs text-white/50 mb-1">Performance</div>
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                                <span class="text-lg font-bold">50+</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Expertise 4 -->
                <div class="bg-gray-50 rounded-3xl p-10 card-hover">
                    <h3 class="text-2xl font-bold text-dark mb-3 font-heading">Experience intelligence</h3>
                    <p class="text-sm text-muted leading-relaxed mb-8">Combine data and design to deliver smarter, more personalized experiences that connect with users.</p>
                    <div class="flex items-center justify-center h-32">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-violet-300 to-purple-500 rounded-full"></div>
                            <div class="w-10 h-10 bg-gradient-to-br from-sky-300 to-blue-500 rounded-full"></div>
                            <div class="w-10 h-10 bg-accent rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         PRICING SECTION — 3 Tiers
    ============================================================ --}}
    <section class="py-24 bg-white" id="pricing">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16 fade-up">
                <span class="section-label mb-4 block">Pricing</span>
                <h2 class="text-4xl md:text-6xl font-bold text-dark leading-tight mb-6 font-heading">
                    Flexible Plans Built for<br>Every Stage of Growth
                </h2>
                <p class="text-muted text-base max-w-2xl mx-auto mb-8">
                    Whether you're just starting your journey or scaling enterprise-wide innovation, we offer tailored solutions that grow with you.
                </p>
                <a href="{{ route('register') }}"
                    class="inline-flex items-center px-7 py-3 bg-accent text-dark text-sm font-bold rounded-full hover:bg-accent-dark transition-all tracking-wide uppercase">
                    Get Started
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 fade-up">
                <!-- Starter Plan -->
                <div class="card-hover bg-white rounded-3xl p-8 border border-gray-100 flex flex-col">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <span class="text-xs font-bold text-dark uppercase tracking-widest">Starter Plan</span>
                    </div>
                    <p class="text-sm text-muted mb-8">Perfect for small teams beginning to explore loyalty and automation.</p>
                    <div class="flex items-baseline gap-1 mb-8">
                        <span class="text-4xl font-bold text-dark">$2,500</span>
                        <span class="text-sm text-muted">/month</span>
                    </div>
                    <ul class="space-y-3 mb-10 flex-1">
                        <li class="flex items-center gap-2 text-sm text-dark/70">
                            <svg class="w-4 h-4 text-dark shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Strategy consultation (up to 10 hours)
                        </li>
                        <li class="flex items-center gap-2 text-sm text-dark/70">
                            <svg class="w-4 h-4 text-dark shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Business process mapping
                        </li>
                        <li class="flex items-center gap-2 text-sm text-dark/70">
                            <svg class="w-4 h-4 text-dark shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Basic workflow setup
                        </li>
                    </ul>
                    <a href="{{ route('register') }}"
                        class="block w-full text-center px-6 py-4 bg-dark text-white text-sm font-bold rounded-full hover:bg-dark/90 transition-all tracking-wide uppercase">
                        Get Started
                    </a>
                </div>

                <!-- Growth Plan (featured) -->
                <div class="card-hover bg-accent/10 rounded-3xl p-8 border-2 border-accent flex flex-col relative">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="w-8 h-8 bg-accent rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        </div>
                        <span class="text-xs font-bold text-dark uppercase tracking-widest">Growth Plan</span>
                    </div>
                    <p class="text-sm text-muted mb-8">Designed for growing companies ready to integrate loyalty into their operations.</p>
                    <div class="flex items-baseline gap-1 mb-8">
                        <span class="text-4xl font-bold text-dark">$8,500</span>
                        <span class="text-sm text-muted">/month</span>
                    </div>
                    <ul class="space-y-3 mb-10 flex-1">
                        <li class="flex items-center gap-2 text-sm text-dark/70">
                            <svg class="w-4 h-4 text-dark shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Dedicated consultant
                        </li>
                        <li class="flex items-center gap-2 text-sm text-dark/70">
                            <svg class="w-4 h-4 text-dark shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            End-to-end automation setup
                        </li>
                        <li class="flex items-center gap-2 text-sm text-dark/70">
                            <svg class="w-4 h-4 text-dark shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Predictive analytics dashboards
                        </li>
                        <li class="flex items-center gap-2 text-sm text-dark/70">
                            <svg class="w-4 h-4 text-dark shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Priority support
                        </li>
                    </ul>
                    <a href="{{ route('register') }}"
                        class="block w-full text-center px-6 py-4 bg-accent text-dark text-sm font-bold rounded-full hover:bg-accent-dark transition-all tracking-wide uppercase">
                        Get Started
                    </a>
                </div>

                <!-- Enterprise Plan -->
                <div class="card-hover bg-white rounded-3xl p-8 border border-gray-100 flex flex-col">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        <span class="text-xs font-bold text-dark uppercase tracking-widest">Enterprise Plan</span>
                    </div>
                    <p class="text-sm text-muted mb-8">Custom-built for enterprises seeking full-scale transformation optimization.</p>
                    <div class="flex items-baseline gap-1 mb-8">
                        <span class="text-4xl font-bold text-dark">$10,500</span>
                        <span class="text-sm text-muted">/month</span>
                    </div>
                    <ul class="space-y-3 mb-10 flex-1">
                        <li class="flex items-center gap-2 text-sm text-dark/70">
                            <svg class="w-4 h-4 text-dark shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Tailored implementation
                        </li>
                        <li class="flex items-center gap-2 text-sm text-dark/70">
                            <svg class="w-4 h-4 text-dark shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Custom automation architecture
                        </li>
                        <li class="flex items-center gap-2 text-sm text-dark/70">
                            <svg class="w-4 h-4 text-dark shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Advanced data analytics
                        </li>
                        <li class="flex items-center gap-2 text-sm text-dark/70">
                            <svg class="w-4 h-4 text-dark shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Dedicated success manager
                        </li>
                    </ul>
                    <a href="{{ route('register') }}"
                        class="block w-full text-center px-6 py-4 bg-dark text-white text-sm font-bold rounded-full hover:bg-dark/90 transition-all tracking-wide uppercase">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         TESTIMONIALS SECTION
    ============================================================ --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-end justify-between mb-12 fade-up">
                <div>
                    <span class="section-label mb-4 block">Testimonials</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-dark leading-tight font-heading">
                        What they say about us?
                    </h2>
                    <p class="text-muted text-sm mt-3">Here's what they shared about their experience working with our team.</p>
                </div>
                <div class="hidden md:flex items-center gap-2">
                    <button class="w-10 h-10 border border-gray-200 rounded-full flex items-center justify-center text-dark hover:bg-gray-50 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button class="w-10 h-10 border border-gray-200 rounded-full flex items-center justify-center text-dark hover:bg-gray-50 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 fade-up">
                <!-- Testimonial 1 -->
                <div class="group relative rounded-3xl overflow-hidden h-96 card-hover">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-200 to-blue-400"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-dark/80 via-dark/20 to-transparent"></div>
                    <div class="relative z-10 flex flex-col justify-between h-full p-8">
                        <span class="text-xs font-bold text-white/70 uppercase tracking-widest">Partner Org</span>
                        <div>
                            <div class="text-accent text-3xl font-serif mb-3">"</div>
                            <p class="text-white text-sm leading-relaxed mb-4">
                                Their platform solved our biggest membership problems, breaking down barriers and delivering innovative solutions.
                            </p>
                            <p class="text-white/60 text-xs">- Sarah M., Tech Innovations</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="group relative rounded-3xl overflow-hidden h-96 card-hover">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-200 to-teal-400"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-dark/80 via-dark/20 to-transparent"></div>
                    <div class="relative z-10 flex flex-col justify-between h-full p-8">
                        <span class="text-xs font-bold text-white/70 uppercase tracking-widest">Merchant</span>
                        <div>
                            <div class="text-accent text-3xl font-serif mb-3">"</div>
                            <p class="text-white text-sm leading-relaxed mb-4">
                                Opening new paths and creating highly effective strategies for our loyalty program growth.
                            </p>
                            <p class="text-white/60 text-xs">- James L., Growth Partners</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="group relative rounded-3xl overflow-hidden h-96 card-hover">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-200 to-orange-400"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-dark/80 via-dark/20 to-transparent"></div>
                    <div class="relative z-10 flex flex-col justify-between h-full p-8">
                        <span class="text-xs font-bold text-white/70 uppercase tracking-widest">Enterprise</span>
                        <div>
                            <div class="text-accent text-3xl font-serif mb-3">"</div>
                            <p class="text-white text-sm leading-relaxed mb-4">
                                Cutting through noise and providing truly advanced responses to our membership challenges.
                            </p>
                            <p class="text-white/60 text-xs">- Maria K., Enterprise Solutions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-public-layout>
