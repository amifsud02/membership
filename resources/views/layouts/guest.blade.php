<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MEMBRS') }}</title>

    <!-- Fonts: Inter + Plus Jakarta Sans -->
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
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }
        .float-card {
            animation: float 6s ease-in-out infinite;
        }
        .float-card:nth-child(2) { animation-delay: -2s; }
        .float-card:nth-child(3) { animation-delay: -4s; }
    </style>
</head>

<body class="antialiased font-sans text-dark bg-white">
    <div class="min-h-screen flex flex-col lg:flex-row">

        <!-- LEFT: Form Side -->
        <div class="w-full lg:w-1/2 flex flex-col justify-center px-6 sm:px-12 lg:px-16 xl:px-24 py-12 lg:py-8 overflow-y-auto">
            <!-- Logo -->
            <div class="mb-10">
                <a href="/" class="inline-flex items-center space-x-2.5">
                    <div class="w-9 h-9 bg-dark rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <span class="text-lg font-bold tracking-tight text-dark font-heading">MEMBRS</span>
                </a>
            </div>

            <!-- Form Content -->
            <div class="w-full max-w-md">
                {{ $slot }}
            </div>

            <!-- Footer -->
            <div class="mt-12 pt-8 border-t border-gray-100">
                <p class="text-xs text-muted">&copy; {{ date('Y') }} MEMBRS Inc. All rights reserved.</p>
            </div>
        </div>

        <!-- RIGHT: Image / Brand Side -->
        <div class="hidden lg:flex w-1/2 relative overflow-hidden bg-gradient-to-br from-blue-400 via-blue-500 to-blue-600">
            <!-- Decorative shapes -->
            <div class="absolute inset-0">
                <div class="absolute top-20 left-16 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-32 right-12 w-96 h-96 bg-blue-300/20 rounded-full blur-3xl"></div>
                <div class="absolute top-1/2 left-1/3 w-48 h-48 bg-accent/10 rounded-full blur-2xl"></div>
            </div>

            <!-- Content -->
            <div class="relative z-10 flex flex-col justify-center items-center w-full px-16 xl:px-24">
                <!-- Floating cards -->
                <div class="relative w-full max-w-sm mb-16">
                    <!-- Card 1: Membership -->
                    <div class="float-card bg-white/15 backdrop-blur-xl rounded-3xl p-6 border border-white/20 mb-4">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 bg-accent rounded-2xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-white font-bold text-lg font-heading">Digital Cards</p>
                                <p class="text-white/60 text-sm">Instant activation</p>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <div class="flex-1 h-2 bg-accent rounded-full"></div>
                            <div class="flex-1 h-2 bg-white/20 rounded-full"></div>
                            <div class="flex-1 h-2 bg-white/20 rounded-full"></div>
                        </div>
                    </div>

                    <!-- Card 2: Stats -->
                    <div class="float-card bg-white/15 backdrop-blur-xl rounded-3xl p-6 border border-white/20 ml-12">
                        <div class="flex items-center justify-between mb-3">
                            <p class="text-white/60 text-xs font-semibold uppercase tracking-wider">Active Members</p>
                            <span class="px-2.5 py-1 bg-accent/20 text-accent text-xs font-bold rounded-full">+24%</span>
                        </div>
                        <p class="text-white text-3xl font-bold font-heading">12,847</p>
                        <div class="flex gap-1 mt-3">
                            <div class="w-2 h-8 bg-white/20 rounded-full"></div>
                            <div class="w-2 h-12 bg-white/30 rounded-full"></div>
                            <div class="w-2 h-6 bg-white/20 rounded-full"></div>
                            <div class="w-2 h-16 bg-accent/50 rounded-full"></div>
                            <div class="w-2 h-10 bg-white/30 rounded-full"></div>
                            <div class="w-2 h-20 bg-accent rounded-full"></div>
                        </div>
                    </div>
                </div>

                <!-- Text -->
                <div class="text-center max-w-md">
                    <h2 class="text-3xl xl:text-4xl font-bold text-white leading-tight mb-4 font-heading">
                        The smarter way to manage memberships
                    </h2>
                    <p class="text-white/60 text-sm leading-relaxed">
                        Join thousands of organisations using MEMBRS to create, manage, and grow their membership programs with digital cards and exclusive benefits.
                    </p>
                </div>

                <!-- Trust badges -->
                <div class="mt-12 flex items-center gap-8">
                    <div class="text-center">
                        <p class="text-white text-2xl font-bold font-heading">120+</p>
                        <p class="text-white/50 text-xs font-semibold uppercase tracking-wider">Partners</p>
                    </div>
                    <div class="w-px h-10 bg-white/20"></div>
                    <div class="text-center">
                        <p class="text-white text-2xl font-bold font-heading">50k+</p>
                        <p class="text-white/50 text-xs font-semibold uppercase tracking-wider">Members</p>
                    </div>
                    <div class="w-px h-10 bg-white/20"></div>
                    <div class="text-center">
                        <p class="text-white text-2xl font-bold font-heading">99.9%</p>
                        <p class="text-white/50 text-xs font-semibold uppercase tracking-wider">Uptime</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
