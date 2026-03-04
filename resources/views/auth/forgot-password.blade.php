<x-guest-layout>
    <div class="mb-10 text-center">
        <h2 class="text-3xl font-black text-slate-900 mb-2">Reset Password</h2>
        <p class="text-slate-400 font-medium">Forgot your password? No problem. Enter your email and we'll send you a
            link to choose a new one.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status
        class="mb-6 rounded-2xl bg-indigo-50 p-4 text-indigo-700 text-sm font-bold border border-indigo-100"
        :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
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

        <button type="submit"
            class="w-full py-5 bg-slate-900 text-white font-black rounded-[24px] hover:bg-primary transition-all shadow-xl shadow-slate-200 hover:shadow-primary/30 transform hover:-translate-y-1">
            Email Reset Link
        </button>

        <p class="text-center text-sm font-bold text-slate-400 mt-8">
            Remembered it?
            <a href="{{ route('login') }}" class="text-primary hover:underline">Go back to login</a>
        </p>
    </form>
</x-guest-layout>