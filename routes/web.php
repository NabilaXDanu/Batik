<?php

use App\Filament\Widgets\TopProducts;
use App\Filament\Widgets\OrderRecap;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TestimonialController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');

// Download Order Recap as PDF
Route::get('/download-order-recap/{recapType?}', function ($recapType = 'all') {
    $widget = new OrderRecap();
    $widget->setRecapType($recapType);
    $data = match ($recapType) {
        'weekly' => $widget->getWeeklyRecapData(),
        'daily' => $widget->getDailyRecapData(),
        default => $widget->getAllTimeRecapData(),
    };
    return view('print-order-recap', ['data' => $data, 'recapType' => $recapType]);
})->name('download-order-recap');

// Download Top Products Recap as PDF
Route::get('/download-top-products-recap/{recapType?}', function ($recapType = 'all') {
    $widget = new TopProducts();
    $widget->setRecapType($recapType);
    $data = match ($recapType) {
        'weekly' => $widget->getWeeklyRecapData(),
        'daily' => $widget->getDailyRecapData(),
        default => $widget->getRecapData(),
    };
    return view('print-top-products-recap', ['data' => $data, 'recapType' => $recapType]);
})->name('download-top-products-recap');


// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Product Detail and Buy Routes
Route::get('/product/{id}', [OrderController::class, 'productDetail'])->name('product.detail');
Route::post('/product/{id}/buy', [OrderController::class, 'buy'])->name('order.buy')->middleware('auth');

// Order Routes (Protected)
Route::middleware('auth')->group(function () {
    Route::get('/orders', [OrderController::class, 'userOrders'])->name('orders');
    Route::get('/orders/{id}', [OrderController::class, 'orderDetail'])->name('order.detail');
});