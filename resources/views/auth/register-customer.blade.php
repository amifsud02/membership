<x-guest-layout>

    {{-- Header --}}
    <div class="mb-8 text-center">
        <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-indigo-500/10 mb-4">
            <svg class="w-7 h-7 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </div>
        <h2 class="text-3xl font-black text-slate-900 mb-1">Create Account</h2>
        <p class="text-slate-400 font-medium text-sm">Join MEMBRS as a customer for exclusive benefits</p>
    </div>

    {{-- Session Status --}}
    @if (session('status'))
        <div class="mb-4 p-4 rounded-xl bg-indigo-50 text-indigo-700 text-sm font-semibold border border-indigo-100">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        {{-- Role --}}
        <input type="hidden" name="role" value="customer">

        {{-- Full Name --}}
        <div class="space-y-1">
            <label for="name" class="text-xs font-black text-slate-400 uppercase tracking-widest pl-1">Full
                Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                class="block w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-[18px] focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none font-semibold text-slate-900 placeholder:text-slate-300"
                placeholder="John Doe">
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        {{-- Email --}}
        <div class="space-y-1">
            <label for="email" class="text-xs font-black text-slate-400 uppercase tracking-widest pl-1">Email
                Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                class="block w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-[18px] focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none font-semibold text-slate-900 placeholder:text-slate-300"
                placeholder="john@example.com">
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        {{-- Password --}}
        <div class="space-y-1">
            <label for="password"
                class="text-xs font-black text-slate-400 uppercase tracking-widest pl-1">Password</label>
            <input id="password" type="password" name="password" required
                class="block w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-[18px] focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none font-semibold text-slate-900 placeholder:text-slate-300"
                placeholder="Minimum 8 characters">
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        {{-- Confirm Password --}}
        <div class="space-y-1">
            <label for="password_confirmation"
                class="text-xs font-black text-slate-400 uppercase tracking-widest pl-1">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                class="block w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-[18px] focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none font-semibold text-slate-900 placeholder:text-slate-300"
                placeholder="Repeat password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <button type="submit"
            class="w-full py-5 bg-indigo-600 text-white font-black rounded-[20px] hover:bg-indigo-700 active:scale-[0.98] transition-all shadow-lg shadow-indigo-500/20 hover:shadow-indigo-600/30">
            Create Customer Account
        </button>

        <p class="text-center text-sm font-medium text-slate-400 pt-2">
            Already have an account?
            <a href="{{ route('login') }}" class="text-indigo-600 font-bold hover:underline">Sign in</a>
        </p>
    </form>

</x-guest-layout>
