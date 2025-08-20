<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Tampilkan daftar semua produk.
     */
    public function index(Request $request)
    {
        // Gunakan paginate() agar bisa denganQueryString()
        $products = Product::paginate(12); // ubah sesuai jumlah per halaman yang diinginkan

        return view('products.index', compact('products'));
    }

    /**
     * Tampilkan detail satu produk berdasarkan slug.
     *
     * @param  string  $slug
     */
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        // update view count, dsb...
        $product->increment('view_count');

        // ambil testimoni beserta user
        $testimonials = $product->testimonials()->with('user')->get();

        return view('products.show', compact('product', 'testimonials'))
            ->with('currentProductId', $product->id);
    }
}
