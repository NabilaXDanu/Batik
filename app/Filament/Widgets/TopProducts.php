<?php

namespace App\Filament\Widgets;

use App\Models\OrderItem;
use App\Models\Product;
use Filament\Widgets\Widget;
use Illuminate\Support\Carbon;

class TopProducts extends Widget
{
    protected static ?int $sort = 2;
    protected static string $view = 'filament.widgets.top-products';

    public $recapType = 'all';

    public function getTopProducts()
    {
        return Product::query()
            ->orderBy('stock', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($product) {
                return [
                    'name' => $product->name,
                    'batik_type' => $product->batik_type ?? '-',
                    'price' => number_format($product->price, 2, ',', '.'), // IDR format
                    'stock' => $product->stock,
                    'image' => $product->image ? asset('storage/' . $product->image) : null,
                ];
            })
            ->toArray();
    }

    public function getRecapData()
    {
        $products = $this->getTopProducts();
        return [
            'total_products' => count($products),
            'highest_stock' => max(array_column($products, 'stock') ?: [0]),
            'lowest_stock' => min(array_column($products, 'stock') ?: [0]),
            'average_price' => number_format(
                array_sum(array_map(function ($p) {
                    return str_replace(['.', ','], '', $p['price']);
                }, $products)) / max(1, count($products)),
                2,
                ',',
                '.'
            ),
            'batik_types' => array_unique(array_filter(array_column($products, 'batik_type'))),
            'products' => $products,
        ];
    }

    public function getWeeklyRecapData()
    {
        $startDate = Carbon::now()->subDays(7)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $orderItems = OrderItem::query()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->with('product')
            ->whereHas('product')
            ->get();

        \Log::info('Weekly Recap Order Items', [
            'count' => $orderItems->count(),
            'items' => $orderItems->toArray(),
            'start' => $startDate->toDateTimeString(),
            'end' => $endDate->toDateTimeString(),
        ]);

        $products = $orderItems->groupBy('product_id')->map(function ($items) {
            $product = $items->first()->product;
            return [
                'name' => $product->name,
                'batik_type' => $product->batik_type ?? '-',
                'price' => number_format($product->price, 2, ',', '.'), // IDR format
                'stock' => $product->stock,
                'image' => $product->image ? asset('storage/' . $product->image) : null,
                'quantity_sold' => $items->sum('quantity'),
            ];
        })->sortByDesc('quantity_sold')->take(5)->values()->toArray();

        $totalQuantity = $orderItems->sum('quantity');
        return [
            'total_products_sold' => $totalQuantity,
            'highest_stock' => max(array_column($products, 'stock') ?: [0]),
            'lowest_stock' => min(array_column($products, 'stock') ?: [0]),
            'average_price' => number_format(
                $totalQuantity > 0
                    ? $orderItems->sum(function ($item) {
                        return $item->price * $item->quantity;
                    }) / $totalQuantity
                    : 0,
                2,
                ',',
                '.'
            ),
            'batik_types' => array_unique(array_filter($orderItems->pluck('product.batik_type')->toArray())),
            'products' => $products,
        ];
    }

    public function getDailyRecapData()
    {
        $startDate = Carbon::today()->startOfDay();
        $endDate = Carbon::today()->endOfDay();

        $orderItems = OrderItem::query()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->with('product')
            ->whereHas('product')
            ->get();

        \Log::info('Daily Recap Order Items', [
            'count' => $orderItems->count(),
            'items' => $orderItems->toArray(),
            'start' => $startDate->toDateTimeString(),
            'end' => $endDate->toDateTimeString(),
        ]);

        $products = $orderItems->groupBy('product_id')->map(function ($items) {
            $product = $items->first()->product;
            return [
                'name' => $product->name,
                'batik_type' => $product->batik_type ?? '-',
                'price' => number_format($product->price, 2, ',', '.'), // IDR format
                'stock' => $product->stock,
                'image' => $product->image ? asset('storage/' . $product->image) : null,
                'quantity_sold' => $items->sum('quantity'),
            ];
        })->sortByDesc('quantity_sold')->take(5)->values()->toArray();

        $totalQuantity = $orderItems->sum('quantity');
        return [
            'total_products_sold' => $totalQuantity,
            'highest_stock' => max(array_column($products, 'stock') ?: [0]),
            'lowest_stock' => min(array_column($products, 'stock') ?: [0]),
            'average_price' => number_format(
                $totalQuantity > 0
                    ? $orderItems->sum(function ($item) {
                        return $item->price * $item->quantity;
                    }) / $totalQuantity
                    : 0,
                2,
                ',',
                '.'
            ),
            'batik_types' => array_unique(array_filter($orderItems->pluck('product.batik_type')->toArray())),
            'products' => $products,
        ];
    }

    public function setRecapType($type)
    {
        if (in_array($type, ['all', 'weekly', 'daily'])) {
            $this->recapType = $type;
        }
    }
}
