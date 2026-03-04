<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MEMBRS') }} - Customer Portal</title>

    <!-- Fonts -->
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
            }
            @layer base {
                h1, h2, h3, h4 { font-family: var(--font-heading); }
                body { font-family: var(--font-sans); }
            }
        </style>
</head>

<body class="antialiased bg-[#f8fafc] text-slate-900">
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Sidebar Navigation (Desktop) -->
        <aside class="hidden md:flex w-72 flex-col bg-white border-r border-slate-200 sticky top-0 h-screen">
            <div class="p-8">
                <a href="/" class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-slate-900 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <span class="text-2xl font-black tracking-tighter text-slate-900 font-heading">MEMB<span
                            class="text-primary">RS</span></span>
                </a>
            </div>

            <nav class="flex-1 px-4 py-4 space-y-2">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center px-4 py-3 text-sm font-bold {{ request()->routeIs('dashboard') ? 'bg-primary/10 text-primary rounded-2xl' : 'text-slate-500 hover:bg-slate-50 rounded-2xl transition-all' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('public.organisations.index') }}"
                    class="flex items-center px-4 py-3 text-sm font-bold text-slate-500 hover:bg-slate-50 rounded-2xl transition-all">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    Explore Partners
                </a>
                <a href="{{ route('dashboard') }}#marketplace"
                    class="flex items-center px-4 py-3 text-sm font-bold text-slate-500 hover:bg-slate-50 rounded-2xl transition-all">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                    </svg>
                    Exclusive Deals
                </a>
            </nav>

            <div class="p-6 border-t border-slate-100">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center px-4 py-3 text-sm font-bold text-red-500 hover:bg-red-50 rounded-2xl transition-all">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Sign Out
                    </button>
                </form>
            </div>
        </aside>

        <!-- Mobile Navbar -->
        <nav class="md:hidden bg-white border-b border-slate-100 p-4 sticky top-0 z-50">
            <div class="flex justify-between items-center">
                <span class="text-xl font-black font-heading tracking-tighter">MEMBRS</span>
                <button class="p-2 text-slate-500 hover:bg-slate-50 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <!-- Top Header (Desktop) -->
            <header
                class="hidden md:flex h-20 items-center justify-between px-10 bg-white/50 backdrop-blur-md border-b border-slate-100 sticky top-0 z-40">
                <h2 class="text-lg font-bold text-slate-900">
                    {{ $header ?? 'Welcome Back' }}
                </h2>
                <div class="flex items-center space-x-6">
                    <button class="relative p-2 text-slate-400 hover:text-primary transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span
                            class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                    <div class="flex items-center space-x-3 pl-6 border-l border-slate-200">
                        <div class="text-right">
                            <p class="text-sm font-bold text-slate-900 leading-none">{{ auth()->user()->name }}</p>
                            <p class="text-xs font-medium text-slate-400 mt-1 uppercase tracking-widest">
                                {{ auth()->user()->role->getLabel() }}
                            </p>
                        </div>
                        <div
                            class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-white font-black">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6 md:p-10">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>