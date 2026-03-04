<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Membership Platform') }}</title>

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
                --color-primary: #6366f1;
            }
            @layer base {
                h1, h2, h3, h4 { font-family: var(--font-heading); }
                body { font-family: var(--font-sans); }
            }
        </style>
</head>

<body class="antialiased font-sans text-slate-900 bg-slate-50">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="mb-10 transform hover:scale-105 transition-transform duration-500">
            <a href="/" class="flex flex-col items-center space-y-4">
                <div
                    class="w-16 h-16 bg-slate-900 rounded-3xl flex items-center justify-center shadow-2xl shadow-slate-200">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <span class="text-3xl font-black tracking-tighter text-slate-900 font-heading">MEMB<span
                        class="text-primary">RS</span></span>
            </a>
        </div>

        <div
            class="w-full sm:max-w-md px-10 py-12 bg-white shadow-[0_32px_64px_-16px_rgba(0,0,0,0.1)] rounded-[40px] border border-slate-50 relative overflow-hidden">
            <!-- Background Accent -->
            <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full -translate-y-1/2 translate-x-1/2">
            </div>

            <div class="relative z-10">
                {{ $slot }}
            </div>
        </div>

        <!-- Back to Home Link -->
        <div class="mt-8">
            <a href="/" class="text-sm font-bold text-slate-400 hover:text-primary transition-colors flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7 7-7" />
                </svg>
                Back to membership portal
            </a>
        </div>
    </div>
</body>

</html>