<x-guest-layout>
    <div class="mb-10 text-center">
        <h2 class="text-3xl font-black text-slate-900 mb-2">Check Your Inbox</h2>
        <p class="text-slate-400 font-medium leading-relaxed">Thanks for signing up! Before getting started, please
            verify your email address by clicking on the link we just sent to you. 📧</p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div
            class="mb-8 rounded-2xl bg-green-50 p-4 text-green-700 text-sm font-bold border border-green-100 flex items-start">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ __('A new verification link has been sent to your email address.') }}
        </div>
    @endif

    <div class="space-y-6">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit"
                class="w-full py-5 bg-slate-900 text-white font-black rounded-[24px] hover:bg-primary transition-all shadow-xl shadow-slate-200 hover:shadow-primary/30 transform hover:-translate-y-1">
                Resend Verification Email
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="text-center">
            @csrf
            <button type="submit" class="text-sm font-bold text-slate-400 hover:text-red-500 transition-colors">
                {{ __('Maybe later? Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>