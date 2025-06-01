<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['userOrders', 'orderDetail', 'buy']);
    }

    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    public function productDetail($id)
    {
        $product = Product::findOrFail($id);
        return view('product_detail', compact('product'));
    }

    public function buy(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->stock < 1) {
            return redirect()->back()->with('error', 'Stok produk habis.');
        }

        $user = auth()->user();

        // Buat pesanan baru
        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => $product->price,
            'status' => 'pending',
        ]);

        // Tambahkan item ke pesanan
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => 1,
            'price' => $product->price,
        ]);

        // Kurangi stok produk
        $product->stock -= 1;
        $product->save();

        return redirect()->route('orders')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function userOrders()
    {
        $userId = auth()->id();
        $orders = Order::where('user_id', $userId)->with('items.product')->get();
        return view('orders', compact('orders'));
    }

    public function orderDetail($id)
    {
        $userId = auth()->id();
        $order = Order::where('id', $id)->where('user_id', $userId)->with('items.product')->firstOrFail();
        return view('order_detail', compact('order'));
    }
}
