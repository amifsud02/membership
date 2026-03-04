<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-8 py-4 bg-red-600 text-white font-black rounded-[24px] hover:bg-red-700 transition-all shadow-xl shadow-red-200 hover:shadow-red-500/30 transform hover:-translate-y-1 inline-flex items-center justify-center']) }}>
    {{ $slot }}
</button>