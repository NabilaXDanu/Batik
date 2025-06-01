<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\Widget;
use Illuminate\Support\Carbon;

class OrderRecap extends Widget
{
    protected static ?int $sort = 3;
    protected static string $view = 'filament.widgets.order-recap';

    public $recapType = 'all';

    public function getAllTimeRecapData()
    {
        $orders = Order::query()
            ->with('user')
            ->orderBy('total_amount', 'desc')
            ->limit(5)
            ->get();

        $statusCounts = Order::query()
            ->groupBy('status')
            ->selectRaw('status, COUNT(*) as count')
            ->pluck('count', 'status')
            ->toArray();

        return [
            'total_orders' => $orders->count(),
            'total_amount' => number_format($orders->sum('total_amount'), 2, ',', '.'), // IDR format
            'status_counts' => $statusCounts,
            'orders' => $orders->map(function ($order) {
                return [
                    'user_name' => $order->user->name ?? '-',
                    'total_amount' => number_format($order->total_amount, 2, ',', '.'), // IDR format
                    'status' => $order->status,
                    'created_at' => $order->created_at->format('d-m-Y H:i'),
                ];
            })->toArray(),
        ];
    }

    public function getWeeklyRecapData()
    {
        $startDate = Carbon::now()->subDays(7)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $orders = Order::query()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->with('user')
            ->orderBy('total_amount', 'desc')
            ->limit(5)
            ->get();

        $statusCounts = Order::query()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('status')
            ->selectRaw('status, COUNT(*) as count')
            ->pluck('count', 'status')
            ->toArray();

        \Log::info('Weekly Order Recap', [
            'count' => $orders->count(),
            'orders' => $orders->toArray(),
            'start' => $startDate->toDateTimeString(),
            'end' => $endDate->toDateTimeString(),
        ]);

        return [
            'total_orders' => $orders->count(),
            'total_amount' => number_format($orders->sum('total_amount'), 2, ',', '.'), // IDR format
            'status_counts' => $statusCounts,
            'orders' => $orders->map(function ($order) {
                return [
                    'user_name' => $order->user->name ?? '-',
                    'total_amount' => number_format($order->total_amount, 2, ',', '.'), // IDR format
                    'status' => $order->status,
                    'created_at' => $order->created_at->format('d-m-Y H:i'),
                ];
            })->toArray(),
        ];
    }

    public function getDailyRecapData()
    {
        $startDate = Carbon::today()->startOfDay();
        $endDate = Carbon::today()->endOfDay();

        $orders = Order::query()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->with('user')
            ->orderBy('total_amount', 'desc')
            ->limit(5)
            ->get();

        $statusCounts = Order::query()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('status')
            ->selectRaw('status, COUNT(*) as count')
            ->pluck('count', 'status')
            ->toArray();

        \Log::info('Daily Order Recap', [
            'count' => $orders->count(),
            'orders' => $orders->toArray(),
            'start' => $startDate->toDateTimeString(),
            'end' => $endDate->toDateTimeString(),
        ]);

        return [
            'total_orders' => $orders->count(),
            'total_amount' => number_format($orders->sum('total_amount'), 2, ',', '.'), // IDR format
            'status_counts' => $statusCounts,
            'orders' => $orders->map(function ($order) {
                return [
                    'user_name' => $order->user->name ?? '-',
                    'total_amount' => number_format($order->total_amount, 2, ',', '.'), // IDR format
                    'status' => $order->status,
                    'created_at' => $order->created_at->format('d-m-Y H:i'),
                ];
            })->toArray(),
        ];
    }

    public function setRecapType($type)
    {
        if (in_array($type, ['all', 'weekly', 'daily'])) {
            $this->recapType = $type;
        }
    }
}
