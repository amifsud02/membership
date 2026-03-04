<x-guest-layout>
    <div class="mb-10 text-center">
        <h2 class="text-3xl font-black text-slate-900 mb-2">Create New Password</h2>
        <p class="text-slate-400 font-medium">Please enter your new credentials below.</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="space-y-2">
            <label for="email" class="text-xs font-black text-slate-400 uppercase tracking-widest pl-1">Email
                Address</label>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus
                class="block w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-[20px] focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none font-bold text-slate-900"
                placeholder="name@example.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <label for="password" class="text-xs font-black text-slate-400 uppercase tracking-widest pl-1">New
                Password</label>
            <input id="password" type="password" name="password" required
                class="block w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-[20px] focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none font-bold text-slate-900"
                placeholder="Minimum 8 characters">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="space-y-2">
            <label for="password_confirmation"
                class="text-xs font-black text-slate-400 uppercase tracking-widest pl-1">Confirm New Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                class="block w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-[20px] focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none font-bold text-slate-900"
                placeholder="Repeat password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button type="submit"
            class="w-full py-5 bg-slate-900 text-white font-black rounded-[24px] hover:bg-primary transition-all shadow-xl shadow-slate-200 hover:shadow-primary/30 transform hover:-translate-y-1">
            Update Password
        </button>
    </form>
</x-guest-layout>