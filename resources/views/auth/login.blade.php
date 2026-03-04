<x-guest-layout>
    <div class="mb-10 text-center">
        <h2 class="text-3xl font-black text-slate-900 mb-2">Welcome Back</h2>
        <p class="text-slate-400 font-medium">Please enter your details to sign in.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status
        class="mb-6 rounded-2xl bg-indigo-50 p-4 text-indigo-700 text-sm font-bold border border-indigo-100"
        :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div class="space-y-2">
            <label for="email" class="text-xs font-black text-slate-400 uppercase tracking-widest pl-1">Email
                Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                class="block w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-[20px] focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none font-bold text-slate-900"
                placeholder="name@example.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <div class="flex justify-between items-center pl-1">
                <label for="password"
                    class="text-xs font-black text-slate-400 uppercase tracking-widest">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-xs font-bold text-primary hover:underline" href="{{ route('password.request') }}">
                        Forgot?
                    </a>
                @endif
            </div>
            <input id="password" type="password" name="password" required
                class="block w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-[20px] focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none font-bold text-slate-900"
                placeholder="••••••••">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <label for="remember_me" class="inline-flex items-center group cursor-pointer pl-1">
            <input id="remember_me" type="checkbox"
                class="w-5 h-5 rounded-lg border-slate-200 text-primary focus:ring-primary shadow-sm transition-all"
                name="remember">
            <span class="ms-3 text-sm font-bold text-slate-500 group-hover:text-slate-700 transition-colors">Remember
                this device</span>
        </label>

        <button type="submit"
            class="w-full py-5 bg-slate-900 text-white font-black rounded-[24px] hover:bg-primary transition-all shadow-xl shadow-slate-200 hover:shadow-primary/30 transform hover:-translate-y-1">
            Sign In
        </button>

        <p class="text-center text-sm font-bold text-slate-400 mt-8">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-primary hover:underline">Create one free</a>
        </p>
    </form>
</x-guest-layout>