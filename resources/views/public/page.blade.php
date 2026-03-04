<x-public-layout>
    <div class="relative py-24 overflow-hidden">
        <div
            class="absolute top-0 right-0 w-[600px] h-[600px] bg-primary/5 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2">
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="mb-12">
                <h1 class="text-4xl md:text-6xl font-black text-slate-900 leading-tight mb-8">{{ $page->title }}</h1>
                @if($page->image)
                    <div class="rounded-[40px] overflow-hidden shadow-2xl mb-12">
                        <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->title }}" class="w-full h-auto">
                    </div>
                @endif
            </div>

            <div class="prose prose-slate prose-lg max-w-none text-slate-600 leading-relaxed">
                {!! $page->body !!}
            </div>

            <div class="mt-24 pt-12 border-t border-slate-100 flex items-center justify-between">
                <a href="/" class="text-sm font-bold text-primary hover:underline flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7 7-7" />
                    </svg>
                    Back to Home
                </a>
                <p class="text-xs text-slate-400">Last updated {{ $page->updated_at->format('M d, Y') }}</p>
            </div>
        </div>
    </div>
</x-public-layout>