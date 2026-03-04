<x-public-layout>
    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-slate-50 pt-16 pb-32">
        <div class="absolute top-0 right-0 -translate-y-12 translate-x-12 blur-3xl opacity-20 pointer-events-none">
            <div class="w-[600px] h-[600px] bg-primary rounded-full"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center max-w-3xl mx-auto">
                <span
                    class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-primary/10 text-primary tracking-widest uppercase mb-6">
                    Merchant Network
                </span>
                <h1 class="text-5xl md:text-7xl font-black text-slate-900 leading-tight mb-8">
                    Our Global <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-amber-600">Merchant</span>
                    Partners
                </h1>
                <p class="text-xl text-slate-500 leading-relaxed mb-12">
                    Browse the elite businesses and brands where your memberships unlock world-class benefits and
                    exclusive savings.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <div class="relative w-full max-w-md group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400 group-focus-within:text-primary transition-colors"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" placeholder="Search by name or category..."
                            class="block w-full pl-12 pr-4 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Merchant Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($merchants as $merchant)
                <div
                    class="group bg-white rounded-[32px] p-8 shadow-xl shadow-slate-100 border border-slate-50 hover:border-primary/20 hover:shadow-2xl hover:shadow-primary/5 transition-all duration-500 flex flex-col items-center text-center h-full transform hover:-translate-y-2">
                    <div
                        class="w-20 h-20 bg-slate-50 rounded-[24px] flex items-center justify-center mb-6 group-hover:bg-primary/5 transition-colors overflow-hidden">
                        @if($merchant->logo)
                            <img src="{{ Storage::disk('public')->url($merchant->logo) }}" alt="{{ $merchant->name }}"
                                class="w-full h-full object-cover">
                        @else
                            <svg class="w-10 h-10 text-slate-400 group-hover:text-primary transition-colors" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        @endif
                    </div>

                    <h3 class="text-xl font-black text-slate-900 mb-2">{{ $merchant->name }}</h3>
                    <p class="text-xs font-black text-primary uppercase tracking-[0.2em] mb-6">
                        {{ $merchant?->organisation?->name ?? 'N/A' }}
                    </p>

                    <p class="text-slate-500 text-sm leading-relaxed mb-8 flex-1">
                        {{ $merchant->description ?? "Verified partner accepting all tier-specific memberships from {$merchant?->organisation?->name}." }}
                    </p>

                    <div class="w-full pt-6 border-t border-slate-50">
                        <span
                            class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black bg-emerald-50 text-emerald-600 tracking-widest uppercase border border-emerald-100">
                            ACTIVE PARTNER
                        </span>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center bg-white rounded-[32px] border border-dashed border-slate-200">
                    <p class="text-slate-500 font-medium">Coming soon: Our network of verified luxury merchants.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-public-layout>