<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Membership Platform') }}</title>

    <!-- Fonts: Outfit for headings, Inter for body -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Tailwind v4 -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        @theme {
                --font-heading: 'Outfit', sans-serif;
                --font-sans: 'Inter', sans-serif;
                --color-primary: #f59e0b;
                --color-primary-dark: #d97706;
            }
            @layer base {
                h1, h2, h3, h4 { font-family: var(--font-heading); }
                body { font-family: var(--font-sans); }
            }
        </style>
</head>

<body class="antialiased bg-[#fdfdfd] text-slate-900">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="/" class="flex items-center space-x-2">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-primary to-indigo-800 rounded-xl flex items-center justify-center shadow-lg shadow-primary/20">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <span class="text-2xl font-black tracking-tight text-slate-900 font-heading">MEMB<span
                                class="text-primary">RS</span></span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/organisations"
                        class="text-sm font-semibold text-slate-600 hover:text-primary transition-colors">Organisations</a>
                    <a href="/merchants"
                        class="text-sm font-semibold text-slate-600 hover:text-primary transition-colors">Merchants</a>
                    <a href="#" class="text-sm font-semibold text-slate-600 hover:text-primary transition-colors">How it
                        works</a>
                    <a href="#"
                        class="text-sm font-semibold text-slate-600 hover:text-primary transition-colors">Pricing</a>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="text-sm font-bold text-slate-700 hover:text-primary transition-colors">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm font-bold text-slate-700 hover:text-primary transition-colors">Log in</a>
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center justify-center px-5 py-2.5 rounded-full bg-slate-900 text-white text-sm font-bold hover:bg-slate-800 transition-all shadow-xl shadow-slate-200">Get
                            Started</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-100 py-20 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="col-span-2">
                    <a href="/" class="flex items-center space-x-2 mb-6">
                        <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <span class="text-xl font-black tracking-tight text-slate-900 font-heading">MEMBRS</span>
                    </a>
                    <p class="text-slate-500 max-w-sm leading-relaxed">The ultimate loyalty platform for small merchants
                        and large organisations. Unlocking exclusive rewards for everyone.</p>
                </div>
                <div>
                    <h4 class="font-bold text-slate-900 mb-6">Product</h4>
                    <ul class="space-y-4 text-sm font-medium text-slate-500">
                        <li><a href="#" class="hover:text-primary">Features</a></li>
                        <li><a href="#" class="hover:text-primary">Merchants</a></li>
                        <li><a href="#" class="hover:text-primary">Organisations</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-slate-900 mb-6">Company</h4>
                    <ul class="space-y-4 text-sm font-medium text-slate-500">
                        <li><a href="#" class="hover:text-primary">About</a></li>
                        @foreach(\App\Models\Page::all() as $page)
                            <li><a href="{{ route('public.page.show', $page->slug) }}"
                                    class="hover:text-primary transition-colors">{{ $page->title }}</a></li>
                        @endforeach
                        <li><a href="#" class="hover:text-primary">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-20 pt-8 border-t border-slate-50 flex justify-between items-center">
                <p class="text-xs text-slate-400">&copy; {{ date('Y') }} Membrs. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>