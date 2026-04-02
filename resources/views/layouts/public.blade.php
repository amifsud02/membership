<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MEMBRS') }}</title>

    <!-- Fonts: Inter + Plus Jakarta Sans (matching Aeline) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind v4 -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        @theme {
            --font-heading: 'Plus Jakarta Sans', sans-serif;
            --font-sans: 'Inter', sans-serif;
            --color-primary: #4d65ff;
            --color-accent: #d1f544;
            --color-accent-dark: #b8d93a;
            --color-dark: #0a0a0a;
            --color-muted: #6b7280;
        }
        @layer base {
            h1, h2, h3, h4, h5, h6 { font-family: var(--font-heading); }
            body { font-family: var(--font-sans); -webkit-font-smoothing: antialiased; }
        }
    </style>
    <style>
        /* Marquee Animation */
        @keyframes marquee-left {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        @keyframes marquee-right {
            0% { transform: translateX(-50%); }
            100% { transform: translateX(0); }
        }
        .marquee-left { animation: marquee-left 30s linear infinite; }
        .marquee-right { animation: marquee-right 30s linear infinite; }

        /* Fade up on scroll */
        .fade-up {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Card hover scale */
        .card-hover {
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.5s ease;
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
        }

        /* Gradient border effect */
        .gradient-border {
            position: relative;
        }
        .gradient-border::before {
            content: '';
            position: absolute;
            top: 0;
            left: 20%;
            right: 20%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(77, 101, 255, 0.3), transparent);
        }

        /* Floating cards animation */
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(var(--rotate, 0deg)); }
            50% { transform: translateY(-12px) rotate(var(--rotate, 0deg)); }
        }
        .float-card {
            animation: float 6s ease-in-out infinite;
        }
        .float-card:nth-child(2) { animation-delay: -1s; }
        .float-card:nth-child(3) { animation-delay: -2s; }
        .float-card:nth-child(4) { animation-delay: -3s; }
        .float-card:nth-child(5) { animation-delay: -4s; }

        /* Section label style */
        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #6b7280;
        }
        .section-label::before {
            content: '+';
            font-weight: 700;
        }

        /* Smooth nav */
        .nav-blur {
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }
    </style>
</head>

