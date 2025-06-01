@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto fade-in px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 md:mb-10 text-center gradient-text">Pesanan Saya</h2>
            @if ($orders->isEmpty())
                <p class="text-center text-gray-600">Anda belum memiliki pesanan.</p>
            @else
                <div class="space-y-6">
                    @foreach ($orders as $order)
                        <div class="bg-gradient-to-r from-indigo-50 to-purple-50 p-4 md:p-6 rounded-xl shadow-lg">
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                                <div>
                                    <h3 class="text-lg md:text-xl font-semibold text-gray-800">Pesanan #{{ $order->id }}</h3>
                                    <p class="text-sm md:text-base text-gray-600">Tanggal: {{ $order->created_at->format('d M Y') }}</p>
                                    <p class="text-sm md:text-base text-gray-600">Total: Rp {{ number_format($order->total_amount, 2) }}</p>
                                    <p class="text-sm md:text-base text-gray-600">Status:
                                        <span class="@if($order->status == 'delivered') text-green-600 @elseif($order->status == 'cancelled') text-red-600 @else text-yellow-600 @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </p>
                                </div>
                                <a href="{{ route('order.detail', $order->id) }}" class="mt-4 md:mt-0 text-indigo-600 hover:text-indigo-800 transition duration-300 text-sm md:text-base"><i class="fa-solid fa-eye mr-2"></i>Lihat Detail</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
