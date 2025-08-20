<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Product;
use App\Models\Partner;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the application homepage.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $plants = Plant::all();
        // Ambil 6 tanaman terpopuler
        $featuredPlants = Plant::orderByDesc('view_count')
            ->limit(12)
            ->get();

        $products = Product::all();
        // Ambil 6 produk terpopuler
        $featuredProducts = Product::orderByDesc('view_count')
            ->limit(12)
            ->get();

        // Partner1
        $featuredPlants = Plant::orderByDesc('view_count')->limit(3)->get();
        $featuredProducts = Product::orderByDesc('view_count')->limit(3)->get();
        $partners = Partner::all();

        $articles = Article::query()
            ->whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->limit(3)
            ->with('author')
            ->get();


        return view('home', compact('featuredPlants', 'featuredProducts', 'plants', 'products', 'partners', 'articles'));
    }
}
