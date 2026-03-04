<x-filament-panels::page>
    <div class="space-y-6">
        <div class="p-4 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-3 mb-2">
                <!-- <x-heroicon-o-chart-bar class="w-6 h-6 text-primary-500" /> -->
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Sales & Transaction History</h3>
            </div>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                View all membership purchases and transaction details for your organisation.
            </p>
        </div>

        {{ $this->table }}
    </div>
</x-filament-panels::page>