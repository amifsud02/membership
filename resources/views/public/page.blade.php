<x-public-layout>
    <section class="py-24">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="mb-12 fade-up">
                <span class="section-label mb-4 block">Page</span>
                <h1 class="text-4xl md:text-6xl font-bold text-dark leading-tight mb-8 font-heading">{{ $page->title }}</h1>
                @if($page->image)
                    <div class="rounded-3xl overflow-hidden border border-gray-100 mb-12">
                        <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->title }}" class="w-full h-auto">
                    </div>
                @endif
            </div>

            <div class="prose prose-lg max-w-none text-muted leading-relaxed">
                {!! $page->body !!}
            </div>

            <div class="mt-20 pt-8 border-t border-gray-100 flex items-center justify-between">
                <a href="/" class="inline-flex items-center text-sm font-semibold text-primary hover:underline">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7 7-7" />
                    </svg>
                    Back to Home
                </a>
                <p class="text-xs text-muted">Last updated {{ $page->updated_at->format('M d, Y') }}</p>
            </div>
        </div>
    </section>
</x-public-layout>
