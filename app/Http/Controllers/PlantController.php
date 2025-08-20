<?php

namespace App\Http\Controllers;

use App\Models\Plant;

use App\Models\Product;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function index(Request $request)
    {
        $plants = Plant::query()
            ->when($request->search, function ($query, $search) {
                $query->where('local_name', 'like', "%$search%")
                    ->orWhere('scientific_name', 'like', "%$search%");
            })
            ->orderBy('local_name')
            ->paginate(12)
            ->withQueryString();

        return view('plants.index', compact('plants'));
    }

    public function show(string $slug)
    {
        $plant = Plant::where('slug', $slug)->firstOrFail();
        $plant->load('products');
        // Increment safely
        $plant->increment('view_count');
        return view('plants.show', compact('plant'));
    }
}
