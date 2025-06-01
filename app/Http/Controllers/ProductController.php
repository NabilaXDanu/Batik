<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(6)->get();
        $testimonials = Testimonial::where('is_active', true)->latest()->take(3)->get();

        return view('welcome', compact('products', 'testimonials'));
    }
}