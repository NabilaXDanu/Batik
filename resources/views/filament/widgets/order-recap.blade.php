<x-filament::widget>
    <x-filament::card class="relative overflow-hidden">
        <div class="relative z-10">
            <!-- Header with Dropdown -->
            <div class="mb-6 pb-2 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 flex items-center">
                    <x-filament::icon icon="heroicon-m-shopping-cart" class="w-6 h-6 mr-2 text-primary-500" />
                    <span>
                        {{ $this->recapType === 'all' ? 'All-Time Order Recap' : ($this->recapType === 'weekly' ? 'Weekly Order Recap' : 'Daily Order Recap') }}
                    </span>
                </h2>
                <x-filament::input.select wire:model="recapType" wire:change="setRecapType($event.target.value)">
                    <option value="all">All-Time Recap</option>
                    <option value="weekly">Weekly Recap</option>
                    <option value="daily">Daily Recap</option>
                </x-filament::input.select>
            </div>

            <!-- Recap Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                <x-filament::card class="p-4 hover:shadow-md transition-shadow">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Total Orders</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">
                        {{ $this->recapType === 'all' ? $this->getAllTimeRecapData()['total_orders'] : ($this->recapType === 'weekly' ? $this->getWeeklyRecapData()['total_orders'] : $this->getDailyRecapData()['total_orders']) }}
                    </p>
                    <div class="mt-2 h-1 bg-primary-100 dark:bg-primary-900 rounded-full"></div>
                </x-filament::card>

                <x-filament::card class="p-4 hover:shadow-md transition-shadow">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Total Amount</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">
                        Rp {{ $this->recapType === 'all' ? $this->getAllTimeRecapData()['total_amount'] : ($this->recapType === 'weekly' ? $this->getWeeklyRecapData()['total_amount'] : $this->getDailyRecapData()['total_amount']) }}
                    </p>
                    <div class="mt-2 h-1 bg-success-100 dark:bg-success-900 rounded-full"></div>
                </x-filament::card>

                <x-filament::card class="p-4 hover:shadow-md transition-shadow">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Status Breakdown</p>
                    <div class="text-sm text-gray-800 dark:text-white">
                        @foreach (($this->recapType === 'all' ? $this->getAllTimeRecapData()['status_counts'] : ($this->recapType === 'weekly' ? $this->getWeeklyRecapData()['status_counts'] : $this->getDailyRecapData()['status_counts'])) as $status => $count)
                            <p>{{ ucfirst($status) }}: {{ $count }}</p>
                        @endforeach
                    </div>
                    <div class="mt-2 h-1 bg-warning-100 dark:bg-warning-900 rounded-full"></div>
                </x-filament::card>
            </div>

            <!-- Orders Table -->
            <div class="mb-6 overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700">
                <div class="overflow-x-auto">
                    @if ($this->recapType !== 'all' && empty(($this->recapType === 'weekly' ? $this->getWeeklyRecapData()['orders'] : $this->getDailyRecapData()['orders'])))
                        <p class="p-4 text-gray-500 dark:text-gray-400 text-center">
                            No orders available for {{ $this->recapType === 'weekly' ? 'this week' : 'today' }}.
                        </p>
                    @else
                        <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Customer</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Total Amount</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Created At</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($this->recapType === 'all' ? $this->getAllTimeRecapData()['orders'] : ($this->recapType === 'weekly' ? $this->getWeeklyRecapData()['orders'] : $this->getDailyRecapData()['orders']) as $order)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $order['user_name'] }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">Rp {{ $order['total_amount'] }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                                {{ $order['status'] === 'completed' ? 'bg-success-100 dark:bg-success-900 text-success-800 dark:text-success-200' :
                                                   ($order['status'] === 'processing' ? 'bg-warning-100 dark:bg-warning-900 text-warning-800 dark:text-warning-200' :
                                                   ($order['status'] === 'pending' ? 'bg-primary-100 dark:bg-primary-900 text-primary-800 dark:text-primary-200' :
                                                   'bg-danger-100 dark:bg-danger-900 text-danger-800 dark:text-danger-200')) }}">
                                                {{ ucfirst($order['status']) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $order['created_at'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>

            <!-- Download Button -->
            <div class="flex justify-end">
                <x-filament::button icon="heroicon-m-arrow-down-tray" tag="a" href="{{ route('download-order-recap', ['recapType' => $this->recapType]) }}" size="sm">
                    Download Recap
                </x-filament::button>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
