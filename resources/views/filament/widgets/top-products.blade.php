<x-filament::widget>
    <x-filament::card class="relative overflow-hidden">
        <div class="relative z-10">
            <!-- Header with Dropdown -->
            <div class="mb-6 pb-2 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 flex items-center">
                    <x-filament::icon icon="heroicon-m-arrow-trending-up" class="w-6 h-6 mr-2 text-primary-500" />
                    <span>
                        {{ $this->recapType === 'all' ? 'Rekap Produk Teratas' : ($this->recapType === 'weekly' ? 'Rekap Produk Mingguan' : 'Rekap Produk Harian') }}
                    </span>
                </h2>
                <x-filament::input.select wire:model="recapType" wire:change="setRecapType($event.target.value)">
                    <option value="all">Rekap Semua Waktu</option>
                    <option value="weekly">Rekap Mingguan</option>
                    <option value="daily">Rekap Harian</option>
                </x-filament::input.select>
            </div>

            <!-- Recap Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <x-filament::card class="p-4 hover:shadow-md transition-shadow">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                        {{ $this->recapType === 'all' ? 'Jumlah Produk' : 'Total Produk Terjual' }}
                    </p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">
                        {{ $this->recapType === 'all' ? ($this->getRecapData()['total_products'] ?? 0) : ($this->recapType === 'weekly' ? ($this->getWeeklyRecapData()['total_products_sold'] ?? 0) : ($this->getDailyRecapData()['total_products_sold'] ?? 0)) }}
                    </p>
                    <div class="mt-2 h-1 bg-primary-100 dark:bg-primary-900 rounded-full"></div>
                </x-filament::card>

                <x-filament::card class="p-4 hover:shadow-md transition-shadow">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Stok Tertinggi</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">
                        {{ $this->recapType === 'all' ? ($this->getRecapData()['highest_stock'] ?? 0) : ($this->recapType === 'weekly' ? ($this->getWeeklyRecapData()['highest_stock'] ?? 0) : ($this->getDailyRecapData()['highest_stock'] ?? 0)) }}
                    </p>
                    <div class="mt-2 h-1 bg-success-100 dark:bg-success-900 rounded-full"></div>
                </x-filament::card>

                <x-filament::card class="p-4 hover:shadow-md transition-shadow">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Stok Terendah</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">
                        {{ $this->recapType === 'all' ? ($this->getRecapData()['lowest_stock'] ?? 0) : ($this->recapType === 'weekly' ? ($this->getWeeklyRecapData()['lowest_stock'] ?? 0) : ($this->getDailyRecapData()['lowest_stock'] ?? 0)) }}
                    </p>
                    <div class="mt-2 h-1 bg-gray-100 dark:bg-gray-900 rounded-full"></div>
                </x-filament::card>

                <x-filament::card class="p-4 hover:shadow-md transition-shadow">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Harga Rata-rata</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">
                        Rp {{ $this->recapType === 'all' ? ($this->getRecapData()['average_price'] ?? '0,00') : ($this->recapType === 'weekly' ? ($this->getWeeklyRecapData()['average_price'] ?? '0,00') : ($this->getDailyRecapData()['average_price'] ?? '0,00')) }}
                    </p>
                    <div class="mt-2 h-1 bg-warning-100 dark:bg-warning-900 rounded-full"></div>
                </x-filament::card>
            </div>

            <!-- Batik Types -->
            <div class="mb-8">
                <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">Jenis Batik</p>
                <div class="flex flex-wrap gap-2">
                    @php
                        $batikTypes = match ($this->recapType) {
                            'all' => $this->getRecapData()['batik_types'] ?? [],
                            'weekly' => $this->getWeeklyRecapData()['batik_types'] ?? [],
                            'daily' => $this->getDailyRecapData()['batik_types'] ?? [],
                            default => [],
                        };
                    @endphp
                    @if (!empty($batikTypes) && is_array($batikTypes))
                        @foreach ($batikTypes as $type)
                            <span class="px-3 py-1 bg-primary-100 dark:bg-primary-900 text-primary-800 dark:text-primary-200 text-sm font-medium rounded-full">
                                {{ $type }}
                            </span>
                        @endforeach
                    @else
                        <span class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-sm font-medium rounded-full">
                            Tidak ada jenis batik tersedia
                        </span>
                    @endif
                </div>
            </div>

            <!-- Products Table -->
            <div class="mb-6 overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700">
                <div class="overflow-x-auto">
                    @php
                        $products = match ($this->recapType) {
                            'all' => $this->getRecapData()['products'] ?? [],
                            'weekly' => $this->getWeeklyRecapData()['products'] ?? [],
                            'daily' => $this->getDailyRecapData()['products'] ?? [],
                            default => [],
                        };
                    @endphp
                    @if (!empty($products) && is_array($products))
                        <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Produk</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Jenis</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Harga</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ $this->recapType === 'all' ? 'Stok' : 'Jumlah Terjual' }}</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Pratinjau</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($products as $product)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10 mr-3 bg-gray-200 dark:bg-gray-600 rounded-md overflow-hidden">
                                                    @if ($product['image'] ?? false)
                                                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] ?? '-' }}" class="h-full w-full object-cover">
                                                    @else
                                                        <div class="h-full w-full flex items-center justify-center text-gray-400 dark:text-gray-500">
                                                            <x-filament::icon icon="heroicon-m-photo" class="w-6 h-6" />
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                    {{ $product['name'] ?? '-' }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            {{ $product['batik_type'] ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            Rp {{ $product['price'] ?? '0,00' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                                {{ ($this->recapType === 'all' ? ($product['stock'] ?? 0) : ($product['quantity_sold'] ?? 0)) > 50
                                                    ? 'bg-success-100 dark:bg-success-900 text-success-800 dark:text-success-200'
                                                    : ((($this->recapType === 'all' ? ($product['stock'] ?? 0) : ($product['quantity_sold'] ?? 0)) > 20)
                                                        ? 'bg-warning-100 dark:bg-warning-900 text-warning-800 dark:text-warning-200'
                                                        : 'bg-danger-100 dark:bg-danger-900 text-danger-800 dark:text-danger-200') }}">
                                                {{ $this->recapType === 'all' ? ($product['stock'] ?? 0) : ($product['quantity_sold'] ?? 0) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            @if ($product['image'] ?? false)
                                                <a href="{{ $product['image'] }}" target="_blank" class="inline-flex items-center text-primary-600 dark:text-primary-400 hover:text-primary-800 dark:hover:text-primary-300">
                                                    Lihat
                                                    <x-filament::icon icon="heroicon-m-arrow-top-right-on-square" class="ml-1 w-4 h-4" />
                                                </a>
                                            @else
                                                <span class="text-gray-400 dark:text-gray-500">Tidak ada</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="p-4 text-center text-gray-500 dark:text-gray-400">
                            Tidak ada data penjualan tersedia untuk {{ $this->recapType === 'weekly' ? 'minggu ini' : ($this->recapType === 'daily' ? 'hari ini' : 'semua waktu') }}.
                        </p>
                    @endif
                </div>
            </div>

            <!-- Download Button -->
            <div class="flex justify-end">
                <x-filament::button icon="heroicon-m-arrow-down-tray" tag="a" href="{{ route('download-top-products-recap', ['recapType' => $this->recapType]) }}" size="sm" title="Unduh sebagai PDF melalui dialog cetak">
                    Unduh Rekap
                </x-filament::button>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
