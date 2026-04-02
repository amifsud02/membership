<x-guest-layout>

    <div class="mb-8">
        <div class="inline-flex items-center justify-center w-11 h-11 rounded-xl bg-primary/10 mb-4">
            <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </div>
        <h2 class="text-3xl font-bold text-dark mb-2 font-heading">Create Account</h2>
        <p class="text-muted text-sm">Join MEMBRS as a customer for exclusive benefits.</p>
    </div>

    @if (session('status'))
        <div class="mb-4 p-4 rounded-2xl bg-primary/5 text-primary text-sm font-semibold border border-primary/10">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf
        <input type="hidden" name="role" value="customer">

        <div class="space-y-1.5">
            <label for="name" class="text-xs font-semibold text-muted uppercase tracking-wider">Full Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                class="block w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none text-sm font-medium text-dark placeholder:text-gray-400"
                placeholder="John Doe">
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <div class="space-y-1.5">
            <label for="email" class="text-xs font-semibold text-muted uppercase tracking-wider">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                class="block w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none text-sm font-medium text-dark placeholder:text-gray-400"
                placeholder="john@example.com">
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <div class="space-y-1.5">
            <label for="password" class="text-xs font-semibold text-muted uppercase tracking-wider">Password</label>
            <input id="password" type="password" name="password" required
                class="block w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none text-sm font-medium text-dark placeholder:text-gray-400"
                placeholder="Minimum 8 characters">
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <div class="space-y-1.5">
            <label for="password_confirmation" class="text-xs font-semibold text-muted uppercase tracking-wider">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                class="block w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none text-sm font-medium text-dark placeholder:text-gray-400"
                placeholder="Repeat password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <button type="submit"
            class="w-full py-4 bg-dark text-white font-bold rounded-2xl hover:bg-primary transition-all text-sm tracking-wide uppercase">
            Create Customer Account
            <svg class="w-4 h-4 ml-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </button>

        <p class="text-center text-sm text-muted pt-2">
            Already have an account?
            <a href="{{ route('login') }}" class="font-semibold text-primary hover:underline">Sign in</a>
        </p>
    </form>

</x-guest-layout>
