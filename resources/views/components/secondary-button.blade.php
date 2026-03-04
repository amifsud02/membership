<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-8 py-4 bg-slate-50 text-slate-600 border border-slate-100 font-bold rounded-[24px] hover:bg-slate-100 transition-all inline-flex items-center justify-center']) }}>
    {{ $slot }}
</button>