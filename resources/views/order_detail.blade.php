@extends('layouts.app')

@section('title', 'Detail Pesanan #' . $order->id)

@section('content')
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto fade-in px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 md:mb-10 text-center gradient-text">Detail Pesanan #{{ $order->id }}</h2>
            <div class="bg-gradient-to-r from-indigo-50 to-purple-50 p-4 md:p-6 rounded-xl shadow-lg">
                <p class="text-sm md:text-base text-gray-600">Tanggal: {{ $order->created_at->format('d M Y') }}</p>
                <p class="text-sm md:text-base text-gray-600">Total: Rp {{ number_format($order->total_amount, 2) }}</p>
                <p class="text-sm md:text-base text-gray-600">Status:
                    <span class="@if($order->status == 'delivered') text-green-600 @elseif($order->status == 'cancelled') text-red-600 @else text-yellow-600 @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </p>
                <p class="text-sm md:text-base text-gray-600">Catatan: {{ $order->notes ?? 'Tidak ada catatan' }}</p>
                <!-- Tambahkan detail item jika ada relasi -->
                @if ($order->items->isNotEmpty())
                    <h3 class="text-lg font-semibold mt-4">Item Pesanan</h3>
                    <ul class="list-disc ml-6">
                        @foreach ($order->items as $item)
                            <li>{{ $item->product->name ?? 'Produk' }} - Jumlah: {{ $item->quantity }} - Harga: Rp {{ number_format($item->price, 2) }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <a href="{{ route('orders') }}" class="mt-4 inline-block text-indigo-600 hover:text-indigo-800 transition duration-300"><i class="fa-solid fa-arrow-left mr-2"></i>Kembali ke Pesanan</a>
        </div>
    </section>
@endsection
