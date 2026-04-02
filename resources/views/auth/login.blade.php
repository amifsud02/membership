<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-dark mb-2 font-heading">Welcome back</h2>
        <p class="text-muted text-sm">Enter your credentials to access your account.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status
        class="mb-6 rounded-2xl bg-primary/5 p-4 text-primary text-sm font-semibold border border-primary/10"
        :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div class="space-y-1.5">
            <label for="email" class="text-xs font-semibold text-muted uppercase tracking-wider">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                class="block w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none text-sm font-medium text-dark placeholder:text-gray-400"
                placeholder="name@example.com">
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div class="space-y-1.5">
            <div class="flex justify-between items-center">
                <label for="password" class="text-xs font-semibold text-muted uppercase tracking-wider">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-xs font-semibold text-primary hover:underline" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>
            <input id="password" type="password" name="password" required
                class="block w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none text-sm font-medium text-dark placeholder:text-gray-400"
                placeholder="Enter your password">
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Remember Me -->
        <label for="remember_me" class="inline-flex items-center group cursor-pointer">
            <input id="remember_me" type="checkbox"
                class="w-4 h-4 rounded-md border-gray-300 text-primary focus:ring-primary/20 shadow-sm transition-all"
                name="remember">
            <span class="ms-2.5 text-sm font-medium text-muted group-hover:text-dark transition-colors">Remember me</span>
        </label>

        <button type="submit"
            class="w-full py-4 bg-dark text-white font-bold rounded-2xl hover:bg-primary transition-all text-sm tracking-wide uppercase">
            Sign In
            <svg class="w-4 h-4 ml-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </button>

        <p class="text-center text-sm text-muted mt-6">
            Don't have an account?
            <a href="{{ route('register') }}" class="font-semibold text-primary hover:underline">Create one free</a>
        </p>
    </form>
</x-guest-layout>
