<x-public-layout>
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-b from-gray-50 to-white pt-20 pb-32">
        <div class="max-w-5xl mx-auto px-6 lg:px-8 relative text-center">
            <span class="section-label mb-6 block">Merchant Network</span>
            <h1 class="text-5xl md:text-7xl font-bold text-dark leading-tight mb-6 font-heading">
                Our Global <span class="text-primary">Merchant</span><br>Partners
            </h1>
            <p class="text-muted text-lg max-w-2xl mx-auto leading-relaxed mb-10">
                Browse the elite businesses and brands where your memberships unlock world-class benefits and exclusive savings.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 max-w-lg mx-auto">
                <div class="relative w-full group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <input type="text" placeholder="Search by name or category..."
                        class="block w-full pl-12 pr-4 py-3.5 bg-white border border-gray-200 rounded-full focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none text-sm">
                </div>
            </div>
        </div>
    </section>

    <!-- Merchant Grid -->
    <section class="max-w-7xl mx-auto px-6 lg:px-8 -mt-16 relative z-10 pb-24">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($merchants as $merchant)
                <div class="card-hover bg-white rounded-3xl p-7 border border-gray-100 flex flex-col items-center text-center h-full">
                    <div class="w-16 h-16 bg-gray-50 rounded-2xl flex items-center justify-center mb-5 overflow-hidden">
                        @if($merchant->logo)
                            <img src="{{ Storage::disk('public')->url($merchant->logo) }}" alt="{{ $merchant->name }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        @endif
                    </div>

                    <h3 class="text-lg font-bold text-dark mb-1 font-heading">{{ $merchant->name }}</h3>
                    <p class="text-xs font-semibold text-primary uppercase tracking-wider mb-4">
                        {{ $merchant?->organisation?->name ?? 'N/A' }}
                    </p>
                    <p class="text-sm text-muted leading-relaxed mb-6 flex-1">
                        {{ $merchant->description ?? "Verified partner accepting all tier-specific memberships." }}
                    </p>

                    <div class="w-full pt-5 border-t border-gray-50">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold bg-green-50 text-green-600 tracking-widest uppercase border border-green-100">
                            Active Partner
                        </span>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-dashed border-gray-200">
                    <p class="text-muted text-sm">Coming soon: Our network of verified merchants.</p>
                </div>
            @endforelse
        </div>
    </section>
</x-public-layout>
