<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Show paginated list of published articles.
     */
    public function index(Request $request)
    {
        $query = Article::with('author')->latest();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('title', 'like', '%' . $search . '%');
        }
        $articles = Article::query()
            ->whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->paginate(9)
            ->withQueryString();


        return view('articles.index', compact('articles'));
    }

    /**
     * Show a single article by slug.
     */
    public function show(string $slug)
    {
        $article = Article::where('slug', $slug)
            ->whereNotNull('published_at')
            ->with('author')
            ->firstOrFail();

        return view('articles.show', compact('article'));
    }
}
