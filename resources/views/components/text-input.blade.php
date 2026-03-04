@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'block w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-[20px] focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none font-bold text-slate-900 placeholder:text-slate-300']) }}>