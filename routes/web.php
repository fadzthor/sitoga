<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TestimonialController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])
        ->name('login');
    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');

    // Register / Sign Up
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])
        ->name('register');
    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.process');
});
Route::middleware('auth')->group(function () {
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
});
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/plants', [PlantController::class, 'index'])
    ->name('plants.index');
Route::get('/plants/{slug}', [PlantController::class, 'show'])
    ->name('plants.show');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('/scan', [ScanController::class, 'show'])
    ->name('scan');

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::post('/subscribe', [SubscriptionController::class, 'store'])
    ->name('subscribe');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

// Hanya untuk menyimpan testimonial
Route::post('testimonials', [App\Http\Controllers\TestimonialController::class, 'store'])
    ->name('testimonials.store')
    ->middleware('auth');
