<x-public-layout>
    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-slate-50 pt-16 pb-32">
        <div class="absolute top-0 right-0 -translate-y-12 translate-x-12 blur-3xl opacity-20 pointer-events-none">
            <div class="w-[600px] h-[600px] bg-primary rounded-full"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center max-w-3xl mx-auto">
                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-primary/10 text-primary tracking-widest uppercase mb-6">
                    Partner Network
                </span>
                <h1 class="text-5xl md:text-7xl font-black text-slate-900 leading-tight mb-8">
                    Discover Premium <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-indigo-600">Organisations</span>
                </h1>
                <p class="text-xl text-slate-500 leading-relaxed mb-12">
                    Connect with industry leaders and unlock exclusive membership benefits designed specifically for you.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <div class="relative w-full max-w-md group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400 group-focus-within:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>
                        <input type="text" placeholder="Search by name or industry..." class="block w-full pl-12 pr-4 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none">
                    </div>
                    <button class="w-full sm:w-auto px-8 py-4 bg-slate-900 text-white font-bold rounded-2xl hover:bg-slate-800 transition-all shadow-xl shadow-slate-200">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Organisation Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($organisations as $organisation)
                <div class="group bg-white rounded-[32px] p-8 shadow-xl shadow-slate-100 border border-slate-50 hover:border-primary/20 hover:shadow-2xl hover:shadow-primary/5 transition-all duration-500 flex flex-col h-full transform hover:-translate-y-2">
                    <div class="flex items-start justify-between mb-8">
                        <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center group-hover:bg-primary/5 transition-colors overflow-hidden">
                            @if($organisation->logo)
                                <img src="{{ Storage::disk('public')->url($organisation->logo) }}" alt="{{ $organisation->name }}" class="w-full h-full object-cover">
                            @else
                                <svg class="w-8 h-8 text-slate-400 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            @endif
                        </div>
                        <div class="flex space-x-1">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 text-orange-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-slate-900 group-hover:text-primary transition-colors mb-3">{{ $organisation->name }}</h3>
                    <p class="text-slate-500 leading-relaxed mb-8 flex-1">
                        {{ $organisation->description ?? 'Providing top-tier membership solutions and community engagement for verified members across the region.' }}
                    </p>
                    
                    <div class="pt-6 border-t border-slate-50 flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Active Plans:</span>
                            <span class="text-sm font-black text-slate-900">{{ $organisation->membership_plans_count ?? $organisation->membershipPlans->count() }}</span>
                        </div>
                        <a href="{{ route('public.organisations.show', $organisation) }}" class="inline-flex items-center justify-center w-12 h-12 bg-slate-900 text-white rounded-xl hover:bg-primary transition-all shadow-lg hover:shadow-primary/30">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center bg-white rounded-[32px] border border-dashed border-slate-200">
                    <p class="text-slate-500 font-medium">No organisations found matching your criteria.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-public-layout>
