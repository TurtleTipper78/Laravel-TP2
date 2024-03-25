<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->get();
        return view('article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'texte' => 'required',
            'langue' => 'required',
        ]);

        $article = new Article();
        $article->titre = $request->titre;
        $article->texte = $request->texte;
        $article->date_de_creation = now();
        $article->langue = $request->langue;
        $article->user_id = Auth::id();
        $article->save();

        return redirect()->route('article.index')->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        
        // Check if the authenticated user is the owner of the article
        if ($article->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('article.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titre' => 'required',
            'texte' => 'required',
            'langue' => 'required',
        ]);

        $article = Article::findOrFail($id);
        
        // Check if the authenticated user is the owner of the article
        if ($article->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $article->titre = $request->titre;
        $article->texte = $request->texte;
        $article->langue = $request->langue;
        $article->save();

        return redirect()->route('article.index')->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        // Check if the authenticated user is the owner of the article
        if ($article->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $article->delete();
        return redirect()->route('article.index')->with('success', 'Article deleted successfully.');
    }
}
