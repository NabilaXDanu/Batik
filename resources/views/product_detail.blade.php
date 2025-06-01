@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto fade-in px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div>
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-96 object-cover rounded-xl shadow-lg">
                    @else
                        <img src="https://images.unsplash.com/photo-1598965672098-90412bffd65c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Placeholder" class="w-full h-96 object-cover rounded-xl shadow-lg">
                    @endif
                </div>
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-[#16123f]">{{ $product->name }}</h2>
                    <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                    <p class="text-[#ff6b35] font-bold text-2xl mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="text-sm text-gray-500 mb-4">
                        <i class="fas fa-box mr-1"></i> Stok:
                        @if($product->stock > 10)
                            <span class="text-green-600 font-semibold">{{ $product->stock }} tersedia</span>
                        @elseif($product->stock > 0)
                            <span class="text-orange-500 font-semibold">{{ $product->stock }} tersisa</span>
                        @else
                            <span class="text-red-600 font-semibold">Habis</span>
                        @endif
                    </p>
                    @if (auth()->check())
                        @if ($product->stock > 0)
                            <form action="{{ route('order.buy', $product->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="btn-primary">
                                    <i class="fas fa-shopping-cart mr-2"></i>Beli Sekarang
                                </button>
                            </form>
                        @else
                            <span class="text-red-600 font-semibold text-sm md:text-base">Stok Habis</span>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn-primary inline-flex items-center">
                            <i class="fas fa-sign-in-alt mr-2"></i> Login untuk Beli
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
