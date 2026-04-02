<x-public-layout>
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-b from-gray-50 to-white pt-20 pb-32">
        <div class="max-w-5xl mx-auto px-6 lg:px-8 relative text-center">
            <span class="section-label mb-6 block">Partner Network</span>
            <h1 class="text-5xl md:text-7xl font-bold text-dark leading-tight mb-6 font-heading">
                Discover Premium<br><span class="text-primary">Organisations</span>
            </h1>
            <p class="text-muted text-lg max-w-2xl mx-auto leading-relaxed mb-10">
                Connect with industry leaders and unlock exclusive membership benefits designed specifically for you.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 max-w-lg mx-auto">
                <div class="relative w-full group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <input type="text" placeholder="Search by name or industry..."
                        class="block w-full pl-12 pr-4 py-3.5 bg-white border border-gray-200 rounded-full focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none text-sm">
                </div>
            </div>
        </div>
    </section>

    <!-- Organisation Grid -->
    <section class="max-w-7xl mx-auto px-6 lg:px-8 -mt-16 relative z-10 pb-24">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($organisations as $organisation)
                <div class="card-hover bg-white rounded-3xl p-8 border border-gray-100 flex flex-col h-full">
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 bg-gray-50 rounded-2xl flex items-center justify-center overflow-hidden">
                            @if($organisation->logo)
                                <img src="{{ Storage::disk('public')->url($organisation->logo) }}" alt="{{ $organisation->name }}" class="w-full h-full object-cover">
                            @else
                                <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            @endif
                        </div>
                        <div class="flex gap-0.5">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 text-amber-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                    </div>

                    <h3 class="text-xl font-bold text-dark mb-2 font-heading">{{ $organisation->name }}</h3>
                    <p class="text-sm text-muted leading-relaxed mb-8 flex-1">
                        {{ $organisation->description ?? 'Providing top-tier membership solutions and community engagement for verified members across the region.' }}
                    </p>

                    <div class="pt-6 border-t border-gray-50 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-semibold text-muted uppercase tracking-wider">Plans:</span>
                            <span class="text-sm font-bold text-dark">{{ $organisation->membership_plans_count ?? $organisation->membershipPlans->count() }}</span>
                        </div>
                        <a href="{{ route('public.organisations.show', $organisation) }}"
                            class="inline-flex items-center justify-center w-10 h-10 bg-dark text-white rounded-full hover:bg-primary transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center bg-white rounded-3xl border border-dashed border-gray-200">
                    <p class="text-muted text-sm">No organisations found matching your criteria.</p>
                </div>
            @endforelse
        </div>
    </section>
</x-public-layout>