<body class="antialiased bg-white text-dark">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 nav-blur bg-white/80 border-b border-gray-100/50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <a href="/" class="flex items-center space-x-2.5">
                    <div class="w-9 h-9 bg-dark rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <span class="text-lg font-bold tracking-tight text-dark font-heading">MEMBRS</span>
                </a>

                <!-- Center nav links -->
                <div class="hidden md:flex items-center space-x-10">
                    <a href="/" class="text-[13px] font-semibold text-dark/70 hover:text-dark tracking-wide uppercase transition-colors">Home</a>
                    <a href="{{ route('public.organisations.index') }}" class="text-[13px] font-semibold text-dark/70 hover:text-dark tracking-wide uppercase transition-colors">Organisations</a>
                    <a href="{{ route('public.merchants.index') }}" class="text-[13px] font-semibold text-dark/70 hover:text-dark tracking-wide uppercase transition-colors">Merchants</a>
                </div>

                <!-- Right side actions -->
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center justify-center px-6 py-2.5 bg-accent text-dark text-[13px] font-bold rounded-full hover:bg-accent-dark transition-all tracking-wide uppercase">
                            Dashboard
                            <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="hidden sm:block text-[13px] font-semibold text-dark/70 hover:text-dark tracking-wide uppercase transition-colors">Log in</a>
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center justify-center px-6 py-2.5 bg-accent text-dark text-[13px] font-bold rounded-full hover:bg-accent-dark transition-all tracking-wide uppercase">
                            Get Started
                            <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Spacer for fixed nav -->
    <div class="h-20"></div>

    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-0">
        <!-- Pre-footer CTA -->
        <div class="relative overflow-hidden bg-gradient-to-br from-blue-400 via-blue-500 to-blue-600 py-24">
            <div class="absolute inset-0 opacity-20">
                <div class="absolute bottom-0 left-0 right-0 h-64 bg-gradient-to-t from-dark/40 to-transparent"></div>
            </div>
            <div class="max-w-4xl mx-auto px-6 lg:px-8 relative z-10">
                <h2 class="text-4xl md:text-5xl font-bold text-white leading-tight mb-6 font-heading">
                    We combine exclusive rewards<br>with intelligent membership
                </h2>
                <p class="text-white/70 text-lg mb-10 max-w-2xl">
                    Our platform bridges organisations and their most valued members, delivering premium digital memberships and seamless loyalty experiences.
                </p>
                <a href="{{ route('register') }}"
                    class="inline-flex items-center px-7 py-3.5 bg-accent text-dark font-bold rounded-full text-sm hover:bg-accent-dark transition-all tracking-wide uppercase">
                    Get Started
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

        <!-- Footer links -->
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
                <!-- Logo + description -->
                <div class="md:col-span-4">
                    <a href="/" class="flex items-center space-x-2.5 mb-6">
                        <div class="w-9 h-9 bg-white rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <span class="text-lg font-bold tracking-tight text-white font-heading">MEMBRS</span>
                    </a>
                    <p class="text-white/50 text-sm leading-relaxed mb-8 max-w-xs">
                        Easily adapt to changes and scale your operations with our flexible membership infrastructure, designed to support your business growth.
                    </p>
                    <!-- Newsletter -->
                    <p class="text-white/50 text-xs font-semibold uppercase tracking-widest mb-4">Subscribe to our newsletter</p>
                    <div class="flex items-center gap-2">
                        <input type="email" placeholder="Enter your email"
                            class="flex-1 px-4 py-3 bg-white/10 border border-white/10 rounded-full text-sm text-white placeholder-white/30 focus:outline-none focus:border-accent/50 transition-colors">
                        <button class="inline-flex items-center px-5 py-3 bg-accent text-dark font-bold rounded-full text-xs hover:bg-accent-dark transition-all tracking-wide uppercase">
                            Submit
                            <svg class="w-3.5 h-3.5 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Links columns -->
                <div class="md:col-span-2">
                    <h4 class="text-sm font-semibold text-white mb-6">Platform</h4>
                    <ul class="space-y-3 text-sm text-white/50">
                        <li><a href="{{ route('public.organisations.index') }}" class="hover:text-white transition-colors">Organisations</a></li>
                        <li><a href="{{ route('public.merchants.index') }}" class="hover:text-white transition-colors">Merchants</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-white transition-colors">Sign Up</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-white transition-colors">Log In</a></li>
                    </ul>
                </div>
                <div class="md:col-span-2">
                    <h4 class="text-sm font-semibold text-white mb-6">Company</h4>
                    <ul class="space-y-3 text-sm text-white/50">
                        <li><a href="#" class="hover:text-white transition-colors">About Us</a></li>
                        @foreach(\App\Models\Page::all() as $page)
                            <li><a href="{{ route('public.page.show', $page->slug) }}" class="hover:text-white transition-colors">{{ $page->title }}</a></li>
                        @endforeach
                        <li><a href="#" class="hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>
                <div class="md:col-span-2">
                    <h4 class="text-sm font-semibold text-white mb-6">Resources</h4>
                    <ul class="space-y-3 text-sm text-white/50">
                        <li><a href="#" class="hover:text-white transition-colors">Help Center</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Pricing</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom bar -->
            <div class="mt-16 pt-8 border-t border-white/10 flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-xs text-white/30">&copy; {{ date('Y') }} MEMBRS Inc.</p>
                <div class="flex items-center space-x-6 text-xs text-white/30">
                    <a href="#" class="hover:text-white/60 transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-white/60 transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll animation script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.classList.add('visible');
                        }, index * 100);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

            document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
        });
    </script>
</body>

</html>
