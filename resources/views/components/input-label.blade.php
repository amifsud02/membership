<label {{ $attributes->merge(['class' => 'text-xs font-black text-slate-400 uppercase tracking-widest pl-1 mb-2 block']) }}>
    {{ $value ?? $slot }}
</label>