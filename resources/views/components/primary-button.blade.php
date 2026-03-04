<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-8 py-4 bg-slate-900 text-white font-black rounded-[24px] hover:bg-primary transition-all shadow-xl shadow-slate-200 hover:shadow-primary/30 transform hover:-translate-y-1 inline-flex items-center justify-center']) }}>
    {{ $slot }}
</button>