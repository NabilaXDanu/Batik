<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Pastikan model Product ada
        $testimonials = Testimonial::where('is_active', true)->get();
        return view('welcome', compact('products', 'testimonials'));
    }
}
